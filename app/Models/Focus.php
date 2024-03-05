<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Focus extends Model
{
    use HasFactory;
    protected $table = 'focuses'; 

    protected $guarded = [];

    public function clinic(){
        return $this->belongsTo(Clinic::class);
    }
    
}
