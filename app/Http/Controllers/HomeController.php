<?php

namespace App\Http\Controllers;

use App\MonthlySummery;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    
    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $title = "Monthly Summery of " . date( 'F, Y' );
    
        $msr = MonthlySummery::where( 'year', date( 'Y' ) )
            ->where( 'month', date( 'm' ) )
            ->where( 'total_cost', '>', 0 )
            ->orderBy( 'user_id' )->get();
    
    
        $total = MonthlySummery::where( 'year', date( 'Y' ) )
            ->where( 'month', date( 'm' ) )
            ->where( 'total_cost', '>', 0 )
            ->select(
                DB::raw( "year, month, sum(total_collection) total_collection, sum(total_cost) total_cost, sum(amount_left) amount_left" )
            )
            ->groupBy( 'year', 'month' )
            ->orderBy( 'user_id' )
            ->first();
    
        return view( 'home', compact( 'title', 'msr', 'total' ) );
    }
}
