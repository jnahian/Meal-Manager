<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use SoftDeletes;
    
    protected $guarded = [ 'id' ];
    protected $dates   = [ 'created_at', 'updated_at', 'deleted_at', 'date' ];
    
    
    public function user()
    {
        return $this->belongsTo( User::class );
    }
}
