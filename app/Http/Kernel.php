<?php

namespace App\Http;

use Illuminate\Foundation\Configuration\Middleware;

class Kernel
{
    public function __invoke(Middleware $middleware)
    {
        $middleware->appendToGroup('web', \App\Http\Middleware\BasketIsNotEmpty::class);
    }
}
