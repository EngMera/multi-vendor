<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class,'product_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }


}
