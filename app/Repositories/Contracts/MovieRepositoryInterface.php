<?php

namespace App\Repositories\Contracts;

use App\Models\Data\MovieData;

interface MovieRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function create(MovieData $data);
    public function update(MovieData $data);
    public function delete($id);
    public function getSchedulesById($id);
    public function getSchedules();
}
