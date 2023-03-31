<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_attributes')->truncate();
        $attributes =[
            [
                'product_id'=>1,
                'size'=>'Small',
                'price'=>500,
                'stock'=>10,
                'sku'=>'WT001-S',
                'status'=>1,
            ],
            [
                'product_id'=>1,
                'size'=>'Medium',
                'price'=>600,
                'stock'=>20,
                'sku'=>'WT001-M',
                'status'=>1,
            ],
            [
                'product_id'=>1,
                'size'=>'Large',
                'price'=>700,
                'stock'=>30,
                'sku'=>'WT001-L',
                'status'=>1,
            ],
        ];
        foreach ($attributes as $attribute) {
            ProductAttribute::create($attribute);
        }
    }
}
