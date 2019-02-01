<?php


class CategoriesController {

    public function index() {
        /**
         * Des traitements de données éventuels...
         */
        $listCats = Category::findAll();
        $title = "Categories";

        /**
         * Rendu de la View
         */
        view('categories.index', compact('listCats', 'title'));
    }

    public function add() {
        view('categories.add');
    }

    public function save() {

        $cat = new Category($_POST['title'], $_POST['description']);
        $cat->save();

        view('categories.save', 'cat');
    }

    public function read($id) {

        $cat = Category::findOne($id);

        var_dump($cat);

        view('categories.read', compact('cat'));
    }

}