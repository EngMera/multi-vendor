<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorBankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors_bank_details')->truncate();
        $vendorBank = [
            'vendor_id'=>1,
            'account_holder_name'=>'اميرة العبسي',
            'bank_name'=>'بنك الراجحي',
            'account_number'=>12345678,
        ];
        VendorsBankDetail::create($vendorBank);
    }
}
