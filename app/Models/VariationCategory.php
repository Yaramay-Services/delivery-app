<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VariationCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_required'
    ];

    public function menuVariation(): HasOne
    {
        return $this->hasOne(MenuVariation::class);
    }
}
