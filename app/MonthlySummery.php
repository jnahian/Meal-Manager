<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MonthlySummery extends Model
{
    protected $table = 'monthly_summery_view';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getYearlyMealSummery()
    {
        $meals = self::where('year', date('Y'))
                     ->where('total_cost', '>', 0)
                     ->select(
                         DB::raw("year, month, user_id, sum(meal) meals, sum(collection) total_collection, sum(total_cost) total_cost")
                     )
                     ->groupBy('year', 'month', 'user_id')
                     ->orderBy('month')
                     ->get();
        $data  = [];
        if ($meals) {
            $data['names'] = $meals->pluck('user.name', 'user.id')->toArray();
            $data['data']  = [];
            foreach ($meals as $meal) {
                $data['data'][$meal->month][$meal->user->id] = $meal;
            }
        }

        return $data;
    }
}
