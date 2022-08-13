<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'name',
        'status'
    ];

    public function components(){
        return $this->hasMany(PageComponent::class);
    }
    public function headerItem(){
        return $this->hasMany(HeaderItem::class);
    }
    public function footerItem(){
        return $this->hasMany(FooterItem::class);
    }

    public function getEncryptedIdAttribute()
    {
        return encrypt_param($this->id);
    }
}
