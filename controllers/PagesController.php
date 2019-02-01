<?php

// PagesController.php

class PagesController {

    public function home() {

        $title = "Ma page d'accueil";
        view('pages.home', compact('title'));

    }

    public function about() {

        $title = "Page About";
        view('pages.about', compact('title'));
    }
}