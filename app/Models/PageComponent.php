<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageComponent extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sr_no',
        'component_id',
        'status',
    ];

    public function getEncryptedIdAttribute()
    {
        return encrypt_param($this->id);
    }

    public function scopeActive($query)
    {
        return $query->where(['status' => 1]);
    }
}
