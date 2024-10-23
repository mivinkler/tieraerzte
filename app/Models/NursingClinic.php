<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NursingClinic extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'nursings_clinics';
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function nursingList()
    {
        return $this->belongsTo(NursingList::class);
    }

}
