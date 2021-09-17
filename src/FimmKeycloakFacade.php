<?php

namespace RaditzFarhan\FimmKeycloak;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RaditzFarhan\FimmKeycloak\Skeleton\SkeletonClass
 */
class FimmKeycloakFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fimm-keycloak';
    }
}
