<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TherapyClinic extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'therapies_clinics';
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function therapy()
    {
        return $this->belongsTo(Therapy::class);
    }

}
