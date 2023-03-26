<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::with(['section','category'])->get()->toArray();
        return view('admin.products.products',compact('products'));
    }
    public function updateProductStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            if ($data['status']== 'Active')
            {
                $status = 0;
            }
            else
            {
                $status = 1;
            }
            Product::where('id',$data['product_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'product_id'=>$data['product_id']]);
        }
    }
    public function addEditProduct(Request $request , $id = null)
    {
        if ($id == "")
        {
            $title = "أضافة منتج جديد";
            $product = new Product();
            $success_message = "تم أضافة المنتج بنجاح";
            $send = "أضافة";

        }
        else
        {
            $title = "تعديل المنتج ";
            $product = Product::findOrFail($id);
            $success_message = "تم تعديل المنتج بنجاح";
            $send = "تعديل";
        }
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            $rules = [
                'product_name'=> 'required|regex:/^[\pL\s\-]+$/u',
                'product_code'=> 'required|regex:/^\w+$/u',
                'product_price'=> 'required|numeric',
                'category_id'=> 'required',
                'brand_id'=> 'required',
                'meta_title'=>'required|max:255',
                'meta_description'=>'required',
                'meta_keywords'=>'required',
            ];

            $customMessage = [
                'product_name.required'=>'يجب اضافة اسم المنتج',
                'product_name.regex'=>'تنسيق الاسم غير صحيح',
                'product_code.required'=>'يجب اضافة كود المنتج',
                'product_code.regex'=>'تنسيق الكود غير صحيح',
                'product_price.required'=>'يجب اضافة السعر ',
                'product_price.numeric'=>' يجب ان يكون السعر رقما ',
                'category_id.required'=>'يجب اضافة هذا الحقل',
                'brand_id.required'=>'يجب اضافة هذا الحقل',
                'meta_title.required'=>' يجب اضافة هذا الحقل',
                'meta_title.max'=>' يجب الا يزيد عن 255 حرف',
                'meta_description.required'=>' يجب اضافة هذا الحقل',
                'meta_keywords.required'=>' يجب اضافة هذا الحقل',
            ];
            $this->validate($request,$rules,$customMessage);

             $categoryDetails = Category::find($data['category_id']);
             $product->section_id = $categoryDetails['section_id'];
             $product->category_id = $data['category_id'];
             $product->brand_id = $data['brand_id'];

             $adminType = Auth::guard('admin')->user()->type;
             $vendor_id = Auth::guard('admin')->user()->vendor_id;
             $admin_id = Auth::guard('admin')->user()->id;

             $product->admin_type = $adminType;
             $product->admin_id = $admin_id;

             if($adminType == "vendor")
             {
                $product->vendor_id = $vendor_id;
             }
             else
             {
                $product->vendor_id = 0;
             }

             $product->product_name = $data['product_name'];
             $product->product_code = $data['product_code'];
             $product->product_color = $data['product_color'];
             $product->product_price = $data['product_price'];
             $product->product_discount = $data['product_discount'];
             $product->product_weight = $data['product_weight'];
             $product->description = $data['description'];
             $product->long_description = $data['long_description'];
             $product->meta_title = $data['meta_title'];
             $product->meta_description = $data['meta_description'];
             $product->meta_keywords = $data['meta_keywords'];

             if (!empty($data['is_featured'])) 
             {
                $product->is_featured = $data['is_featured'];
             }
             else
             {
                $product->is_featured = "لا";
             }

             // Upload product Image 
             $uploadPath = 'uploads/product/';
           if ($request->hasFile('product_image')) {
               $file = $request->file('product_image');
               $ext = $file->getClientOriginalExtension();
               $filename = time().'.'.$ext;
               $file->move('uploads/product/', $filename);

               $product->product_image =  $uploadPath.$filename;
           }

             $product->status = $request->status == true ? '1':'0';
             $product->save();
            //  return $request;

            return redirect('admin/products')->with('success_message',$success_message) ;
        }
       

        // Get Sections With Categories 
        $categories = Section::with('categories')->get()->toArray();

        // Get All Brands
        $brands = Brand::where('status',1)->get()->toArray();

        return view('admin.products.add-edit-product',compact('product','title','send','success_message','categories','brands'));
        
    }
    public function delete($id)
    {
        $product =  Product::find($id); 
        $path = $product->product_image; 
        if (File::exists($path)) 
         {
          File::delete($path);
        }
        $product->delete();
        $success_message = "تم حذف المنتج بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
}
