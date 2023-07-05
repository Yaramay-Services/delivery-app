<?php

namespace App\Models;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name', 'business_id'];

    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }
}
