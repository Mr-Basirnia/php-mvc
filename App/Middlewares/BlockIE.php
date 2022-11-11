<?php

namespace App\Middlewares;

use hisorange\BrowserDetect\Parser as Browser;

class BlockIE implements Contract\MiddlewareInterface
{

    public function handle()
    {
        if (Browser::isIE()) {
            die('IE is blocked !!!');
        }
    }
}