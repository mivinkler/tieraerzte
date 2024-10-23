<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NursingList extends Model
{
    use HasFactory;

    protected $table = 'nursings_lists';
    protected $guarded = [];

    public function nursingClinic()
    {
        return $this->belongsTo(NursingClinic::class);
    }

}
