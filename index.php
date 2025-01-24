<?php

use Controller\DatabaseController;
// import all necessary elements
require 'Controller/DatabaseController.php';
require 'Route.php';

// setup usefull variable
$db = new DatabaseController();
$page = $_GET['page'] ?? Page::Home;

include match ($page) {
    Page::Home => Route::Home->value,
    default => Route::NotFound->value,
};
