<?php
namespace Classes;
class FileHandler {
    public static $dir = "text";
    //ReadFile
    public static function readFile($filename) {
        $filePath = self::$dir . "/" . $filename;
        if (file_exists($filePath)) {
            return file_get_contents($filePath);
        } else {
            return "Файл $filename не знайдено.<br>";
        }
    }
    //RecFile
    public static function writeFile($filename, $content) {
        $filePath = self::$dir . "/" . $filename;
        file_put_contents($filePath, $content, FILE_APPEND);
        return "Дані успішно додані до файлу $filename.<br>";
    }
    //DelFile
    public static function clearFile($filename) {
        $filePath = self::$dir . "/" . $filename;
        if (file_exists($filePath)) {
            file_put_contents($filePath, "");
            return "Вміст файлу $filename успішно очищено.<br>";
        } else {
            return "Файл $filename не знайдено.<br>";
        }
    }
}