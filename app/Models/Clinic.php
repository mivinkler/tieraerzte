<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    protected $guarded = [];


    public function focus() {
        return $this->hasOne(Focus::class, 'clinic_id', 'id');
    }

    public function serviceOthers() {
        return $this->hasOne(ServiceOther::class, 'clinic_id', 'id');
    }

    public function text() {
        return $this->hasOne(Text::class, 'clinic_id', 'id');
    }

    public function Images() {
        return $this->hasOne(Image::class, 'clinic_id', 'id');
    }

    public function ClinicServices()
    {
        return $this->hasMany(ClinicService::class, 'clinic_id', 'id');
    }
}
