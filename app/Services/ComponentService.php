<?php

namespace App\Services;

use App\Models\Component;

/**
 * Class ComponentService.
 */
class ComponentService
{
    function getList(){
        return Component::active()->get(['id','name']);
    }
}
