<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'address',
        'gender',
        'phone'
    ];

    public function registration(){
        return $this-> hasMany('App\Registration', 'patient_id');
    }
}
