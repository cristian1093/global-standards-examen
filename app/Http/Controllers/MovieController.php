<?php

namespace App\Http\Controllers;

use App\Models\Data\MovieData;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->movieService->getAllMovies();
        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMovie(MovieRequest $request)
    {
        $movieData = new MovieData();
        $movieData
            ->setMovieName($request->name)
            ->setMovieDescription($request->description)
            ->setMovieDirector($request->director)
            ->setMoviePublicationDate($request->publication_date)
            ->setMovieState($request->state);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/movies', $imageName);
            $movieData->setMovieImage('movies/' . $imageName);
        }

        $result = $this->movieService->createMovie($movieData);

        // Devolver la película creada en la respuesta
        return response()->json(['movie' => $result], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function showMovie($id)
    {
        $result = $this->movieService->getMovieById($id);
        return response()->json($result);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */

    public function updateMovie(MovieRequest $request, $id)
    {
        // Validación de datos
        $movieData = new MovieData();
        $movieData
            ->setMovieId($id)
            ->setMovieName($request->name)
            ->setMovieDescription($request->description)
            ->setMovieDirector($request->director)
            ->setMoviePublicationDate($request->publication_date)
            ->setMovieState($request->state);

        // Actualizar la imagen si se proporciona una nueva
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior
            if ($request->image && file_exists(public_path($request->image))) {
                unlink(public_path($request->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/movies', $imageName);
            $movieData->setMovieImage('movies/' . $imageName);
        }


        $result = $this->movieService->updateMovie($movieData);

        // Devolver la película creada en la respuesta
        return response()->json(['movie' => $result], 201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroyMovie($id)
    {
        $result = $this->movieService->deleteMovie($id);

        return response()->json([
            'mensaje' => '¡Registro eliminado correctamente!',
            'data' => $result
        ]);
    }

    public function getMovieSchedules($id)
    {

        $result = $this->movieService->getMovieSchedules($id);

        return response()->json(['movie_schedules' => $result], 201);
    }

    public function getAllMovieSchedules()
    {

        $result = $this->movieService->getAllMovieSchedules();

        return response()->json(['movie_schedules' => $result], 201);
    }
}
