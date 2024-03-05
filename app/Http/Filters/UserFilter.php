<?php

namespace App\Http\Filters;
use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const ID = 'id';
    public const NAME = 'name';
    public const ROLE = 'role';
    public const PRAXIS = 'praxis';
    public const PRAXIS_ID = 'praxis_id';
    public const LOCALITY = 'locality';
    public const EMAIL = 'email';
    public const PASSWORT = 'password';


    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::NAME => [$this, 'name'],
            self::ROLE => [$this, 'role'],
            self::PRAXIS => [$this, 'praxis'],
            self::PRAXIS_ID => [$this, 'praxis_id'],
            self::LOCALITY => [$this, 'locality'],
            self::EMAIL => [$this, 'email'],
            self::PASSWORT => [$this, 'password'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', '=', $value);
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function role(Builder $builder, $value)
    {
        $builder->where('role', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function password(Builder $builder, $value)
    {
        $builder->where('password', 'like', "%{$value}%");
    }

    public function praxis(Builder $builder, $value)
    {
        $builder->whereHas('clinics', function ($query) use ($value) {
            $query->where('title', 'like', "%{$value}%");
        });
    }

    public function praxis_id(Builder $builder, $value)
    {
        $builder->whereHas('clinics', function ($query) use ($value) {
            $query->where('id', '=', $value);
        });
    }

    public function locality(Builder $builder, $value)
    {
        $builder->whereHas('clinics', function ($query) use ($value) {
            $query->where('locality', 'like', "%{$value}%");
        });
    }
}

