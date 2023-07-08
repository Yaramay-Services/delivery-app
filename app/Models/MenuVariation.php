<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'variation_category_id',
        'price',
        'selling_price',
        'menu_variation_name',
    ];

    public function variationCategory(): BelongsTo
    {
        return $this->belongsTo(VariationCategory::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(VariationCategory::class);
    }
}
