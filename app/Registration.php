<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    //
    protected $fillable = [
        'checkupDate',
        'number',
        'patient_id',
        'doctor_id'
    ];

    public function doctor(){
        return $this-> belongsTo('App\Doctor','doctor_id');
    }

    public function patient(){
        return $this-> belongsTo('App\Patient','patient_id');
    }
}
