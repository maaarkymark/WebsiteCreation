<?php

namespace App;

use Watson\Validating\ValidatingTrait;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use ValidatingTrait;

    /**
     * Validation rules for the model
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required',
        'lat' => 'required',
        'lng' => 'required',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'photo',
        'lat',
        'lng',
        'rating'
    ];

    /**
     * Define the Category relationship
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category')->where('model', 'App\Place')
            ->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * Scopes the query to a certain category slug
     *
     * @param [type] $query
     * @param [type] $slug
     * @return void
     */
    public function scopeWithCategorySlug($query, $slug)
    {
        return $query->whereHas('categories', function($query) use($slug) {
            $query->where('slug', $slug);
        });
    }
}