<?php

class Task
{
    private $_name;



    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function get_name(): string
    {
        return $this->_name;
    }



    public static function getJsonContent($jsonFilePath): array
    {

        if (file_exists($jsonFilePath)) {
            $listData = file_get_contents($jsonFilePath);
            $listTab = json_decode($listData, true);

            return $listTab;
        } else {
            file_put_contents($jsonFilePath, "[]");
            header("Refresh:0");
        }
    }

    public static function editJsonContent($jsonFilePath, $todoArrayContent, $newElement)
    {
        array_push($todoArrayContent, $newElement);
        self::replaceJsonfile($jsonFilePath, $todoArrayContent);
    }

    public static function deleteJsonContent($jsonFilePath, $todoArrayContent, $lineNumber)
    {
        unset($todoArrayContent[$lineNumber]);
        sort($todoArrayContent, SORT_NUMERIC);
        var_dump($todoArrayContent);
        self::replaceJsonfile($jsonFilePath, $todoArrayContent);
    }

    public static function replaceJsonfile($jsonFilePath, $todoArrayContent)
    {
        $todoArrayContent = json_encode($todoArrayContent);
        unlink($jsonFilePath);
        file_put_contents($jsonFilePath, $todoArrayContent);
    }
}
