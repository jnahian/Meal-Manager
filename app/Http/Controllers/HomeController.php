<?php

namespace App\Http\Controllers;

use App\MonthlySummery;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('about');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $title = "Monthly Summery of " . date('F, Y');

        $msr = MonthlySummery::where('year', date('Y'))
            ->where('month', date('m'))
            ->where('total_cost', '>', 0)
            ->orderBy('user_id')->get();


        $total = MonthlySummery::where('year', date('Y'))
            ->where('month', date('m'))
            ->where('total_cost', '>', 0)
            ->select(
                DB::raw("year, month, sum(collection) total_collection, sum(total_cost) total_cost, sum(amount_left) amount_left")
            )
            ->groupBy('year', 'month')
            ->orderBy('user_id')
            ->first();

        $yearly = MonthlySummery::where('year', date('Y'))
            ->where('total_cost', '>', 0)
            ->select(
                DB::raw("year, month, sum(collection) total_collection, sum(total_cost) total_cost, sum(amount_left) amount_left")
            )
            ->groupBy('year', 'month')
            ->orderBy('month')
            ->get();

//        dd($yearly->pluck('total_cost'));

        return view('home', compact('title', 'msr', 'total', 'yearly'));
    }

    /**
     * About The APP
     *
     * @return Factory|View
     */
    public function about()
    {
        $title = "About";
        $git_link = "";

        return view('about', compact('title', 'git_link'));
    }
}
