<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Main\Controller;
use App\Models\Clinic;
use App\Models\TimeOutput;
use Carbon\Carbon;
use Spatie\OpeningHours\OpeningHours;

class TimeController extends Controller
{
    public function calculateNextFreeTime($praxisId)
    {
        $praxis = Clinic::findOrFail($praxisId);
        Carbon::setLocale('de');

        // Генерация рабочего времени и проверка валидности
        $workTimeTable = $this->generateWorkTimeTable($praxis->timeTable);

        try {
            $openingHours = OpeningHours::create($workTimeTable);
        } catch (\Exception $e) {
            return response("Error in opening hours configuration: " . $e->getMessage(), 400)
                ->header('Content-Type', 'text/plain');
        }

        // Найдем следующее доступное время через заданный интервал рабочих дней
        $nextFreeTime = $this->addBusinessDays(Carbon::now()->timezone('Europe/Stockholm'), $praxis->timeInterval->days_interval, $openingHours);

        // Обновление или создание записи в таблице time_output
        $formattedDate = $nextFreeTime ? $nextFreeTime->translatedFormat('l d.m.Y') : 'No available slot';
        TimeOutput::updateOrCreate(['clinic_id' => $praxis->id], ['next_free_time' => $formattedDate]);

        return response("Nächste Termin: $formattedDate", 200)
            ->header('Content-Type', 'text/plain');
    }

    private function addBusinessDays($currentDateTime, $days, $openingHours)
    {
        // Пропускаем все нерабочие дни до первого рабочего дня
        while (!$openingHours->isOpenOn($currentDateTime->format('l'))) {
            $currentDateTime->addDay();
        }

        // Теперь учитываем оставшиеся рабочие дни
        while ($days > 0) {
            $currentDateTime->addDay();
            if ($openingHours->isOpenOn($currentDateTime->format('l'))) {
                $days--;
            }
        }

        // Возвращаем просто дату найденного рабочего дня
        return $currentDateTime;
    }

    private function generateWorkTimeTable($timeTable)
    {
        $daysOfWeek = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        return collect($daysOfWeek)->mapWithKeys(function ($day) use ($timeTable) {
            return [$day => $this->сonvertTimeRange(
                    $timeTable->{"{$day}_start1"},
                    $timeTable->{"{$day}_end1"},
                    $timeTable->{"{$day}_start2"},
                    $timeTable->{"{$day}_end2"}
                )
            ];
        })->toArray();
    }

     //  Форматирует и конвертирует временные интервалы для рабочего дня.
     //  Этот метод принимает два интервала времени для одного дня, проверяет их наличие и форматирует их в строки формата "HH:MM-HH:MM". 
     //  Если временные интервалы не заданы, они исключаются из результата.
     //  Если интервал времени не задан (например, оба $start и $end равны null), он исключается из массива.
    private function сonvertTimeRange($start1, $end1, $start2, $end2)
    {
        return array_filter([
            ($start1 && $end1) ? substr($start1, 0, 5) . '-' . substr($end1, 0, 5) : null,
            ($start2 && $end2) ? substr($start2, 0, 5) . '-' . substr($end2, 0, 5) : null,
        ]);
    }
}