<?php

namespace Core\Router\Contracts;

interface RouteInterface {

    public static function get($url, $handler, $method = 'GET');

    public static function post($url, $handler, $method = 'POST');

    public static function put($url, $handler, $method = 'PUT');

    public static function patch($url, $handler, $method = 'PATCH');

    public static function delete($url, $handler, $method = 'DELETE');

    public static function options($url, $handler, $method = 'OPTIONS');
    
    public static function addRoute($url, $handler, $method, $requestMethod);

    public static function dispatch();

    public static function callControllerMethod($handler, $params);

}