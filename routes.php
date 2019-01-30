<?php

// Create Router instance
$router = new Router();

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