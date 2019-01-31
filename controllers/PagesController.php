<?php

// PagesController.php

class PagesController {

    public function home() {

        $title = "Ma page d'accueil";

        include('./views/pages/home.php');
    }

    public function about() {

        $title = "Page About";
        include('./views/pages/about.php');
    }
}