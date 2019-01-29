<?php

$model = '';
$action = '';

if (isset($_GET) && isset($_GET['controller']) && isset($_GET['action'])) {

    switch($_GET['controller']) :

        case "category":

        break;


        default:
            throw new Exception('Le contrôleur est invalide.');

    endswitch;


    switch($_GET['action']) :

        case "list":
            $action = "findAll";
            break;

        case "show":
            $action = "show";
            $element = $_GET['id'];

        default:
            throw new Exception('L\'action est invalide.');

    endswitch;
}

if (isset($_POST)) {

}
