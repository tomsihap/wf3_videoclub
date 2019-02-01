<?php

// Category.php

class Category extends Db {

    /**
     * Attributs
     */
    protected $id;
    protected $title;
    protected $description;

    /**
     * Constantes
     */

    const TABLE_NAME = "Category";

    /**
     * Méthodes magiques
     */
    public function __construct($title, $description, $id = null) {
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setId($id);
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

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

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

        $data = [
            "title"         => $this->title(),
            "description"   => $this->description()
        ];

        if ($this->id > 0) {
            $data["id"] = $this->id();

            $this->dbUpdate(self::TABLE_NAME, $data);
            return $this;
        }

        $this->id = $this->dbCreate(self::TABLE_NAME, $data);

        return $this;
    }

    public function delete() {

        $data = [
            'id' => $this->id(),
        ];
        
        $this->dbDelete(self::TABLE_NAME, $data);

        return;
    }

    public static function findAll() {
        return Db::dbFind(self::TABLE_NAME);
    }

    public static function find(array $request) {
        return Db::dbFind(self::TABLE_NAME, $request);
    }

    public static function findOne(int $id) {

        $element = Db::dbFind(self::TABLE_NAME, [
            ['id', '=', $id]
        ]);

        $element = $element[0];

        $cat = new Category($element['title'], $element['description'], $element['id']);

        return $cat;
    }

}
