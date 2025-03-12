<?php
class Circle {
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function __toString() {
        return "○ з центром в ($this->x, $this->y) і радіусом $this->radius";
    }

    //GET
    public function getX() {
        return $this->x;
    }
    public function getY() {
        return $this->y;
    }
    public function getRadius() {
        return $this->radius;
    }
    //SET
    public function setX($x) {
        $this->x = $x;
    }
    public function setY($y) {
        $this->y = $y;
    }
    public function setRadius($radius) {
        $this->radius = $radius;
    }
}