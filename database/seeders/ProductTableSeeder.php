<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        $product = [
            'section_id'=>1,
            'category_id'=>1,
            'brand_id'=>1,
            'vendor_id'=>1,
            'admin_id'=>2,
            'admin_type'=>'vendor',
            'product_name'=>'تيشرت ابيض',
            'product_code'=>'123',
            'product_color'=>'ابيض',
            'product_price'=>100,
            'product_old_price'=>120,
            'product_discount'=>20,
            'product_weight'=>300,
            'product_video'=>'',
            'product_image'=>'',
            'description'=>'قطن - ناعم ',
            'long_description'=>'',
            'meta_title'=>'',
            'meta_description'=>'تيشرت ابيض',
            'meta_keywords'=>'تيشرت ابيض',
            'is_featured'=>'نعم',
            'is_bestseller'=>'نعم',
            'status'=>1,
        ];
        Product::create($product);
    }
}
