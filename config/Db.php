<?php

class Db {

    const DB_HOST = 'localhost';
    const DB_PORT = '3308';
    const DB_NAME = 'videoclub';
    const DB_USER = 'root';
    const DB_PWD  = '';

    public function __construct() { /** */ }

    private static function getDb() {
        try {
            // Essaie de faire ce script...
            $bdd = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8;port='.self::DB_PORT, self::DB_USER, self::DB_PWD);
        }
        catch (Exception $e) {
            // Sinon, capture l'erreur et affiche la
            die('Erreur : ' . $e->getMessage());
        }

        return $bdd;
    }

    protected static function dbCreate(string $table, array $data) {

        $bdd = self::getDb();

        // Construction de la requête au format : INSERT INTO $table($data.keys) VALUES(:$data.keys) 
        $req  = "INSERT INTO " . $table;
        $req .= " (`".implode("`, `", array_keys($data))."`)";
        $req .= " VALUES (:".implode(", :", array_keys($data)).") ";

        $response = $bdd->prepare($req);

        $response->execute($data);

        return $bdd->lastInsertId();
    }

    protected static function dbDelete(string $table, array $data) {

        $bdd = self::getDb();

        // Construction de la requête au format : INSERT INTO $table($data.keys) VALUES(:$data.keys) 
        $req  = "DELETE FROM " . $table . " WHERE " . array_keys($data)[0] . " = :" . array_keys($data)[0];

        $response = $bdd->prepare($req);

        $response->execute($data);

        return;
    }

    protected static function dbFind(string $table, array $request = null) {

        $bdd = self::getDb();

        $req = "SELECT * FROM " . $table;

        if (isset($request)) {

            $req .= " WHERE ";

            $reqOrder = '';

            foreach($request as $r) {

                switch($r[0]):

                    case "orderBy":
                        $reqOrder = " ORDER BY `" . htmlspecialchars($r[1]) . "` " . htmlspecialchars($r[2]);
                        break;
                    
                    default:
                        $req .= "`". htmlspecialchars($r[0]) . "` " . htmlspecialchars($r[1]) . " '" . htmlspecialchars($r[2]) . "'";
                        $req .= " AND ";

                endswitch;
                
            }

            $req = substr($req, 0, -5);
            $req .= $reqOrder;

        }

        $response = $bdd->query($req);

        $data = [];

        while ($donnees = $response->fetch()) {
            $data[] = $donnees;
        }

        if (count($data) == 1) {
            $data = $data[0];
        }

        return $data;

    }

    protected static function dbUpdate(string $table, array $data) {

        //$bdd = self::getDb();

        $req  = "UPDATE " . $table . " SET ";

        $whereIdString = '';

        foreach($data as $key => $value) {
            if ($key == 'id') {
                $whereIdString = " WHERE id = " . $value;
            }

            else {

                $req .= "`" . $key . "` = :" . $key . ", ";

            }
        }

        $req = substr($req, 0, -2);
        $req .= $whereIdString;

        var_dump($req);
        die();

        $response = $bdd->prepare($req);

        $response->execute($data);

        return $bdd->lastInsertId();
    }
}