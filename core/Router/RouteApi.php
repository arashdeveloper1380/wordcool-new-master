<?php

namespace Core\Router;

use Core\Router\Contracts\RouteApiInterface;
use Core\Router\Exceptions\RouteException;

class RouteApi implements RouteApiInterface
{
    private static array $routes = [];
    private static array $middlewares = [];

    public static function get(
        string $url, $handler, ?string $middleware = null
    ): void {
        self::addRoute($url, $handler, 'GET', $middleware);
    }

    public static function post(
        string $url, $handler, ?string $middleware = null
    ): void {
        self::addRoute($url, $handler, 'POST', $middleware);
    }

    public static function put(
        string $url, $handler, string $method = 'PUT'
        ): void {
        self::addRoute($url, $handler, $method);
    }

    public static function patch(
        string $url, $handler, string $method = 'PATCH'
        ): void {
        self::addRoute($url, $handler, $method);
    }

    public static function delete(
        string $url, $handler, string $method = 'DELETE'
    ): void {
        self::addRoute($url, $handler, $method);
    }

    public static function options(
        string $url, $handler, string $method = 'OPTIONS'
    ): void {
        self::addRoute($url, $handler, $method);
    }

    public static function addRoute(
        string $url, $handler, string $method, ?string $middleware = null
    ): void {
        $urlPattern = '#^' . $url . '$#'; 

        self::$routes[] = [
            'url' => $urlPattern,
            'handler' => $handler,
            'method' => $method,
            'middleware' => $middleware,
        ]; 
    }

    public static function addMiddleware(
        string $middleware
    ): void {
        self::$middlewares[] = $middleware;
    }

    public static function dispatch(): bool
    {
        $uri    = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['method'] != $method) {
                continue;
            }

            if (preg_match($route['url'], $uri, $matches)) {
                array_shift($matches);

                $queryParams = self::extractQueryParams($uri);
                $matches[] = $queryParams;

                self::handleMiddlewares($route['middleware']);

                self::handleRouteHandler($route['handler'], $matches);

                return true;
            }
        }

        throw new RouteException('Route Not Found', 404);
    }

    private static function extractQueryParams(string $uri) : array{

        $queryString = parse_url($uri, PHP_URL_QUERY);
        parse_str($queryString, $queryParams);

        return $queryParams;
    }

    private static function handleMiddlewares(?string $middlewareString) :void{
        if ($middlewareString) {
            $middlewares = explode(',', $middlewareString);

            foreach ($middlewares as $middleware) {
                self::validateAndRunMiddleware($middleware);
            }
        }
    }

    private static function validateAndRunMiddleware(string $middleware) :void{
        if (!in_array($middleware, self::$middlewares)) {
            throw new RouteException("Middleware '$middleware' is not registered", 500);
        }

        $middlewareClass = 'App\Http\Middlewares\\' . $middleware;
        $middlewareObj = new $middlewareClass();
        $middlewareObj->handle();

        if (!$middlewareObj->handle()) {
            exit;
        }
    }

    private static function handleRouteHandler($handler, $params) :void{
        if (is_callable($handler)) {
            call_user_func_array($handler, $params);
        } else {
            self::callControllerMethod($handler, $params);
        }
    }

    private static function callControllerMethod(string $handler, array $params) :void{
        $handlerParts = explode('@', $handler);

        if (count($handlerParts) != 2) {
            throw new RouteException('Invalid handler format', 500);
        }

        $controllerName = 'App\Http\Controllers\\' . str_replace('/', '\\', $handlerParts[0]);
        $methodName = $handlerParts[1];

        if (!class_exists($controllerName)) {
            throw new RouteException('Controller class not found', 500);
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            throw new RouteException('Controller method not found', 500);
        }

        $controller->$methodName(...$params);
    }
}