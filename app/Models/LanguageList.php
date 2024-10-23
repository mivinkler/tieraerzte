<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LanguageList extends Model
{
    use HasFactory;

    protected $table = 'languages_lists';
    protected $guarded = [];

    public function languageClinic()
    {
        return $this->belongsTo(LanguageClinic::class);
    }

    public function getIconUrlAttribute()
    {
        // Проверяем, существует ли путь к иконке
        return $this->icon_path 
            ? asset("storage/icons/{$this->icon_path}") 
            : null;
    }
}
