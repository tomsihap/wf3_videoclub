<?php

class Db {

    protected $bdd;

    const DB_HOST = '';
    const DB_PORT = '';
    const DB_NAME = '';
    const DB_USER = '';
    const DB_PWD  = '';

    public function __construct() {

        try {
            // Essaie de faire ce script...
            $bdd = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8;port='.self::DB_PORT, self::DB_USER, self::DB_PWD);
        }
        catch (Exception $e) {
            // Sinon, capture l'erreur et affiche la
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function dbCreate(string $table, array $data) {

        // build query...
        $req  = "INSERT INTO table";

        // implode keys of $array...
        $req .= " (`".implode("`, `", array_keys($array))."`)";

        // implode values of $array...
        $req .= " VALUES ('".implode("', '", $array)."') ";

        $req = "INSERT INTO ";

    }


}