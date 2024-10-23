<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LanguageOther extends Model
{
    use HasFactory;
    protected $table = 'languages_others';
    protected $guarded = [];


    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
