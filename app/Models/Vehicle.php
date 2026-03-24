<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
    'name',
    'vehicle_type',
    'vehicle_brand',
    'vehicle_number',
    'vehicle_engine_cc',
    'vehicle_model',
    'vehicle_year'
];

   public function type(){
    return $this->belongsTo(VehicleType::class,'vehicle_type');
   }
}