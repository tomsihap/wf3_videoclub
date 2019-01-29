<?php 

// Movie.php

class Movie extends Db {
    
    protected $id;
    protected $title;
    protected $releaseDate;
    protected $plot;
    protected $id_category;

    public function __construct() {

    }

    public function id() {
        return $this->id;
    }

    public function title() {
        return $this->title;
    }

    public function releaseDate() {
        return $this->releaseDate;
    }

    public function plot() {
        return $this->plot;
    }

    public function idCategory() {
        return $this->idCategory;
    }
    
    public function category() {
        // return $this->category->name;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;
        return $this;
    }

    public function setPlot($plot) {
        $this->plot = $plot;
        return $this;
    }

    public function setCategory(Category $category) {

        // $this->category_id = $category->id();

        return $this;
    }


    public function save() {
        $this->dbCreate("Movie", [
            "title"         => $this->title(),
            "release_date"  => $this->releaseDate(),
            "plot"          => $this->plot()
        ]);
    }

    public function deleteActor($idActor) {
        $this->dbDelete('Movie', [
            'id_movie' => $this->id(),
            'id_actor' => $idActor
        ]);
    }

}

$movie = new Movie();
/* 

$movie->categoryId();

$movie->category()->description();

$movie->actors();
 */