<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_id',
        'business_id',
        'menu_id',
        'group',
        'menu_name',
        'price',
        'selling_price'
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }
}
