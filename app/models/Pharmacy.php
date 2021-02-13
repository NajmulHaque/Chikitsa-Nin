<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table    =   'pharmacies';
    public function categories()
    {
        return $this->belongsToMany('App\models\Category');
    }
    public function scopeSearchResults($query)
    {
        return $query->when(request()->filled('category'), function($query) {
                $query->whereHas('categories', function($query) {
                    $query->where('id', request()->input('category'));
                });
            });
    }
}
