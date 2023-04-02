<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = 'products_attributes';
    protected $fillable = [
        'product_id',
        'size',
        'price',
        'stock',
        'sku',
        'status',
    ] ;
    // public function products()
    // {
    //     return $this->belongsTo(Product::class,'product_id');
    // }
}
