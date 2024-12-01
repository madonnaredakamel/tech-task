<?php

require_once 'controllers/CategoryController.php';
require_once 'controllers/CourseController.php';

// Match request URI to specific routes
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestUri === '/categories' && $requestMethod === 'GET') {
    (new CategoryController())->index();
} elseif (preg_match('/^\/categories\/(\d+)$/', $requestUri, $matches) && $requestMethod === 'GET') {
    (new CategoryController())->show($matches[1]);
} elseif ($requestUri === '/courses' && $requestMethod === 'GET') {
    (new CourseController())->index();
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found']);
}
