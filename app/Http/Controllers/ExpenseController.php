<?php

namespace App\Http\Controllers;

use App\Expense;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware( 'hasPerm', [ 'except' => [ 'index', 'show' ] ] );
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index( Request $request )
    {
        $title    = "Expense List";
        $expenses = new Expense();
    
        if ( $request->s ) {
            if ($request->u) {
                $expenses = $expenses->where('user_id', $request->u);
            }
            if ($request->t) {
                $expenses = $expenses->where('type', $request->t);
            }
            if ($request->from) {
                $from     = Carbon::parse($request->from)->toDateString();
                $expenses = $expenses->where('date', '>=', $from);
            }
            if ($request->to) {
                $to       = Carbon::parse($request->to)->toDateString();
                $expenses = $expenses->where('date', '<=', $to);
            }
        }
        $expenses = $expenses->orderByDesc( "date" );
        $expenses = $expenses->paginate( 15 )->appends( $request->all() );
    
        $users = User::getDropdown();
    
        return view( 'expense.index', compact( 'title', 'expenses', 'users' ) );
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Add Expense";
        $users = User::getDropdown();
        return view( 'expense.create', compact( 'title', 'users' ) );
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store( Request $request )
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];
        $cp       = Auth::user()->currentPermission();
        $request->validate([
                               'user_id' => 'required',
                               'date'    => ['required', "after_or_equal:{$cp->from}", "before_or_equal:{$cp->to}"],
                               'purpose' => 'required',
                               'type'    => 'required',
                               'amount'  => 'required|numeric',
                           ]);
    
        try {
            $expense             = new Expense();
            $expense->date       = Carbon::parse( $request->date )->toDateTimeString();
            $expense->user_id    = $request->user_id;
            $expense->purpose    = $request->purpose;
            $expense->amount     = $request->amount;
            $expense->type       = $request->type;
            $expense->remarks    = $request->remarks;
            $expense->status     = $request->status;
            $expense->created_by = Auth::user()->id;
            $expense->created_at = Carbon::now()->toDateTimeString();
            $expense->save();
        
            $response['success']  = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg']      = "Expense Saved Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
    
        return response()->json( $response );
    }
    
    /**
     * Display the specified resource.
     *
     * @param Expense $expense
     * @return Response
     */
    public function show( Expense $expense )
    {
        $title = "Show Details ";
        return view( 'expense.show', compact( 'title', 'expense' ) );
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param Expense $expense
     * @return Response
     */
    public function edit( Expense $expense )
    {
        $title = "Edit Expense";
        $users = User::getDropdown();
        return view( 'expense.edit', compact( 'title', 'expense', 'users' ) );
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Expense $expense
     * @return Response
     */
    public function update( Request $request, Expense $expense )
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];
        $cp       = Auth::user()->currentPermission();
        $request->validate([
                               'user_id' => 'required',
                               'date'    => ['required', "after_or_equal:{$cp->from}", "before_or_equal:{$cp->to}"],
                               'purpose' => 'required',
                               'type'    => 'required',
                               'amount'  => 'required|numeric',
                           ]);
    
        try {
            $expense->date       = Carbon::parse( $request->date )->toDateTimeString();
            $expense->user_id    = $request->user_id;
            $expense->purpose    = $request->purpose;
            $expense->amount     = $request->amount;
            $expense->type       = $request->type;
            $expense->remarks    = $request->remarks;
            $expense->status     = $request->status;
            $expense->updated_by = Auth::user()->id;
            $expense->updated_at = Carbon::now()->toDateTimeString();
            $expense->save();
        
            $response['success']  = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg']      = "Expense Updated Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json( $response );
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param Expense $expense
     * @return Response
     */
    public function destroy( Expense $expense )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => FALSE ];
        
        try {
            $expense->delete();
            $response['success']  = TRUE;
            $response['redirect'] = route( 'expense.index' );
            $response['msg']      = "Expense Deleted Successfully!";
        } catch ( Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
    
        return response()->json( $response );
    }
}
