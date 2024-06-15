<?php

namespace App\Repositories;

use App\Models\Data\ScheduleData;
use App\Models\Schedule;
use App\Models\Movie;
use App\Repositories\Contracts\ScheduleRepositoryInterface;

class ScheduleRepository implements ScheduleRepositoryInterface
{
    public function getAll()
    {
        return Schedule::all(['id', 'time', 'state']);
    }

    public function getById($id)
    {
        return Schedule::findOrFail($id);
    }

    public function create(ScheduleData $data)
    {

        // Procesamiento para guardar la película y la imagen
        $schedule = new Schedule();
        $schedule->time = $data->getScheduleTime();
        $schedule->state = $data->getScheduleState();

        return $schedule->save();
    }

    public function update(ScheduleData $data)
    {

        $schedule = Schedule::findOrFail($data->getScheduleId());

        $schedule->time = $data->getScheduleTime();
        $schedule->state = $data->getScheduleState();


        $schedule->update();

        return $schedule;
    }

    public function delete($id)
    {
        Schedule::destroy($id);
    }

    public function createSchedule(ScheduleData $data, $movieId)
    {
        $movie = Movie::find($movieId);

        $schedule = Schedule::create([
            'time' => $data->getScheduleTime(),
            'state' => $data->getScheduleState(),
        ]);

        $movie->schedules()->attach($schedule->id);

        return response()->json(['message' => 'Schedule created and linked to movie.']);
    }
}
