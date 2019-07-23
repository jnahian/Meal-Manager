<?php

namespace App\Http\Controllers;

use App\MonthlySummery;
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
    
        $msr = MonthlySummery::where( 'year', date( 'Y' ) )->where( 'month', date( 'm' ) )->get();
    
        return view( 'home', compact( 'title', 'msr' ) );
    }
}
