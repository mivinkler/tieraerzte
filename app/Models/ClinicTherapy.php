<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ClinicTherapy extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'clinics_therapies';
    protected $guarded = [];
    protected $fillable = ['therapy_id', 'therapy_title', 'therapy_text'];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }

    public function therapy()
    {
        return $this->belongsTo(Therapy::class, 'therapy_id', 'id');
    }

}
