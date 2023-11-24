<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    protected $guarded = [];

    public function areas() {
        return $this->hasMany(Area::class, 'clinic_id', 'id');
    }

    public function nursings() {
        return $this->hasMany(Nursing::class, 'clinic_id', 'id');
    }

    public function services() {
        return $this->hasMany(Service::class, 'clinic_id', 'id');
    }

    public function equipments() {
        return $this->hasMany(Equipment::class, 'clinic_id', 'id');
    }

}
