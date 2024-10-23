<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;
    protected $table = 'time_tables';
    protected $guarded = [];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
