<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function hospitals_pharmacies()
    {
        return $this->hasMany('App\models\HospitalPharmacy');
    } 
    public function pharmacies()
    {
        return $this->hasMany('App\models\Pharmacy');
    }
    public function scopeSearchResults($query)
    {
        return $query->when(request()->filled('category'), function($query) {
                    $query->where('id', request()->input('category'));
            });
    }
}
