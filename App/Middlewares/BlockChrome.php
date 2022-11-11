<?php

namespace App\Middlewares;

use hisorange\BrowserDetect\Parser as Browser;

class BlockChrome implements Contract\MiddlewareInterface
{

    public function handle()
    {
        if (Browser::isChrome()) {
            die('chrome is blocked !!!');
        }
    }
}