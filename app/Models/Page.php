<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'status',
    ];

    public function components(): HasMany
    {
        return $this->hasMany(PageComponent::class);
    }
    public function pageComponents(): HasMany
    {
        return $this->hasMany(PageComponent::class);
    }

    public function headerItem(): HasMany
    {
        return $this->hasMany(HeaderItem::class);
    }

    public function footerItem(): HasMany
    {
        return $this->hasMany(FooterItem::class);
    }

    public function getEncryptedIdAttribute(): string|null
    {
        return encrypt_param($this->id);
    }

    public function scopeActive($query)
    {
        return $query->where(['status' => 1]);
    }
}
