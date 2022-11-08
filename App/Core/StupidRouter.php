<?php

namespace App\Core;

use App\Utilities\Url;

class StupidRouter
{
    private array $routes;

    public function __construct()
    {
        $this->routes = [
            '/red' => 'colors/red.php',
            '/green' => 'colors/green.php',
            '/blue' => 'colors/blue.php',
        ];
    }

    public function run(): void
    {
        $current_route = Url::current_route();

        foreach ($this->routes as $route => $view) {
            if ($current_route === $route) {
                $this->includeAndDie(BASEPATH . '/views/' . $view);
            }
        }

        header("HTTP/1.0 404 Not Found");
        $this->includeAndDie(BASEPATH . '/views/errors/404.php');
    }

    private function includeAndDie(string $route): void
    {
        include $route;
        die();
    }
}