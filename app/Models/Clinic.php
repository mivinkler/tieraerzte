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

    public function user() {
        return $this->hasOne(User::class);
    }  
    
    public function images() {
        return $this->hasOne(Image::class);
    }
    
    public function text() {
        return $this->hasOne(Text::class);
    }
    
    public function therapyClinics()
    {
        return $this->hasMany(TherapyClinic::class);
    }

    public function therapyOthers()
    {
        return $this->hasMany(TherapyOther::class);
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
