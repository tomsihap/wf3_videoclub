<?php

// Actor.php

class Actor extends Db {

    protected $id;
    protected $firstname;
    protected $lastname;

    const TABLE_NAME = "Actor";

    public function __construct(string $firstname, string $lastname) {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
    }

    public function id() {
        return $this->id;
    }

    public function firstname() {
        return $this->firstname;
    }

    public function lastname() {
        return $this->lastname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function save() {

        $data = [
            "firstname" => $this->firstname(),
            "lastname" => $this->lastname()
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
}