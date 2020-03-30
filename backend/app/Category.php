<?php

namespace App;

use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use ValidatingTrait;

    /**
     * Validation rules for the model
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'model' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'model'
    ];

    public function places()
    {
        return $this->belongsToMany('App\Place')
            ->withTimestamps();
    }
}