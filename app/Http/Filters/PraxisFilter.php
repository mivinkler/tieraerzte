<?php

namespace App\Http\Filters;
use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class PraxisFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const POSTCODE = 'postcode';
    public const THERAPY_ID = 'therapy_id';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::POSTCODE => [$this, 'postcode'],
            self::THERAPY_ID => [$this, 'therapy_id'],
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function postcode(Builder $builder, $value)
    {
        $builder->where('postcode', 'like', "%{$value}%");
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

