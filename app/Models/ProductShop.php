<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductShop extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'category' => 'array',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(FlowerShop::class);
        //'id'
    }
}