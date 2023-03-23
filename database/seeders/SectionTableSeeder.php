<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->truncate();
        $sections = [
            ['name'=>'ملابس',
            'status'=>1],
            ['name'=>'الكترونيات',
            'status'=>1],
            ['name'=>'أجهزة ',
            'status'=>1],
        ];
        foreach ($sections  as $section) {
            Section::create($section);
        }
    }
}
