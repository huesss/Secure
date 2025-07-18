<?php
declare(strict_types=1);
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

if (defined('DEBUG_MODE') && constant('DEBUG_MODE') === true) {
    file_put_contents('debug.log', print_r($_POST, true), FILE_APPEND);
}

$requiredModules = ['waf', 'rate_limit', 'csrf', 'auth', 'template'];
foreach ($requiredModules as $module) {
    require_once "core/{$module}.php";
}

$routes = [
    '/' => 'pages/login.php',
    '/register' => 'pages/register.php',
    '/profile' => 'pages/profile.php',
    '/feedback' => 'pages/feedback.php',
];

$uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
if (array_key_exists($uri, $routes) && file_exists($routes[$uri])) {
    require $routes[$uri];
} else {
    http_response_code(array_key_exists($uri, $routes) ? 500 : 404);
    header('Content-Type: text/plain');
    exit(array_key_exists($uri, $routes) ? 'Internal Server Error' : '404 Not Found');
}