<?php
namespace App\Services;

use App\Http\Requests\MovieRequest;
use App\Models\Data\MovieData;
use App\Repositories\MovieRepository;

class MovieService
{
    protected $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllMovies()
    {
        return $this->movieRepository->getAll();
    }

    public function getMovieById($id)
    {
        return $this->movieRepository->getById($id);
    }

    public function createMovie(MovieData $data)
    {

        return $this->movieRepository->create($data);
    }

    public function updateMovie(MovieData $data)
    {
        return $this->movieRepository->update($data);
    }

    public function deleteMovie($id)
    {
        return $this->movieRepository->delete($id);
    }

    public function getMovieSchedules($id)
    {
        return $this->movieRepository->getSchedulesById($id);
    }

    public function getAllMovieSchedules()
    {
        return $this->movieRepository->getSchedules();
    }
}
