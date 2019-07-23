<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlySummery extends Model
{
    protected $table = 'monthly_summery_view';
    
    public function user()
    {
        return $this->belongsTo( User::class );
    }
}
