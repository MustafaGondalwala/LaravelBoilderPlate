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
        return cache()->remember('default_footer', custom('cache_seconds'), function (){
            return Footer::orderBySr()->select(['id','type','value','value1'])->get();
        });
    }
}
