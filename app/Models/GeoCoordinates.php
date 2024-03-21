<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class GeoCoordinates extends Model
{
    use HasFactory;
    protected $table = 'geocoordinates';
    protected $guarded = [];

    protected $fillable = ['clinic_id', 'latitude', 'longitude'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
