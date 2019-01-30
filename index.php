<?php

/**
 * Composer Autoload
 */
require __DIR__ . '/vendor/autoload.php';

/**
 * Require Config files
 */
foreach( glob('config/*.php') as $config ) { require_once $config; }

/**
 * Require Models
 */
foreach( glob('models/*.php') as $model ) { require_once $model; }

/**
 * Require Controllers
 */
foreach( glob('controllers/*.php') as $controller ) { require_once $controller; }


/**
 * Require routes
 */
require 'routes.php';