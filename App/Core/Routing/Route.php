<?php

namespace App\Core\Routing;

class Route
{
    private static array $routes = [];

    protected static function add(array|string $methods, $slug, $action, array $middleware)
    {
        $methods = is_array($methods) ? $methods : [$methods];

        self::$routes[] = [
            'methods' => $methods,
            'slug' => $slug,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public static function get($slug, $action = null, array $middleware = [])
    {
        self::add('get', $slug, $action, $middleware);
    }

    public static function post($slug, $action = null, array $middleware = [])
    {
        self::add('post', $slug, $action, $middleware);
    }

    public static function put($slug, $action = null, array $middleware = [])
    {
        self::add('put', $slug, $action, $middleware);
    }

    public static function patch($slug, $action = null, array $middleware = [])
    {
        self::add('patch', $slug, $action, $middleware);
    }

    public static function delete($slug, $action = null, array $middleware = [])
    {
        self::add('delete', $slug, $action, $middleware);
    }

    public static function options($slug, $action = null, array $middleware = [])
    {
        self::add('options', $slug, $action, $middleware);
    }

    /**
     * get routes list.
     *
     * @return array
     */
    public static function routes(): array
    {
        return self::$routes;
    }
}
