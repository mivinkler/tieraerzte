<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Traits\Filterable;
use App\Notifications\VerifyWithQueueNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Filterable;

    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'admin',
            self::ROLE_USER => 'user',
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'clinic_id',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function clinic() {
        return $this->belongsTo(Clinic::class);
    }

    public function SendEmailVerificationNotification() {
        $this->notify(new VerifyWithQueueNotification);
    }

}
