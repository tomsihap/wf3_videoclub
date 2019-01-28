<?php

class Db {

    protected $bdd;

    const DB_HOST = 'localhost';
    const DB_PORT = '3308';
    const DB_NAME = 'videoclub';
    const DB_USER = 'root';
    const DB_PWD  = '';

    public function __construct() { /** */ }

    private function getDb() {
        try {
            // Essaie de faire ce script...
            $this->bdd = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8;port='.self::DB_PORT, self::DB_USER, self::DB_PWD);
        }
        catch (Exception $e) {
            // Sinon, capture l'erreur et affiche la
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function dbCreate(string $table, array $data) {

        $this->getDb();

        // Construction de la requête au format : INSERT INTO $table($data.keys) VALUES(:$data.keys) 
        $req  = "INSERT INTO " . $table;
        $req .= " (`".implode("`, `", array_keys($data))."`)";
        $req .= " VALUES (:".implode(", :", array_keys($data)).") ";

        $response = $this->bdd->prepare($req);

        $response->execute($data);

        return $this->bdd->lastInsertId();
    }

    public function dbDelete(string $table, array $data) {

        $this->getDb();

        // Construction de la requête au format : INSERT INTO $table($data.keys) VALUES(:$data.keys) 
        $req  = "DELETE FROM " . $table . " WHERE " . array_keys($data)[0] . " = :" . array_keys($data)[0];

        $response = $this->bdd->prepare($req);

        $response->execute($data);

        return;
    }

    public function dbFind(string $table, array $data = null) {

        $this->getDb();

        $req = "SELECT * FROM " . $table;

        $response = $this->bdd->query($req);

        $data = [];

        while ($donnees = $response->fetch()) {
            $data[] = $donnees;
        }

        return $data;

    }


}