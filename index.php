<?php

declare(strict_types=1);    // to impose "types" on variables and methods.

header('content-type: text/html; charset=utf-8');   // to get accents

require('back/controller/mainController.php');   // call the controller

MainController::runApp();   // run app with the controller