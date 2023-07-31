<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItems extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "order_details_id",
        "menu_variation_id",
        "business_id",
        "variation_category_id",
        "price",
        "selling_price",
        "menu_variation_name"
    ];
}
