<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Income;
use App\MonthlySummery;
use App\Reports;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $title = "রিপোর্টস";
        return view('reports.index', compact('title'));
    }

    public function daily_income_expense(Request $request)
    {
        $title    = "প্রতিদিনের আয় / ব্যায়";
        $incomes  = $this->getDailyIncomeReport($request);
        $expenses = $this->getDailyExpenseReport($request);
        return view('reports.daily-income-expense', compact('title', 'incomes', 'expenses'));
    }

    public function monthly_income_expense(Request $request)
    {
        $title = "মাসিক আয় / ব্যায়";

        $reports = '';

        if ($request->s) {
            $reports = new Reports();
            if ($request->year) {
                $reports = $reports->where('year', $request->year);
            }
            if ($request->month) {
                $reports = $reports->where('month', $request->month);
            }
            $reports = $reports->orderBy("date")->get();
        }

        return view('reports.monthly-income-expense', compact('title', 'reports'));
    }

    public function monthly_meal_report(Request $request)
    {
        $year        = $request->has('year') ? $request->year : date('Y');
        $month       = $request->has('month') ? $request->month : date('n');
        $reports     = Reports::getMonthlyMealReaport($year, $month);
        $print_title = "Monthly Meal Report of the month of " . month_name($month) . ", {$year}";
        $title       = $print_title;
        return view('reports.monthly-meal-report', compact('title', 'reports', 'print_title'));
    }

    public function monthly_all_report(Request $request)
    {
        $year        = $request->has('year') ? $request->year : date('Y');
        $month       = $request->has('month') ? $request->month : date('n');
        $date        = Carbon::parse("{$year}-{$month}-01")->format('F, Y');
        $msr         = MonthlySummery::where('year', $year)->where('month', $month)->get();
        $print_title = "Monthly Summery Report of the month of " . month_name($month) . ", $year";
        $title       = $print_title;

        return view('reports.monthly-all-report', compact('title', 'msr', 'date', 'print_title'));
    }

    public function getDailyIncomeReport(Request $request)
    {

        if ($request->s) {
            $incomes = new Income();
            if ($request->from) {
                $from    = Carbon::parse($request->from)->toDateString();
                $incomes = $incomes->where('date', '>=', $from);
            }
            if ($request->to) {
                $to      = Carbon::parse($request->to)->toDateString();
                $incomes = $incomes->where('date', '<=', $to);
            }
            $incomes = $incomes->where('status', 1)->orderBy("date")->get();
            return $incomes;
        }

        return false;
    }

    public function getDailyExpenseReport(Request $request)
    {
        if ($request->s) {
            $expenses = new Expense();

            if ($request->from) {
                $from     = Carbon::parse($request->from)->toDateString();
                $expenses = $expenses->where('date', '>=', $from);
            }
            if ($request->to) {
                $to       = Carbon::parse($request->to)->toDateString();
                $expenses = $expenses->where('date', '<=', $to);
            }
            $expenses = $expenses->where('status', 1)->orderBy("date")->get();
            return $expenses;
        }

        return false;
    }
}
