<?php

namespace App\Http\Controllers;

use App\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {
        $title = "সকল আয়";
        $incomes = new Income();

        if ( $request->s ) {
            if ( $request->from ) {
                $from = Carbon::parse( $request->from )->toDateString();
                $incomes = $incomes->where( 'date', '>=', $from );
            }
            if ( $request->to ) {
                $to = Carbon::parse( $request->to )->toDateString();
                $incomes = $incomes->where( 'date', '<=', $to );
            }
        }
        $incomes = $incomes->orderByDesc( "date" );
        $incomes = $incomes->paginate( 15 )->appends( $request->all() );

        return view( 'income.index', compact( 'title', 'incomes' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "নতুন আয় যোগ করুন";
        return view( 'income.create', compact( 'title' ) );
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
            'date'   => 'required',
            'source' => 'required',
            'amount' => 'required|numeric',
        ] );

        try {
            $income = new Income();
            $income->uuid = Uuid::uuid4();
            $income->user_id = Auth::user()->id;
            $income->date = Carbon::parse( $request->date )->toDateTimeString();
            $income->source = $request->source;
            $income->amount = $request->amount;
            $income->remarks = $request->remarks;
            $income->status = $request->status;
            $income->save();

            $response['success'] = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg'] = "আয় সফলভাবে সংরক্ষিত হয়েছে।";
        } catch ( \Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json( $response );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function show( Income $income )
    {
        $title = "বিস্তারিত দেখুন ";
        return view( 'income.show', compact( 'title', 'income' ) );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function edit( Income $income )
    {
        $title = "আয় পরিবর্তন";
        return view( 'income.edit', compact( 'title', 'income' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Income              $income
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Income $income )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => false ];
        $request->validate( [
            'date'   => 'required',
            'source' => 'required',
            'amount' => 'required|numeric',
        ] );
        try {
            $income->date = Carbon::parse( $request->date )->toDateTimeString();
            $income->source = $request->source;
            $income->amount = $request->amount;
            $income->remarks = $request->remarks;
            $income->status = $request->status;
            $income->save();

            $response['success'] = TRUE;
            $response['redirect'] = $request->previous;
            $response['msg'] = "আয় সফলভাবে আপডেট হয়েছে।";
        } catch ( \Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json( $response );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function destroy( Income $income )
    {
        $response = [ 'success' => FALSE, 'msg' => '', 'redirect' => false ];

        try {
            $income->delete();
            $response['success'] = TRUE;
            $response['redirect'] = route( 'income.index' );
            $response['msg'] = "আয় মুছেফেলা হয়েছে।";
        } catch ( \Exception $exception ) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json( $response );
    }
}
