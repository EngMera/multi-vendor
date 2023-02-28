<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $admin = [
            ['id'=>'1',
            'name'=>'EngMera',
            'email'=>'fordesigns5@gmail.com',
            'password'=>Hash::make('12345678'),
            'type'=>'superadmin',
            'mobile'=>'01234567890',
            'vendor_id'=>'0',
            'image'=>'',
            'status'=>1,],
        ];
        Admin::insert($admin);
    }
}
