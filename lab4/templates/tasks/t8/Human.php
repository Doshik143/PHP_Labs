<?php
namespace t8;
class Human {
    private $height;
    private $weight;
    private $age;

    public function __construct($height, $weight, $age) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }
    //GET
    public function getHeight() {
        return $this->height;
    }
    public function getWeight() {
        return $this->weight;
    }
    public function getAge() {
        return $this->age;
    }
    //SET
    public function setHeight($height) {
        $this->height = $height;
    }
    public function setWeight($weight) {
        $this->weight = $weight;
    }
    public function setAge($age) {
        $this->age = $age;
    }
}