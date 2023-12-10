<?php

use MVC\Router;
use MVC\Controllers\UserController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
    