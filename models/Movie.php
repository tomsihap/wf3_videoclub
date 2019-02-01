<?php 

// Movie.php

class Movie extends Db {
    
    protected $id;
    protected $title;
    protected $releaseDate;
    protected $plot;
    protected $idCategory;
    protected $category;

    const TABLE_NAME = "Movie";

    public function __construct(string $title, DateTime $date, string $plot, Category $category, int $id = null) {

        $this->setTitle($title);
        $this->setReleaseDate($date);
        $this->setPlot($plot);
        $this->setCategory($category);
        $this->setId($id);

    }

    /** Getters */

    public function id() {
        return $this->id;
    }

    public function title() {
        return $this->title;
    }

    public function releaseDate() {

        $date = new DateTime($this->releaseDate);
        $dateFr = $date->format('d/m/Y H:i');

        return $dateFr;
    }

    public function releaseDateUS() {

        $date = new DateTime($this->releaseDate);
        $dateFr = $date->format('Y-m-d H:i:s');

        return $dateFr;
    }

    public function plot() {
        return $this->plot;
    }

    public function idCategory() {
        return $this->idCategory;
    }
    
    public function category() {

        if ($this->category instanceof Category) {
            return $this->category;
        }

        $this->category = Category::findOne($this->idCategory);
        return $this->category;
    }

    /** Setters */

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setReleaseDate(DateTime $date) {

        $this->releaseDate = $date->format('Y-m-d H:i:s');
        return $this;
    }

    public function setPlot($plot) {
        $this->plot = $plot;
        return $this;
    }

    public function setCategory(Category $category) {

        $this->idCategory = $category->id();

        return $this;

    }

    /** Methods */

    public function save() {
        $data = [
            "title"         => $this->title(),
            "release_date"  => $this->releaseDateUS(),
            "plot"          => $this->plot(),
            "id_category"   => $this->idCategory()
        ];

        if ($this->id > 0) {
            $data["id"] = $this->id();
            $this->dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }

        $this->id = $this->dbCreate(self::TABLE_NAME, $data);

        return $this;
    }

    public function delete() {

        $data = [
            'id' => $this->id(),
        ];
        
        $this->dbDelete(self::TABLE_NAME, $data);

        return;
    }

    public static function findAll() {
        return Db::dbFind(self::TABLE_NAME);
    }

    public static function find(array $request) {
        return Db::dbFind(self::TABLE_NAME, $request);
    }

    public static function findOne(int $id) {

        $element = Db::dbFind(self::TABLE_NAME, [
            ['id', '=', $id]
        ]);

        $element = $element[0];

        $date = new DateTime($element['release_date']);

        $category = Category::findOne($element['id_category']);

        $cat = new Movie($element['title'], $date, $element['plot'], $category);

        return $cat;
    }


}