<?php

require('back/model/Task.php');

class MainController
{

    public static function runApp(): void
    {

        $jsonFilePath = "back/json/list.json";
        $todoArrayContent = Task::getJsonContent($jsonFilePath);

        switch (key($_GET)) {

            case null:

                $elementNumber = 0;
                require_once('front/view/mainPage.php');
                
                break;

            case 'addTask':

                if (isset($_POST['newTask']) && !empty($_POST['newTask'])) {
                    $newTaskName = filter_var($_POST['newTask'], FILTER_SANITIZE_SPECIAL_CHARS);
                } else {
                    header('location: index.php');
                }

                $newTask = new Task($newTaskName);
                $newTaskArray = ['name' =>  $newTask->get_name()];
                Task::editJsonContent($jsonFilePath, $todoArrayContent, $newTaskArray);
                header('location: index.php');

                break;

            case 'deleteTask':

                $lineNumber = intval($_POST['taskNumber']);
                Task::deleteJsonContent($jsonFilePath, $todoArrayContent, $lineNumber);
                header('location: index.php');

                break;

            default:
                break;
        }
    }
}
