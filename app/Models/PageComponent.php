<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }

    public function scopeActive($query)
    {
        return $query->where(['status' => 1]);
    }
}
