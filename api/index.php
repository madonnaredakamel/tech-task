<?php


require 'routes.php';

header("Content-Type: application/json");

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

handleRequest($requestUri, $requestMethod);

