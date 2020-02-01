<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'role', 'status'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getDropdown()
    {
        return self::orderBy('name')->get(['name', 'id'])->pluck('name', 'id')->toArray();
    }

    public function meals()
    {
        return $this->hasMany(Meal::class);
    }

    public function permissions()
    {
        return $this->hasMany(UserPermission::class);
    }

    public function currentPermission()
    {
        return $this->permissions()->latest()->first();
    }
}
