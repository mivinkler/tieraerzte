<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AnimalList extends Model
{
    use HasFactory;

    protected $table = 'animals_lists';
    protected $guarded = [];

    public function AnimalClinic()
    {
        return $this->belongsTo(AnimalClinic::class);
    }

    public function getIconUrlAttribute()
    {
        // Проверяем, существует ли путь к иконке
        return $this->icon_path 
            ? asset("storage/icons/{$this->icon_path}") 
            : null;
    }
}
