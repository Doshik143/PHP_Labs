<?php
namespace Classes;
require_once 'Classes/Human.php';
class Programmer extends Human {
    private $languages = [];
    private $experience;

    public function __construct($height, $weight, $age, $languages, $experience) {
        parent::__construct($height, $weight, $age);
        $this->languages = $languages;
        $this->experience = $experience;
    }
    //GET
    public function getLanguages() {
        return $this->languages;
    }
    public function getExperience() {
        return $this->experience;
    }
    //SET
    public function setLanguages($languages) {
        $this->languages = $languages;
    }
    public function setExperience($experience) {
        $this->experience = $experience;
    }
    //NewProgrammingLanguage
    public function addLanguage($language) {
        $this->languages[] = $language;
    }
    //AbstractMethod
    protected function onChildBirth() {
        return "Програміст народив дитину! Тепер він/вона має менше часу на кодування.";
    }
    //InterfaceMethods
    public function cleanRoom() {
        return "Програміст прибирає кімнату.";
    }
    public function cleanKitchen() {
        return "Програміст прибирає кухню.";
    }
}