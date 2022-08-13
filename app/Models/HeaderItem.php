<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeaderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sr_no',
        'type',
        'value',
        'value1',
        'status',
        'page_id',
    ];
}
