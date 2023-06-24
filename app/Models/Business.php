<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Business extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'business_name',
        'address',
        'city',
        'postal',
        'longitude',
        'latitude'
    ];

    public function menu(): HasMany
    {
        return $this->hasMany(Menu::class);
    }


    public function openingHour(): HasMany
    {
        return $this->hasMany(OpeningHour::class);
    }
}
