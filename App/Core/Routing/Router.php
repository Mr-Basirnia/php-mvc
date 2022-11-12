<?php

namespace App\Core\Routing;

use App\Core\Request;
use Exception;
use RuntimeException;

class Router
{
    private Request $request;
    private array $routes;
    private array|null $currentRoute;
    protected const BASE_CONTROLLER_NAMESPACE = 'App\Controllers\\';

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->routes = Route::routes();
        $this->currentRoute = $this->findRoute($request);

        $this->routeMiddlewares();
    }

    /**
     * get current route or null.
     *
     * @param Request $request
     *
     * @return array|null
     */
    protected function findRoute(Request $request): array|null
    {
        foreach ($this->routes as $route) {
            if ($request->get_uri() === $route['slug'])
                return $route;
        }

        return null;
    }

    /**
     * start router.
     *
     * @return void|null
     * @throws Exception
     */
    public function run()
    {
        if ($this->invalidRequest() === false)
            return;

        $this->dispatch();
    }

    /**
     * check client send request.
     *
     * @return bool
     */
    protected function invalidRequest(): bool
    {
        // check route is exists
        if ($this->currentRoute === null) {
            $this->dispatch404();
            return false;
        }

        // check client request is valid
        if (in_array($this->request->get_method(), $this->currentRoute['methods']) === false) {
            $this->dispatch405();
            return false;
        }

        return true;
    }

    /**
     * router dispatch.
     *
     * @throws Exception
     */
    private function dispatch(): void
    {
        $action = $this->currentRoute['action'];

        // action is null or empty
        if ($action === null || $action === '') {
            return;
        }

        // action is closure
        if (is_callable($action)) {
            $action();
            return;
        }

        // action is string , explode and get class name and method
        if (is_string($action)) {
            $action = explode('@', $action);
        }

        // action is array and have controller class name and method
        if (is_array($action)) {
            [$class, $method] = $action;

            $controller_name = self::BASE_CONTROLLER_NAMESPACE . $class;

            if (!class_exists($controller_name)) {
                throw new RuntimeException("class $controller_name not found");
            }

            $object = new $controller_name();

            if (!method_exists($object, $method)) {
                throw new RuntimeException("method $method in class $class not exists");
            }

            $object->{$method}();
        }
    }

    /**
     * 404 page response.
     *
     * @return void
     */
    private function dispatch404(): void
    {
        header("HTTP/1.0 404 Not Found");
        view('errors.404');
        die();
    }

    /**
     * 405 page response.
     *
     * @return void
     */
    private function dispatch405(): void
    {
        header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
        view('errors.405');
        die();
    }

    /**
     * run route middlewares.
     *
     * @return void
     */
    private function routeMiddlewares(): void
    {
        $middlewares = $this->currentRoute['middleware'] ?? null;

        if ($middlewares === null) {
            return;
        }

        foreach ($middlewares as $middleware) {
            if (class_exists($middleware)) {
                $object = new $middleware;
                $object->handle();
            }
        }

        die();
    }
}
