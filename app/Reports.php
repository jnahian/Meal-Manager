<?php

namespace App;

use App\Scopes\LoggedUser;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'incomes_expenses';

    protected $dates = [ 'updated_at', 'date' ];


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::addGlobalScope( new LoggedUser() );
    }
}
