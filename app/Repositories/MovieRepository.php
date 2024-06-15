<?php

namespace App\Repositories;

use App\Models\Data\MovieData;
use App\Models\Movie;
use App\Repositories\Contracts\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll()
    {
        return Movie::all(['id', 'name', 'description', 'director', 'publication_date', 'state', 'image']);
    }

    public function getById($id)
    {
        return Movie::findOrFail($id);
    }

    public function create(MovieData $data)
    {

        // Procesamiento para guardar la película y la imagen
        $movie = new Movie();
        $movie->name = $data->getMovieName();
        $movie->description = $data->getMovieDescription();
        $movie->director = $data->getMovieDirector();
        $movie->publication_date = $data->getMoviePublicationDate();
        $movie->state = $data->getMovieState();
        $movie->image = $data->getMovieImage();

        return $movie->save();
    }

    public function update(MovieData $data)
    {

        $movie = Movie::findOrFail($data->getMovieId());

        $movie->name = $data->getMovieName();
        $movie->description = $data->getMovieDescription();
        $movie->director = $data->getMovieDirector();
        $movie->publication_date = $data->getMoviePublicationDate();
        $movie->state = $data->getMovieState();
        $movie->image = $data->getMovieImage();

        $movie->update();

        return $movie;
    }

    public function delete($id)
    {
        Movie::destroy($id);
    }

    public function getSchedulesById($id)
    {
        return Movie::with('schedules')->find($id);
    }

    public function getSchedules()
    {
        return Movie::with('schedules')->get();
    }

}
