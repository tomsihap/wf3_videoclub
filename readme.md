# Exercices de POO


## 1. Setup

Vous devez réaliser les classes suivantes avec les tables correspondantes :

```
Employee
--------
id
firstname
lastname
position (=> 'accounting', 'seller', 'marketing')
employement_date
```

```
Customer
--------
id
firstname
lastname
status (=> 'regular', 'vip', 'premium')
```

## 2. Classes

Vous devez réaliser les classes pour les tables ci-dessus. Voici un modèle :

```php

class ClassName extends Db {

    /**
     * Liste des attributs (variables)
     */

    /**
     * Liste des constantes
     */

    /**
     * Méthodes magiques ( __construct() { ... } )
     */
    /**
     * Liste des getters
     */

    /**
     * Liste des setters avec validation pour les champs "status" et "position"
     */

    /**
     * Liste des méthodes de calls en DB (save/delete/find/findOne/findAll)
     */
}
```

## 3. Méthodes de calls en DB

Pour implémenter les méthodes qui communiquent avec la DB, vous allez utiliser les méthodes fournies dans la classe mère `DB`.


Voici la documentation de chaque méthode de DB :

```php

class Db {
/**
     * Permet d'enregistrer (INSERT) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un INSERT
     * @param array     $data   Array contenant en clé les noms des champs de la table, en valeurs les values à enregistrer
     * 
     * Exemple :
     * $table = "Category";
     * $data = [
     *      'title'         => "Nouvelle catégorie",
     *      'description'   => 'Ma nouvelle catégorie.',
     * ];
     */
    protected static function dbCreate(string $table, array $data) {}

    /**
     * Permet de supprimer (DELETE) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un DELETE
     * @param array     $data   Array contenant en clé la PK de la table, en value la valeur à donner.
     * 
     * Exemple: 
     * $table = "Movie";
     * $data = [ 'id' => 3 ];
     */
    protected static function dbDelete(string $table, array $data) {}

    /**
     * Permet de récupérer (SELECT) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un SELECT
     * @param array     $request   Array contenant une liste de trios ["champ", "opérateur", "valeur"].
     * 
     * Exemple: 
     * $table = "Movie";
     * $request = [
     *      [ 'title', "like",'Rocky' ],
     *      [ 'realease_date', '>', '2000-01-01']
     * ];
     */
    protected static function dbFind(string $table, array $request = null) {}

    /**
     * Permet de mettre à jour (UPDATE) des données en base de données.
     * @param string    $table  Nom de la table dans lequel faire un UPDATE
     * @param array     $data   Array contenant en clé les noms des champs de la table, en valeurs les values à enregistrer.
     * 
     * OBLIGATOIRE : Passer un champ 'id' dans le tableau 'data'.
     * 
     * Exemple :
     * $table = "Category";
     * $data = [
     *      'id'            => 4,
     *      'title'         => "Nouveau titre de catégorie",
     *      'description'   => 'Ma nouvelle catégorie.',
     * ];
     */
    protected static function dbUpdate(string $table, array $data) {}

}
```

Et voici comment, depuis Employee par exemple, utiliser la classe Db :


```php

class Employee extends Db {


    const TABLE_NAME = "Employee";

    public function save() {

        // J'utilise une classe de la mère grâce à : $this->....
        // $this->dbCreate();

        // D'après la documentation, je sais qu'il y a deux paramètres à dbCreate() :

        // @param string    $table  Nom de la table dans lequel faire un INSERT
        // @param array     $data   Array contenant en clé les noms des champs de la table, en valeurs les values à enregistrer


        // Comme j'ai créé une constante avec le nom de la table TABLE_NAME, j'ai déjà le premier argument.

        // Pour deuxième argument, je vais devoir composer un tableau contenant les données à fournir.

        // J'utilise les getters pour accéder aux données de mon objet à mettre dans le tableau !

        $donneesSave = [
            'firstname' =>  $this->firstname(),
            'lastname'  =>  $this->lastname(),
            'position'  =>  $this->position(),
            'employement_date' => $this->employement_date()
        ];

        // Enfin, j'appelle la méthode mère correctement :

        $this->dbCreate(TABLE_NAME, $donneesSave);

    }
}
```


# Gestion de dépendances avec Composer

1. Installer Composer et choisir la bonne version de PHP-CLI (7.2.10 sur notre config par exemple)
2. Créer un fichier .gitignore à la racine du projet en incluant la ligne : `vendor/`
3. Importer une dépendance : `composer require bramus/router ~1.3`
4. Utiliser l'autoloader : `require __DIR__ . '/vendor/autoload.php';`