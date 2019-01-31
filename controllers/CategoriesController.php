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
        include('./views/categories/index.php');
    }

    public function add() {

        include('./views/categories/add.php');
    }

    public function save() {

        $cat = new Category($_POST['title'], $_POST['description']);
        $cat->save();

        include('./views/categories/save.php');
    }

    public function read($id) {

        $cat = Category::findOne($id);

        var_dump($cat);

        include('./views/categories/read.php');
    }

}