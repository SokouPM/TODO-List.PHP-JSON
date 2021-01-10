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

    /****** array processing functions ******/

    public static function editArrayContent($jsonFilePath, $todoArrayContent, $newElement): void
    {
        array_push($todoArrayContent, $newElement);     // create a new array line
        self::replaceJsonfile($jsonFilePath, $todoArrayContent);    // call replaceJsonfile function
    }

    public static function deleteArrayContent($jsonFilePath, $todoArrayContent, $lineIndex): void
    {
        unset($todoArrayContent[$lineIndex]);     // delete an array line with its index
        sort($todoArrayContent, SORT_NUMERIC);      // sort the array to update lines numbers
        self::replaceJsonfile($jsonFilePath, $todoArrayContent);    // call replaceJsonfile function
    }

    /****** JSON file processing functions ******/

    public static function getJsonContent($jsonFilePath): array
    {

        if (file_exists($jsonFilePath)) {     // check if json file exist
            $listData = file_get_contents($jsonFilePath);     // get json file content
            $listArray = json_decode($listData, true);   // transforms json content into array

            return $listArray;   // return list array
        } else {
            file_put_contents($jsonFilePath, "[]");     // create a json file with its content
            header("Refresh:0");    // refresh page
        }
    }

    public static function replaceJsonfile($jsonFilePath, $todoArrayContent): void
    {
        $todoJsonContent = json_encode($todoArrayContent);   // transforms array into json content
        unlink($jsonFilePath);  // delete old json file
        file_put_contents($jsonFilePath, $todoJsonContent);  // create new json file with content
    }
}
