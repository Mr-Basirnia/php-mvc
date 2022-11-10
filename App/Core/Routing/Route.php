<?php

namespace App\Core\Routing;

class Route
{
    private static array $routes = [];

    protected static function add(array |string $methods, $slug, $action)
    {
        $methods = is_array($methods) ? $methods : [$methods];

        self::$routes[] = [
            'methods' => $methods,
            'slug' => $slug,
            'action' => $action
        ];
    }

    public static function get($slug, $action = null)
    {
        self::add('get', $slug, $action);
    }
    public static function post($slug, $action = null)
    {
        self::add('post', $slug, $action);
    }
    public static function put($slug, $action = null)
    {
        self::add('put', $slug, $action);
    }
    public static function patch($slug, $action = null)
    {
        self::add('patch', $slug, $action);
    }
    public static function delete($slug, $action = null)
    {
        self::add('delete', $slug, $action);
    }
    public static function options($slug, $action = null)
    {
        self::add('options', $slug, $action);
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
