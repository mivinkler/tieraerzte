<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ServiceOther extends Model
{
    use HasFactory;
    protected $table = 'services_others'; 

    protected $guarded = [];

    public function clinic(){
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }
}
