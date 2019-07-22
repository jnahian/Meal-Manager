<?php
/**
 * Created by PhpStorm.
 * User: jnahian
 * Date: 2/19/19
 * Time: 3:50 PM
 */

namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class LoggedUser implements Scope
{
    public function apply( Builder $builder, Model $model )
    {
        $authUser = Auth::user();
        $builder->where( 'user_id', $authUser->id );
    }
}
