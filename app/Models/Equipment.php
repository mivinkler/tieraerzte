<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipments'; 

    protected $guarded = [];

    public function clinic(){
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }
    
}
