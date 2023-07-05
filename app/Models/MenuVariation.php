<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'menu_id',
        'variation_category_id',
        'price',
        'selling_price',
        'menu_variation_name',
        'parent_id',
    ];

    public function variationCategory(): BelongsTo
    {
        return $this->belongsTo(VariationCategory::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(VariationCategory::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
