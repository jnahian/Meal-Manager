<?php

namespace App\Http\Controllers;

use App\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $title = "সকল ব্যায়";
        $expenses = new Expense();

        if ( $request->s ) {
            if ( $request->from ) {
                $from = Carbon::parse( $request->from )->toDateString();
                $expenses = $expenses->where( 'date', '>=', $from );
            }
            if ( $request->to ) {
                $to = Carbon::parse( $request->to )->toDateString();
                $expenses = $expenses->where( 'date', '<=', $to );
            }
        }
        $expenses = $expenses->orderByDesc( "date" );
        $expenses = $expenses->paginate( 15 )->appends( $request->all() );

        return view( 'expense.index', compact( 'title', 'expenses' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "নতুন ব্যায় যোগ করুন";
        return view( 'expense.create', compact( 'title' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => false ];
        $request->validate( [
            'date'    => 'required',
            'purpose' => 'required',
            'amount'  => 'required|numeric',
        ] );

        try {
            $expense = new Expense();
            $expense->uuid = Uuid::uuid4();
            $expense->user_id = Auth::user()->id;
            $expense->date = Carbon::parse( $request->date )->toDateTimeString();
            $expense->purpose = $request->purpose;
            $expense->amount = $request->amount;
            $expense->remarks = $request->remarks;
            $expense->status = $request->status;
            $expense->save();

            $response['success'] = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg'] = "ব্যায় সফলভাবে সংরক্ষিত হয়েছে।";
        } catch ( \Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json( $response );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show( Expense $expense )
    {
        $title = "বিস্তারিত দেখুন ";
        return view( 'expense.show', compact( 'title', 'expense' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit( Expense $expense )
    {
        $title = "ব্যায় পরিবর্তন";
        return view( 'expense.edit', compact( 'title', 'expense' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Expense             $expense
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Expense $expense )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => false ];
        $request->validate( [
            'date'    => 'required',
            'purpose' => 'required',
            'amount'  => 'required|numeric',
        ] );
        try {
            $expense->date = Carbon::parse( $request->date )->toDateTimeString();
            $expense->purpose = $request->purpose;
            $expense->amount = $request->amount;
            $expense->remarks = $request->remarks;
            $expense->status = $request->status;
            $expense->save();

            $response['success'] = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg'] = "ব্যায় সফলভাবে আপডেট হয়েছে।";
        } catch ( \Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json( $response );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy( Expense $expense )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => false ];

        try {
            $expense->delete();
            $response['success'] = TRUE;
            $response['redirect'] = route( 'expense.index' );
            $response['msg'] = "ব্যায় মুছেফেলা হয়েছে।";
        } catch ( \Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json( $response );
    }
}
