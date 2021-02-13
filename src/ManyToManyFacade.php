<?php

namespace IAmKevinMcKee\ManyToMany;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IAmKevinMcKee\ManyToMany\Skeleton\SkeletonClass
 */
class ManyToManyFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'many-to-many';
    }
}
