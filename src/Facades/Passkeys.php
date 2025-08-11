<?php

namespace MarcelWeidum\Passkeys\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MarcelWeidum\Passkeys\Passkeys
 */
class Passkeys extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MarcelWeidum\Passkeys\Passkeys::class;
    }
}
