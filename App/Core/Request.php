<?php

namespace App\Core;

class Request
{
    private array $params;
    private string $method;
    private mixed $agent;
    private mixed $ip;
    private array $route_params = [];

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    /**
     * get param value.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name): mixed
    {
        return $this->params[$name] ?? null;
    }

    /**
     * get all params.
     *
     * @return array
     */
    public function get_params(): array
    {
        return $this->params;
    }

    /**
     * get request method.
     *
     * @return string
     */
    public function get_method(): string
    {
        return strtolower($this->method);
    }

    /**
     * get client web browser.
     *
     * @return mixed
     */
    public function get_agent(): mixed
    {
        return $this->agent;
    }

    /**
     * get client ip.
     *
     * @return mixed
     */
    public function get_ip(): mixed
    {
        return $this->ip;
    }

    /**
     * get value from params.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function input(string $key): mixed
    {
        return $this->params[$key] ?? null;
    }

    /**
     * check key is exists in params.
     *
     * @param string $key
     *
     * @return bool
     */
    public function isset(string $key): bool
    {
        return isset($this->params[$key]);
    }

    /**
     * get request uri without query params.
     *
     * @return string
     */
    public function get_uri(): string
    {
        return strtok($_SERVER['REQUEST_URI'], '?');
    }

    /**
     *
     *
     * @param string $key
     * @param string $value
     *
     * @return void
     */
    public function add_route_params(string $key, string $value): void
    {
        $this->route_params[$key] = $value;
    }

    /**
     *
     *
     * @param string|int $key
     *
     * @return mixed|null
     */
    public function get_route_params(string|int $key): mixed
    {
        return $this->route_params[$key] ?? null;
    }
}
