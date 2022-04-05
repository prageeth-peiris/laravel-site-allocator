<?php

namespace PrageethPeiris\SiteAllocator;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PrageethPeiris\SiteAllocator\Skeleton\SkeletonClass
 */
class SiteAllocatorFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'site-allocator';
    }
}
