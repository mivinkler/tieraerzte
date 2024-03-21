<?php

namespace App\Http\Filters;
use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Components\GeocodingClient;
use Illuminate\Support\Facades\Log;

class MainFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const STREET = 'street';
    public const POSTCODE = 'postcode';
    public const LOCALITY = 'locality';
    public const EMAIL = 'email';
    public const THERAPY_ID = 'therapy_id';
    public const RADIUS = 'radius';

    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::STREET => [$this, 'street'],
            self::POSTCODE => [$this, 'postcodeWithRadius'],
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

    public function postcodeWithRadius(Builder $builder, $value)
    {
        if (!request()->has('radius') || !is_numeric(request('radius'))) {
            $builder->where('postcode', 'like', "%{$value}%");
        } else {
            $geocodingClient = new GeocodingClient();
            $postcodeCoordinates = $geocodingClient->getCoordinatesByAddress($value);

            if ($postcodeCoordinates) {
                $longitude = $postcodeCoordinates['longitude'];
                $latitude = $postcodeCoordinates['latitude'];
                $radiusInMeters = request('radius') * 1000;

                // Соединяем таблицы и добавляем условие фильтрации по радиусу
                $builder->join('geocoordinates', 'clinics.id', '=', 'geocoordinates.clinic_id')
                        ->select('clinics.*') // Выбираем только поля из таблицы clinics
                        ->whereRaw("ST_Distance_Sphere(point(geocoordinates.longitude, geocoordinates.latitude), point(?, ?)) <= ?", [
                            $longitude, $latitude, $radiusInMeters
                        ]);
            }
        }
    }
}

