<?php

// Actor.php

class Actor {

    protected $id;
    protected $firstname;
    protected $lastname;

    const TABLE_NAME = "Actor";

    public function __construct() {

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

    public function setfirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setlastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function save() {

        $this->dbCreate("Actor", [
            "firstname" => $this->firstname(),
            "lastname" => $this->lastname()
        ]);

    }
}