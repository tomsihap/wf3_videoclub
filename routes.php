<?php

// Create Router instance
$router = new Router();

$router->get('/', 'PagesController@home' );
$router->get('/about', 'PagesController@about');

/**
 * 
 * GET /movies => Contrôleur "Movies", méthode : "index"
 *      => Du html + un faux tableau/liste de film (la vue serait dans /views/films)

 * GET /movies/add => Contrôleur "Movies", méthode : "add"
 *      => Du html avec un formulaire pour créer un film


 * POST /movies/save => Contrôleur "Movies", métode: "save"
 *      => Du html avec un texte "Le film a bien été enregistré."

 * /movies/(\d+)  => Contrôleur "Movies", méthode : "read", un argument "$id"
 *      => Du html avec un faux titre de film
 */








$router->get('/movies', function() {
    echo "liste des films :";
});

$router->get('/categories', function() {
    echo "liste des catégories :";
});

$router->get('/categories/ma-categorie', function() {
    echo "Ma catégorie :";
});

$router->get('/actors', function() {
    echo "liste des acteurs";
});























$router->get('/a-propos', function() {
    echo "Bienvenue sur a propos";
    die;
});

$router->get('/hello/(\w+)', function($name) {

    echo "hello " . $name;
    die;
});


$router->get('/testcontroller/(\w+)', 'CategoryController@show');



$router->get('article/(\w+)', function ($articleSlug) {

    "select * from articles where slug = " . $articleSlug;

});

$router->get('article/(\d+)', function ($articleId) {

    "select * from articles where id = " . $articleId;

});

$router->get('category/(\d+)', "Category@findOne");


// Run it!
$router->run();