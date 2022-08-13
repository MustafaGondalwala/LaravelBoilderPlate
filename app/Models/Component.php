<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'html',
        'status',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(ComponentItems::class);
    }
    public function getEncryptedIdAttribute()
    {
        return encrypt_param($this->id);
    }
    public function scopeActive($query)
    {
        return $query->where('status',1);
    }
    public function scopeOrderBySr($query)
    {
        return $query->orderBy('sr_no');
    }
}
