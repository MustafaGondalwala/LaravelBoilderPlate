<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageLink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'value',
        'page_id',
        'status'
    ];

    public function getEncryptedIdAttribute():string
    {
        return encrypt_param($this->id);
    }
    public function page():BelongsTo{
        return $this->belongsTo(Page::class);
    }
    public function scopeWithPages($query){
        return $query->with('page');
    }
}

