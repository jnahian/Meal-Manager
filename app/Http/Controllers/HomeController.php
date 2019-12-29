<?php

namespace App\Http\Controllers;

use App\MonthlySummery;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
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
        $title = "Monthly Cost Report of " . date('Y');

        $yearlyMeals = MonthlySummery::getYearlyMealSummery();

        return view('home', compact('title', 'yearlyMeals'));
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
