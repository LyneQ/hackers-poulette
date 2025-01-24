<?php

use Controller\DatabaseController;
// import all necessary element
require 'Controller/DatabaseController.php';

// setup usefull variable
$db = new DatabaseController();
$page = $_GET['page'] ?? 'null';


switch ($page) {
    case 'home':
        include 'View/home.php';
        break;
    default:
        include 'View/404.php';
        break;
}
