<?php

class Itinerary {
    private $id;
    private $fotoja;
    private $titulli;
    private $description;

    public function __construct($fotoja, $titulli, $description, $id = null, $user_id = null,) {
        $this->id = $id;
        $this->fotoja = $fotoja;
        $this->titulli = $titulli;
        $this->description = $description;
        $this->user_id = $user_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getFotoja() {
        return $this->fotoja;
    }

    public function getTitulli() {
        return $this->titulli;
    }

    public function getDescription() {
        return $this->description;
    }
    public function getUser_Id() {
        return $this->user_id;
    }
}
?>
