<?php

namespace App\Middlewares;

class BlockFirefox implements Contract\MiddlewareInterface
{

    public function handle()
    {
        global $request;
        die(self::class);
    }
}