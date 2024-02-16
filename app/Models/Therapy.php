<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Therapy extends Model
{
    use HasFactory;

    protected $table = 'therapies';
    protected $guarded = [];

    public function clinicTherapy()
    {
        return $this->belongsTo(ClinicTherapy::class, 'therapy_id', 'id');
    }

}
