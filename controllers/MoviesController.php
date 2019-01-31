<?php


class MoviesController {

    public function index() {
        /**
         * Des traitements de données éventuels...
         */

        /**
         * Rendu de la View
         */
        include('./views/movies/index.php');
    }

    public function add() {

        $cats = Category::findAll();

        include('./views/movies/add.php');
    }

    public function save() {

        var_dump($_POST);
        
        $date = new DateTime($_POST['release_date']);
        $category = Category::findOne($_POST['category_id']);

        $film = new Movie($_POST['title'], $date, $_POST['plot'], $category);
        $film->save();

        include('./views/movies/save.php');
    }

    public function read() {
        include('./views/movies/read.php');
    }

}