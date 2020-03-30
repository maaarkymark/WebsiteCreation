<?php

namespace App;

use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use ValidatingTrait;

    /**
     * Validation rules for the model
     *
     * @var array
     */
    protected $rules = [
        'message' => 'required',
        'rating' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'rating',
    ];

    /**
     * Defines the author relationship
     *
     * @return void
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Defines the place relationship
     *
     * @return void
     */
    public function place()
    {
        return $this->belongsTo('App\Place');
    }
}