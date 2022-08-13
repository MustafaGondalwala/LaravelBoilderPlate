<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageComponents extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getEncryptedIdAttribute()
    {
        return encrypt_param($this->id);
    }
}

