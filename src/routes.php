<?php

namespace Lucas\App;

use FastRoute\RouteCollector;

function routes(DependencyContainer $container): callable
{
    return function (RouteCollector $router) use ($container) {
        $router->get(
            '/',
            $container->personController->registerForm(...)
        );

        $router->post(
            '/register',
            $container->personController->register(...)
        );

        $router->get(
            '/list',
            $container->personController->list(...)
        );
    };
}
