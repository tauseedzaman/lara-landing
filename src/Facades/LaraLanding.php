<?php

namespace Tauseedzaman\LaraLanding\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Tauseedzaman\LaraLanding\LaraLanding
 */
class LaraLanding extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Tauseedzaman\LaraLanding\LaraLanding::class;
    }
}
