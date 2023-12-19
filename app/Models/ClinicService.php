<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ClinicService extends Model
{
    use HasFactory;

    protected $table = 'clinics_services';
    protected $guarded = [];
    protected $fillable = ['service_id', 'service_title', 'service_text'];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

}
