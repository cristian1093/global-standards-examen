<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\MovieService;
use App\Models\Data\MovieData;

class MovieServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = $this->app->make(MovieService::class);
    }

    /**
     * @test
     */
    public function createMovie()
    {
        $movieData = new MovieData();
        $movieData
            ->setMovieName("batman")
            ->setMovieDescription("superheroe")
            ->setMovieDirector("sin director")
            ->setMoviePublicationDate("2024-06-22")
            ->setMovieState(true)
            ->setMovieImage("qweqw");

        $result = $this->service->createMovie($movieData);
        $this->assertTrue($result);

    }
    /**
     * @test
     */
    public function getAllMoviesTest()
    {
        $result = $this->service->getAllMovies();


        $expectedKeys = ['name', 'description', 'director', 'publication_date', 'state', 'image'];
        $this->assertArrayHasKeys($expectedKeys, $result->toArray()[0]);
    }



    /**
     * @test
     */
    public function getMovieById()
    {
        $result = $this->service->getMovieById(2);
        $expectedKeys = ['name', 'description', 'director', 'publication_date', 'state', 'image'];

        $this->assertArrayHasKeys($expectedKeys, $result->toArray());
    }



 /**
     * @test
     */

    public function updateMovie()
    {
        $movieData = new MovieData();
        $movieData
            ->setMovieId(2)
            ->setMovieName("batman")
            ->setMovieDescription("superheroe")
            ->setMovieDirector("sin director")
            ->setMoviePublicationDate("2024-06-22")
            ->setMovieState(true)
            ->setMovieImage("qweqw");

        $result = $this->service->updateMovie($movieData);

        $expectedKeys = ['id','name', 'description', 'director', 'publication_date', 'state', 'image','created_at','updated_at'];

        $this->assertArrayHasKeys($expectedKeys, $result->toArray());

    }

    /**
     * @test
     */
    public function getMovieSchedules()
    {
        $result = $this->service->getMovieSchedules(2);

        $expectedKeys = ['id','name', 'description', 'director', 'publication_date', 'state', 'image'];

        $this->assertArrayHasKeys($expectedKeys, $result->toArray());
    }
    /**
     * @test
     */
    public function deleteMovie()
    {
        $result = $this->service->deleteMovie(1);
        $this->assertNull($result);
    }


    // Custom assertion method
    protected function assertArrayHasKeys(array $keys, array $array)
    {
        foreach ($keys as $key) {
            $this->assertArrayHasKey($key, $array);
        }
    }
}
