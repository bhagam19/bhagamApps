<?php

class Task {
    private $id;
    private $title;
    private $description;
    private $assigned_to;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getAssignedTo() {
        return $this->assigned_to;
    }

    public function setAssignedTo($assigned_to) {
        $this->assigned_to = $assigned_to;
    }
}

