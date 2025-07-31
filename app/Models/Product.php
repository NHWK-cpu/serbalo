<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image_url',
        'category_id'
    ];

    public function category_id():BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
    public function cartItems() {
        return $this->hasMany(CartItem::class);
    }
}
