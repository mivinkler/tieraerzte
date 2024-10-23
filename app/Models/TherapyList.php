<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TherapyList extends Model
{
    use HasFactory;

    protected $table = 'therapies_lists';
    protected $guarded = [];

    public function therapyClinic()
    {
        return $this->belongsTo(TherapyClinic::class);
    }
}
