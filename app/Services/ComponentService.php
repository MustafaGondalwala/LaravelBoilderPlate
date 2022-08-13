<?php

namespace App\Services;

use App\Models\Component;

/**
 * Class ComponentService.
 */
class ComponentService
{
    public function getList()
    {
        return Component::active()->get(['id', 'name']);
    }
}
