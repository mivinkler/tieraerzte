<?php

namespace App\Models;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LanguageClinic extends Model
{
    use HasFactory;
    use Filterable;
    
    protected $table = 'languages_clinics';
    protected $guarded = [];

    public function clinics()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function languageList()
    {
        return $this->belongsTo(LanguageList::class, 'language_id');
    }

}
