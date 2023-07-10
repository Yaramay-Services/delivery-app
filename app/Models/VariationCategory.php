<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VariationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'menu_id',
        'parent_id',
        'name',
        'display_order',
        'is_required'
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function menuVariation(): HasMany
    {
        return $this->hasMany(MenuVariation::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function variationCategory(): BelongsTo
    {
        return $this->belongsTo(VariationCategory::class, 'parent_id', 'id');
    }
}
