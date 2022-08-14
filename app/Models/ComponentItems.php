<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComponentItems extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'value',
        'value1',
        'status',
        'sr_no',
    ];
    function searchKey():string{
        return '##'.$this->getKey().'##';
    }
    function getKey():string{
        return $this->name;
    }
    function getValue():string{
        return $this->value;
    }
}
