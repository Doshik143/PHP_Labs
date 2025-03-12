<?php
namespace t8;

require_once 'Human.php';
class Student extends Human {
    private $university;
    private $course;

    public function __construct($height, $weight, $age, $university, $course) {
        parent::__construct($height, $weight, $age);
        $this->university = $university;
        $this->course = $course;
    }
    //GET
    public function getUniversity() {
        return $this->university;
    }
    public function getCourse() {
        return $this->course;
    }
    //SET
    public function setUniversity($university) {
        $this->university = $university;
    }
    public function setCourse($course) {
        $this->course = $course;
    }
    //NewCourse
    public function promoteToNextCourse() {
        $this->course++;
    }
    //AbstractMethod
    protected function onChildBirth() {
        return "Студент народив дитину! Він/вона тепер має більше відповідальності.";
    }
}