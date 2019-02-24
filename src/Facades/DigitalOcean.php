<?php

namespace JeroenG\DigitalOcean\Facades;

use Illuminate\Support\Facades\Facade;
use JeroenG\DigitalOcean\DigitalOcean as Accessor;

class DigitalOcean extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Accessor::class;
    }
}
