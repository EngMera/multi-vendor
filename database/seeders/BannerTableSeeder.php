<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->truncate();
        $banners = [
            [
                'image'=>'uploads/banner/banner-1.jpg',
                'link'=>'مجموعه -الربيع',
                'title'=>'مجموعة الربيع',
                'alt'=>'مجموعة الربيع',
                'status'=>1,
            ],
            [
                'image'=>'uploads/banner/banner-2.jpg',
                'link'=>'ملابس - علوية',
                'title'=>' ملابس علوية',
                'alt'=>'ملابس علوية ',
                'status'=>1,
            ],
        ];
        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
