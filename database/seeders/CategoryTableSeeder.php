<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        $categories = [
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'الرجال','category_image'=>'','category_discount'=>0,
             'description'=>'','url'=>'رجال','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','status'=>1,
            ],
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'النساء','category_image'=>'','category_discount'=>0,
             'description'=>'','url'=>'نساء','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','status'=>1,
            ],
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'الاطفال','category_image'=>'','category_discount'=>0,
             'description'=>'','url'=>'اطفال','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','status'=>1,]
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
