<?php

namespace Core\Router\Contracts;

interface RouteApiInterface {

    public static function get(
        string $url, $handler, ?string $middleware = null
    ): void;
    
    public static function post(
        string $url, $handler, ?string $middleware = null
    ): void;

    public static function put(
        string $url, $handler, string $method = 'PUT'
    ): void;

    public static function patch(
        string $url, $handler, string $method = 'PATCH'
    ): void;

    public static function delete(
        string $url, $handler, string $method = 'DELETE'
    ): void;

    public static function options(
        string $url, $handler, string $method = 'OPTIONS'
    ): void;
    
    public static function addRoute(
        string $url, $handler, string $method, ?string $middleware = null
    ): void;

    public static function addMiddleware(
        string $middleware
    ): void;

    public static function dispatch(): bool;

}