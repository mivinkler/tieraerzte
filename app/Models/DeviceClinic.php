<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DeviceClinic extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'devices_clinics';
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function deviceList()
    {
        return $this->belongsTo(DeviceList::class, 'device_id');
    }
}
