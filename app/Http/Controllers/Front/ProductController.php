<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function products($id = null)
    {
        if ($id == '')
        {
            $allProducts = Product::where('status',1)->get()->toArray();
            return view('front.products.all',compact('allProducts'));
        }
        else
        {
            return $id;
        }
    }
    public function listing()
    {
        $url =  Route::getFacadeRoot()->current()->uri();
        $sections = Section::sections();
        $categoryCount = Category::where(['url'=>$url,'status'=>1])->count();
        if ($categoryCount>0)
        {
            $categoryDetails = Category::categoryDetails($url);
            $categoryProducts = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])
                                         ->where('status',1)->get()->toArray();
            //  dd($categoryProducts);
            return view('front.products.listing',compact('categoryDetails','categoryProducts','sections'));
        }
        else
        {
            abort(404);
        }
        // return view('front.products.listing',compact('allCategories'));

    }
}
