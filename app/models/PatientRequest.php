<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    protected $table = 'patient_requests';
    protected $fillable = ['user_id','type','name','address','description','reason'];
}
