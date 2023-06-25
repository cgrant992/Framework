<?php

namespace Caden\Framework\Http;

use FastRoute\Dispatcher;
use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel {
    public function handle(Request $request): Response {

        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {
            $routes = include BASE_PATH . '/routes/web.php';

            foreach ($routes as $route) {
                $routeCollector->addRoute(...$route);
            }
        });

        // Dispatch a URI, to obtain the route info
        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo(),
        );

        [$status, [$controller, $method], $vars] = $routeInfo;

        // Call the controller method, provided by the route info, in order to create a Response
        $response = call_user_func_array([new $controller, $method], $vars);
        
        return $response;
    }
}