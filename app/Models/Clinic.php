<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Clinic extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'clinics';
    protected $guarded = [];

    public function clinicTherapies()
    {
        return $this->hasMany(ClinicTherapy::class, 'clinic_id', 'id');
    }

    public function focus() {
        return $this->hasOne(Focus::class, 'clinic_id', 'id');
    }

    public function therapyOthers() {
        return $this->hasOne(TherapyOther::class, 'clinic_id', 'id');
    }

    public function text() {
        return $this->hasOne(Text::class, 'clinic_id', 'id');
    }

    public function images() {
        return $this->hasOne(Image::class, 'clinic_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
