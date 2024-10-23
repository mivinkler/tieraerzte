<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DeviceOther extends Model
{
    use HasFactory;
    protected $table = 'devices_others';
    protected $guarded = [];


    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
