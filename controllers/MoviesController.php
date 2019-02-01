<?php


class MoviesController {

    public function index() {

        $movies = Movie::findAll();
        view('movies.index', compact('movies'));
    }

    public function add() {

        $cats = Category::findAll();
        view('movies.add', compact('cats'));
    }

    public function save() {
        $date = new DateTime($_POST['release_date']);
        $category = Category::findOne($_POST['category_id']);

        $film = new Movie($_POST['title'], $date, $_POST['plot'], $category);
        $film->save();

        view('movies.save', compact('film', 'date', 'category'));
    }

    public function read() {
        view('movies.read');
    }
}