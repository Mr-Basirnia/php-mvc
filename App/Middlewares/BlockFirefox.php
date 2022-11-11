<?php

namespace App\Middlewares;

use hisorange\BrowserDetect\Parser as Browser;

class BlockFirefox implements Contract\MiddlewareInterface
{

    public function handle()
    {
        if (Browser::isFirefox()) {
            die('firefox is blocked !!!');
        }
    }
}