<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ServiceClinic extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'services_clinics';
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function serviceList()
    {
        return $this->belongsTo(ServiceList::class, 'service_id');
    }

}
