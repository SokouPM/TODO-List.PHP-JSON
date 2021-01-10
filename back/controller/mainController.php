<?php

require('back/model/Task.php');     // call the model

class MainController
{

    public static function runApp(): void
    {

        $jsonFilePath = "back/json/list.json";      // set the path of json file
        $todoArrayContent = Task::getJsonContent($jsonFilePath);      // call getJsonContent function

        switch (key($_GET)) {

            case null:
                /************************************* Main page *************************************/
                $arrayLineIndex = 0;     // to get the array line
                require_once('front/view/mainPage.php');    // show main page

                break;

            case 'addTask':
                /********************************* Add task code page ********************************/
                if (isset($_POST['newTaskName']) && !empty($_POST['newTaskName'])) {    // check if field value exist and is not empty
                    $newTaskName = filter_var($_POST['newTaskName'], FILTER_SANITIZE_SPECIAL_CHARS); // secure the entered data
                } else {
                    header('location: index.php');  // go to main page
                }

                $newTask = new Task($newTaskName);  // create a new Task object with the model
                $newTaskArray = ['name' =>  $newTask->get_name()];  // create an array with the get_name function
                Task::editArrayContent($jsonFilePath, $todoArrayContent, $newTaskArray); // call the editArrayContent function 
                header('location: index.php');  // go to main page

                break;

            case 'deleteTask':
                /********************************* delete task code page ********************************/
                $lineIndex = intval($_POST['arrayLineIndex']);  // get the number of the row to delete
                Task::deleteArrayContent($jsonFilePath, $todoArrayContent, $lineIndex); // call the deleteArrayContent function 
                header('location: index.php');  // go to main page

                break;

            default:
                break;
        }
    }
}
