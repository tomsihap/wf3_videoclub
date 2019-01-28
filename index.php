<?php

foreach( glob('config/*.php') as $config ) { require_once $config; }
foreach( glob('classes/*.php') as $class ) { require_once $class; }



$cat = new Category("Test", "Test test");
$cat->save();
var_dump($cat);
$cat->delete();
