<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'associated_num');
    // }
    // public function products(): HasMany
    // {
    //     return $this->hasMany(ProductShop::class, 'id');
    // }
}