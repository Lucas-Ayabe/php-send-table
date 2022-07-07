<?php
require_once __DIR__ . "/../vendor/autoload.php";

$dispatcher = FastRoute\simpleDispatcher(
    Lucas\App\routes(
        new Lucas\App\DependencyContainer()
    )
);

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        http_response_code(404);
        echo "Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        http_response_code(405);
        echo "Method Not Allowed - the allowed methods are " . join(', ', $allowedMethods);
        break;
    case FastRoute\Dispatcher::FOUND:
        [, $handler, $vars] = $routeInfo;
        $handler(...$vars);
        break;
    default:
        http_response_code(500);
        echo "Internal Server Error";
}
