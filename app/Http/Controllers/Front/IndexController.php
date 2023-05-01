<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $sliderBanners = Banner::where('type','slider')->where('status',1)->get();
        $fixedBanners = Banner::where('type','fixed')->where('status',1)->get();

        $newProducts = Product::orderBy('id','desc')->where('status',1)->take(8)->get()->toArray();
        $newCount = Product::where('status',1)->count();

        $bestProducts = Product::where(['is_bestseller'=>'نعم','status'=>1])->inRandomOrder()->limit(8)->get()->toArray();
        $bestCount = Product::where(['is_bestseller'=>'نعم','status'=>1])->count();

        $featuredProducts = Product::where(['is_featured'=>'نعم','status'=>1])->inRandomOrder()->take(8)->get()->toArray();
        $featureCount = Product::where(['is_featured'=>'نعم','status'=>1])->count();
        // dd($bestCount);
        return view('front.index',compact('sliderBanners','fixedBanners','newProducts','bestProducts','featuredProducts','featureCount' ,'newCount','bestCount'));
    }
    public function products($id)
    {
        return $id;
    }
}
