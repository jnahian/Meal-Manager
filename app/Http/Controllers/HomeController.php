<?php

namespace App\Http\Controllers;

use App\Reports;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "ড্যাশবোর্ড";
    
        $reports = Reports::select( 'month' )
                          ->selectRaw( "if(isnull(sum(income)) , 0, sum(income)) income" )
                          ->selectRaw( "if(isnull(sum(expense)) , 0, sum(expense)) expense" )
                          ->selectRaw( "(if(isnull(sum(income)) , 0, sum(income)) - if(isnull(sum(expense)) , 0, sum(expense))) profit" )
                          ->where( 'year', date( 'Y' ) )
                          ->groupBy( 'month' )->get();
        
        $reports = $reports->toArray();
    
        $dailyReports = Reports::select( 'date' )
                               ->selectRaw( "if(isnull(sum(income)) , 0, sum(income)) income" )
                               ->selectRaw( "if(isnull(sum(expense)) , 0, sum(expense)) expense" )
                               ->selectRaw( "(if(isnull(sum(income)) , 0, sum(income)) - if(isnull(sum(expense)) , 0, sum(expense))) profit" )
                               ->where( 'year', date( 'Y' ) )
                               ->where( 'month', date( 'm' ) )
                               ->groupBy( 'date' )->get();
    
        $dailyReports = $dailyReports->toArray();
    
        return view( 'home', compact( 'title', 'reports', 'dailyReports' ) );
    }
}
