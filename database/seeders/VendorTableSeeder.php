<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->truncate();
        $vendor  = [
            'name'=>'Eng Ameera',
            'email'=>'ameera@gmail.com',
            'address'=>'alsafa',
            'city'=>'Jeddeh',
            'country'=>'KSA',
            'state'=>'jeddeh',
            'pincode'=>'12312',
            'mobile'=>'123123123',
            'status'=>0
        ];
        Vendor::insert($vendor);
    }
}
