<?php

namespace App\Services;

use App\Models\Header;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class HeaderService.
 */
class HeaderService
{
    function default():Collection{
        return cache()->remember('default_head', custom('cache_seconds'), function (){
            return Header::orderBySr()->select(['id','type','value','value1','value3'])->get();
        });
    }
}
