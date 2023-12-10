<?php

require 'vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$router = require 'src/routes.php';
$router->dispatch($uri);