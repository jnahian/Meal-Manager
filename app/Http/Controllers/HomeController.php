<?php

namespace App\Http\Controllers;

use App\Reports;
use Illuminate\Contracts\Support\Renderable;

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
        $title = "Dashboard";
    
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
