<?php

namespace App\Http\Filters;
use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class MainFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const STREET = 'street';
    public const POSTCODE = 'postcode';
    public const LOCALITY = 'locality';
    public const EMAIL = 'email';
    public const THERAPY_ID = 'therapy_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::STREET => [$this, 'street'],
            self::POSTCODE => [$this, 'postcode'],
            self::LOCALITY => [$this, 'locality'],
            self::EMAIL => [$this, 'email'],
            self::THERAPY_ID => [$this, 'therapy_id'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function street(Builder $builder, $value)
    {
        $builder->where('street', 'like', "%{$value}%");
    }

    public function postcode(Builder $builder, $value)
    {
        $builder->where('postcode', 'like', "%{$value}%");
    }

    public function locality(Builder $builder, $value)
    {
        $builder->where('locality', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

    public function therapy_id(Builder $builder, $value)
    {
        foreach ($value as $therapyId) {
            $builder->whereHas('clinicTherapies', function($b) use ($therapyId) {
                $b->where('therapy_id', $therapyId);
            });
        }
    }
}

