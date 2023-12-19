<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $guarded = [];

    public function clinicService()
    {
        return $this->belongsTo(clinicService::class, 'service_id', 'id');
    }

}
