<?php


class ActorsController {

    public function index() {

        $actors = Actor::findAll();
        $title = "Acteurs";

        view('actors.index', compact('actors', 'title'));
    }

    public function add() {

        view('actors.add');
    }

    public function save() {

        $actor = new Actor($_POST['firstname'], $_POST['lastname']);
        $actor->save();

        $this->add();

        view('actors.save', compact('actor'));
    }

    public function read($id) {

        $actor = Actor::findOne($id);

        view('actors.read', compact('actor'));
    }

}
