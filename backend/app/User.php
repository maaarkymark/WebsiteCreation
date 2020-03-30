<?php

namespace App;
use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use HasApiTokens, Authenticatable, Authorizable, ValidatingTrait;

    /**
     * Validation rules for the model
     *
     * @var array
     */
    protected $rules = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password'
    ];

    protected $hidden = [ 'password' ];

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}