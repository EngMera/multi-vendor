<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function banners()
    {
        $banners = Banner::get();
        return view('admin.banners.banners',compact('banners'));
    }
}
