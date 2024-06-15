<?php
namespace App\Services;

use App\Http\Requests\ScheduleRequest;
use App\Models\Data\ScheduleData;
use App\Repositories\ScheduleRepository;

class ScheduleService
{
    protected $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function getAllSchedules()
    {
        return $this->scheduleRepository->getAll();
    }

    public function getScheduleById($id)
    {
        return $this->scheduleRepository->getById($id);
    }

    public function createSchedule(ScheduleData $data)
    {

        return $this->scheduleRepository->create($data);
    }

    public function updateSchedule(ScheduleData $data)
    {
        return $this->scheduleRepository->update($data);
    }

    public function deleteSchedule($id)
    {
        return $this->scheduleRepository->delete($id);
    }

    public function createMovieSchedule(ScheduleData $data, $movieId)
    {
        return $this->scheduleRepository->createSchedule($data, $movieId);
    }
}
