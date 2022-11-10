<?php

namespace App\Core\Routing;

use App\Core\Request;

class Router
{
    private Request $request;
    private array $routes;
    private mixed $currentRoute;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->routes = Route::routes();
        $this->currentRoute = $this->findRoute($request);

        var_dump($this->currentRoute);
    }

    /**
     * get current route or null.
     *
     * @param Request $request
     * @return array|null
     */
    protected function findRoute(Request $request): array|null
    {
        foreach ($this->routes as $route) {
            if (in_array($request->get_method(), $route['methods']) && $request->get_uri() === $route['slug'])
                return $route;
        }

        return null;
    }

    public function run()
    {
    }
}
