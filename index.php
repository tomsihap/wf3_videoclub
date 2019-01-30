<?php

// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';

foreach( glob('config/*.php') as $config ) { require_once $config; }
foreach( glob('models/*.php') as $model ) { require_once $model; }
foreach( glob('controllers/*.php') as $controller ) { require_once $controller; }

require 'routes.php';