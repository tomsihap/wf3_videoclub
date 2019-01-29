<?php

foreach( glob('config/*.php') as $config ) { require_once $config; }
foreach( glob('classes/*.php') as $class ) { require_once $class; }


/** Tests des Save */

$cat = new Category("Humour", "Des films drôles");
$cat->setTitle('Nouveau titre 2');
$cat->save();

$actor = new Actor('Johnny', 'Depp');
$actor->save();

$releaseDate = new DateTime('now');

$movie = new Movie("Le livre de la jungle", $releaseDate, "Un film sur la jungle et les livres", $cat);
$movie->save();

var_dump(  $movie->category()->title()   );




//$cat->delete();

//$categorie = Category::findOne(25);
//var_dump($categorie);


// var_dump($cat);

// $cat->delete();

// $cat->getList();

//$list = Category::findAll();

$cats = Category::find([
    ['title', 'like', 'humour'],
    ['description', 'like', 'rire']
]);

var_dump($cats);