<?php

namespace App\Services;

use App\Models\Footer;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class FooterService.
 */
class FooterService
{
    function default():Collection{
        return Footer::orderBySr()->get();
    }
}
