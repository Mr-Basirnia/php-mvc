<?php

namespace App\Middlewares;

class BlockIE implements Contract\MiddlewareInterface
{

    public function handle()
    {
        global $request;
        die(self::class);
    }
}