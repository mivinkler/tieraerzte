<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AnimalClinic extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'animals_clinics';
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function animalList()
    {
        return $this->belongsTo(AnimalList::class, 'animal_id');
    }

}
