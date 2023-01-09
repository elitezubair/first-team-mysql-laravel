<?php

namespace Rifrocket\Facades\LaravelCmsV2\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rifrocket\LaravelCmsV2\Skeleton\SkeletonClass
 */
class LaravelCmsV2Facade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-cms-v2';
    }
}
