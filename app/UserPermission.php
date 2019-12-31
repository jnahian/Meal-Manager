<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = ['from', 'to'];

    protected $dates = ['created_at', 'updated_at', 'from', 'to'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
