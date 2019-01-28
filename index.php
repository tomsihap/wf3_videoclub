<?php

foreach( glob('config/*.php') as $config ) { require_once $config; }
foreach( glob('classes/*.php') as $class ) { require_once $class; }


$cat = new Category("Humour", "Des films drôles");

$cat->save();

var_dump($cat);

$cat->delete();

$cat->getList();

$list = $cat->getList();

var_dump($list);