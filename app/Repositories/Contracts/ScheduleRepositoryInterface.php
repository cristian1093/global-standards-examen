<?php

namespace App\Repositories\Contracts;

use App\Models\Data\ScheduleData;

interface ScheduleRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(ScheduleData $data);
    public function update(ScheduleData $data);
    public function delete($id);
    public function createSchedule(ScheduleData $data, $movieId);
}
