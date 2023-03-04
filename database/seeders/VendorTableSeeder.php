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

        $vendor = new Vendor();

        $vendor->name = 'Eng Ameera';
        $vendor->email = 'ameera@gmail.com';
        $vendor->address = 'alsafa' ;
        $vendor->city = 'Jeddeh';
        $vendor->country = 'KSA';
        $vendor->state = 'jeddeh';
        $vendor->pincode = '123123';
        $vendor->mobile = '123123123' ;
        $vendor->status = 0 ;

        $vendor->save();
    }
}
