<?php
namespace Classes;
class Circle {
    private $x;
    private $y;
    private $radius;

    public function __construct($x, $y, $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }
    // __toString()
    public function __toString() {
        return "центр ($this->x, $this->y); радіус $this->radius";
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

    public function intersects(Circle $otherCircle) {
        $dx = $this->x - $otherCircle->getX();
        $dy = $this->y - $otherCircle->getY();
        $distance = sqrt($dx * $dx + $dy * $dy);

        $radiusSum = $this->radius + $otherCircle->getRadius();
        $radiusDiff = abs($this->radius - $otherCircle->getRadius());

        return ($distance <= $radiusSum) && ($distance >= $radiusDiff);
    }
}