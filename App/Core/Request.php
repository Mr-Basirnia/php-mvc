<?php

namespace App\Core;

class Request
{
    private array $params;
    private string $method;
    private mixed $agent;
    private mixed $ip;

    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $_SERVER['REMOTE_ADDR'];
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
        return $this->method;
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
     * @return bool
     */
    public function isset(string $key): bool
    {
        return isset($this->params[$key]);
    }
}
