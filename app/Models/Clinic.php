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
        return $this->hasMany(ClinicTherapy::class);
    }

    public function focus() {
        return $this->hasOne(Focus::class);
    }

    public function therapyOthers() {
        return $this->hasOne(TherapyOther::class);
    }

    public function text() {
        return $this->hasOne(Text::class);
    }

    public function images() {
        return $this->hasOne(Image::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }

    public function geoCoordinates()
    {
        return $this->hasOne(GeoCoordinates::class);
    }
    
    public function seo()
    {
        return $this->hasOne(Seo::class);
    }
}
