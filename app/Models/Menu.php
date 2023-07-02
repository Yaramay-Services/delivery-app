<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Menu extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'business_id',
        'menu_name',
        'price',
        'selling_price',
        'display_order',
        'is_published',
        'hits',
    ];

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }

    public function menuCategory()
    {
        return $this->belongsToMany(MenuCategory::class);
    }

    public function category()
    {
        return $this->belongsToMany(MenuCategory::class);
    }
}
