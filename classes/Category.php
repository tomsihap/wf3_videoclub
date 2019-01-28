<?php

// Category.php

class Category extends Db {

    /**
     * Attributs
     */
    protected $id;
    protected $title;
    protected $description;
    protected $bdd;

    /**
     * Constantes
     */

    const TABLE_NAME = "Category";

    /**
     * Méthodes magiques
     */
    public function __construct($title, $description) {
        $this->setTitle($title);
        $this->setDescription($description);
    }

    /**
     * Getters
     */
    public function id() {
        return $this->id;
    }

    public function title() {
        return $this->title;
    }

    public function description() {
        return $this->description;
    }

    /**
     * Setters
     */
    public function setTitle($title) {

        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * Methods
     */

    public function save() {

        $idApresCreation = $this->dbCreate(TABLE_NAME, [
            "title"         => $this->title(),
            "description"   => $this->description()
        ]);

        $this->id = $idApresCreation;

        return $this;
    }

    public function delete() {
        
        $this->dbDelete(TABLE_NAME, [
            'id' => $this->id(),
        ]);
    }

    public function getList() {

        /* $this->dbFind("Category", [
            ["description", "=", "humour"],
            ["title", "like", "comédie"]
        ]); */

        return $this->dbFind(TABLE_NAME);
    }
}
