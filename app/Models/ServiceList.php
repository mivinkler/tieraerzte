<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ServiceList extends Model
{
    use HasFactory;

    protected $table = 'services_lists';
    protected $guarded = [];

    public function serviceClinic()
    {
        return $this->belongsTo(ServiceClinic::class);
    }

    public function getIconUrlAttribute()
    {
        // Проверяем, существует ли путь к иконке
        return $this->icon_path 
            ? asset("storage/icons/{$this->icon_path}") 
            : null;
    }
}
