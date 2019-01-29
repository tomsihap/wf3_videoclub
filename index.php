<?php

foreach( glob('config/*.php') as $config ) { require_once $config; }
foreach( glob('classes/*.php') as $class ) { require_once $class; }


/** 
 * Tests des Save et Delete 
 */

$cat = new Category("Humour", "Des films drôles");
$cat->setTitle('Nouveau titre 2');
$cat->save();
// $cat->delete();

$actor = new Actor('Emma', 'Watson');
$actor->save();
// $actor->delete();

$releaseDate = new DateTime('now');

$movie = new Movie("Le livre de la jungle", $releaseDate, "Un film sur la jungle et les livres", $cat);
$movie->save();
// $movie->delete();

/**
 * Test des Getters
 */

echo "<hr>";
echo 'Getters :';
var_dump(   $movie->title()   );
var_dump(   $cat->description()   );
var_dump(   $actor->firstname()   );
var_dump(   $movie->category()->title()   );

/**
 * Test des Setters
 */

echo "<hr>";
echo 'Contenu de $cat, $movie, $actor <strong>avant</strong> modification :';
var_dump($movie->category());
var_dump($movie);
var_dump($actor);

$movie->category()->setTitle('Nouveau titre de ma catégorie');
$movie->category()->save();

$movie->setTitle('Nouveau titre de mon film');
$movie->save();

$actor->setFirstname('Thomas');
$actor->save();


echo "<hr>";
echo 'Contenu de $cat, $movie, $actor <strong>après</strong> modification :';
var_dump($movie->category());
var_dump($movie);
var_dump($actor);


//$categorie = Category::findOne(25);
//var_dump($categorie);


//$list = Category::findAll();

$cats = Category::find([
    ['title', 'like', 'humour'],
    ['description', 'like', 'rire']
]);

var_dump($cats);


$movie->title(); // Un film a accès à son titre

// impossible : Movie::title(); (l'usine donne des titres aux films, mais elle-même n'a pas de titre)

Movie::findAll(); // L'usine a accès à tous les films créés

// impossible: $movie->findAll(); (un film n'a pas accès aux autres films créés)