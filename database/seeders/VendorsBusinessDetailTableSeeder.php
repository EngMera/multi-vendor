<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorsBusinessDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors_business_details')->truncate();
        
        $vendorBusiness = [
            'vendor_id'=>'1',
            'shop_name'=>'MyShop',
            'shop_address'=>'ALsafaa',
            'shop_city'=>'Jeddeh',
            'shop_country'=>'KSA',
            'shop_state'=>'Jeddeh',
            'shop_pincode'=>'11221',
            'shop_mobile'=>'012345678',
            'shop_email'=>'MyShop@gmail.com',
            'shop_website'=>'MyShop.sa',
            'address_proof'=>'Passport',
            'address_proof_image'=>'',
            'business_license_number'=>'3234321',
            'gst_number'=>'43676',
            'pan_number'=>'987654',
        ];
        VendorsBusinessDetail::insert($vendorBusiness);
    }
}
