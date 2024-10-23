<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DeviceList extends Model
{
    use HasFactory;

    protected $table = 'devices_lists';
    protected $guarded = [];

    public function deviceClinic()
    {
        return $this->belongsTo(DeviceClinic::class);
    }

    public function getIconUrlAttribute()
    {
        // Проверяем, существует ли путь к иконке
        return $this->icon_path 
            ? asset("storage/icons/{$this->icon_path}") 
            : null;
    }
}
