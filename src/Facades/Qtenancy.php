<?php

namespace Morshadun\Qtenancy\Facades;

use Illuminate\Support\Facades\Facade;

class Qtenancy extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'qtenancy';
    }
}
