<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NursingOther extends Model
{
    use HasFactory;
    protected $table = 'nursings_others';
    protected $guarded = [];


    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
