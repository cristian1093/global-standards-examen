<?php

namespace App\Models\Data;


/**
 * Movie data
 * @class
 */
class MovieData
{

    /**
     * Movie Id
     *
     * @var string
     */
    protected string $movieId;

    /**
     * Movie Name
     *
     * @var string
     */
    protected string $movieName;


    /**
     * Movie Description
     *
     * @var string
     */
    protected string $movieDescription;

    /**
     * Movie Director
     *
     * @var string
     */
    protected string $movieDirector;

       /**
     * Movie Publication Date
     *
     * @var string
     */
    protected string $moviePublicationDate;


       /**
     * Movie State
     *
     * @var bool
     */
    protected string $movieState;

        /**
     * Movie Image
     *
     * @var string
     */
    protected string $movieImage;


     /**
     * @return string
     */
    public function getMovieId(): string
    {
        return $this->movieId;
    }

    /**
     * @param  string  $movieId
     *
     * @return self
     */
    public function setMovieId(string $movieId): self
    {
        $this->movieId = $movieId;
        return $this;
    }


    /**
     * @return string
     */
    public function getMovieName(): string
    {
        return $this->movieName;
    }

    /**
     * @param  string  $movieName
     *
     * @return self
     */
    public function setMovieName(string $movieName): self
    {
        $this->movieName = $movieName;
        return $this;
    }


       /**
     * @return string
     */
    public function getMovieDescription(): string
    {
        return $this->movieDescription;
    }

    /**
     * @param  string  $movieDescription
     *
     * @return self
     */
    public function setMovieDescription(string $movieDescription): self
    {
        $this->movieDescription = $movieDescription;
        return $this;
    }

       /**
     * @return string
     */
    public function getMovieDirector(): string
    {
        return $this->movieDirector;
    }

    /**
     * @param  string  $movieDirector
     *
     * @return self
     */
    public function setMovieDirector(string $movieDirector): self
    {
        $this->movieDirector = $movieDirector;
        return $this;
    }

       /**
     * @return string
     */
    public function getMoviePublicationDate(): string
    {
        return $this->moviePublicationDate;
    }

    /**
     * @param  string  $moviePublicationDate
     *
     * @return self
     */
    public function setMoviePublicationDate(string $moviePublicationDate): self
    {
        $this->moviePublicationDate = $moviePublicationDate;
        return $this;
    }

       /**
     * @return bool
     */
    public function getMovieState(): string
    {
        return $this->movieState;
    }

    /**
     * @param  bool  $movieState
     *
     * @return self
     */
    public function setMovieState(string $movieState): self
    {
        $this->movieState = $movieState;
        return $this;
    }

       /**
     * @return string
     */
    public function getMovieImage(): string
    {
        return $this->movieImage;
    }

    /**
     * @param  string  $movieImage
     *
     * @return self
     */
    public function setMovieImage(string $movieImage): self
    {
        $this->movieImage = $movieImage;
        return $this;
    }
}
