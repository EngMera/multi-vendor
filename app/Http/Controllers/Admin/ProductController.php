<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::with(['section','category'])->paginate(10);
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
                'product_old_price'=> 'numeric',
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
                'product_old_price.numeric'=>' يجب ان يكون السعر رقما ',
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
             $product->product_old_price = $data['product_old_price'];
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

             if (!empty($data['is_bestseller']))
             {
                $product->is_bestseller = $data['is_bestseller'];
             }
             else
             {
                $product->is_bestseller = "لا";
             }

             // Upload product Image
             $uploadPath = 'uploads/product/images/';
             if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/product/images/', $filename);
                $product->product_image =  $uploadPath.$filename;
             }

            //  Upload Product Video
            $uploadPath = 'uploads/product/videos/';
            if ($request->hasFile('product_video')) {
                $file = $request->file('product_video');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/product/videos/', $filename);
                $product->product_video =  $uploadPath.$filename;
             }
             $product->status = 1;
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
    public function deleteProductImage($id)
    {
        $product =  Product::findOrFail($id);
        $path = $product->product_image;
        if (File::exists($path))
         {
          File::delete($path);
        }
        Product::where('id',$id)->update(['product_image'=>'']);
        return redirect()->back();
    }
    public function addEditAttributes(Request $request , $id)
    {
        $product =  Product::select('id','product_name','product_code','product_color','product_price','product_image')
                            ->with('attributes')->findOrFail($id);
        // $product = json_decode(json_encode($product),true);

        $title = "أضافة صفات المنتج ";
        $success_message = "تم أضافة صفات المنتج بنجاح";
        $send = "أضافة";
        if ($request->isMethod('post')) {
            $data = $request->all();
            foreach ($data['sku'] as $key => $value)
            {
                if (!empty($value))
                {
                    $skuCount = ProductAttribute::where('sku',$value)->count();
                    if ($skuCount>0)
                    {
                        return redirect()->back()->with('error_message','وحدة حفظ المخزون SKU موجودة سابقا اعد ادخال قيمة اخرى');
                    }
                    $sizeCount = ProductAttribute::where(['product_id'=>$id,'size'=>$data['size'][$key]])->count();
                    if ($sizeCount>0)
                    {
                        return redirect()->back()->with('error_message','الحجم    موجودة سابقا اعد ادخال قيمة اخرى');
                    }
                    $attribute = new ProductAttribute();
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status = $request->status == true ? '1':'0';
                    $attribute->save();

                }
            }
            return redirect()->back()->with('success_message',$success_message);
        }


        return view('admin.products.add-edit-attributes',compact('product','title','success_message','send'));


    }
    public function editAttribute(Request $request ,$id)
    {
            if ($request->isMethod('post'))
            {
                $data = $request->all();
                $attributeId = $data['id'];
                $attribute = ProductAttribute::findOrFail($attributeId);

                $rules = [
                    'size'=>'required|string',
                    'price'=>'required',
                    'sku'=>'required',
                    'stock'=>'required',
                ];

                $customMessage= [
                    'size.required'=>'هذا الحقل مطلوب',
                    'size.string'=>'هذا الحقل يجب ان يكون نصا ',
                    'price.required'=>'هذا الحقل مطلوب',
                    'sku.required'=>'هذا الحقل مطلوب',
                    'stock.required'=>'هذا الحقل مطلوب',
                ];
                $this->validate($request,$rules,$customMessage);
                $attribute->size = $data['size'];
                $attribute->sku = $data['sku'];
                $attribute->price = $data['price'];
                $attribute->stock = $data['stock'];
                // $attribute->status = $request->status == true ? '1':'0';
                $attribute->update();
                return redirect()->back()->with('success_message','تم تعديل الصفه بنجاح');
            }
    }
    public function addImages(Request $request , $id)
    {
        $product = Product::select(
                                   ['id','product_name','product_code','product_color',
                                   'product_price','product_image'])
                            ->with('images')->findOrFail($id);

       if($request->isMethod('post'))
       {
            // Upload product Image
            $i = 0;
            $uploadPath = 'uploads/product/images/';
            // Upload Product Images
            if ($request->hasFile('image'))
            {
                foreach ($request->file(['image']) as $image)
                {
                    $ext = $image->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$ext;
                    $image->move($uploadPath, $filename);
                    $final =  $uploadPath.$filename;
                    $product->images()->create([
                        'product_id'=>$product->id,
                        'image'=>$final,
                        'status'=>1,
                    ]);
                }

            }
            //  Upload Product main image
            if ($request->hasFile('product_image')) {
                $file = $request->file('product_image');
                $extention = $file->getClientOriginalExtension();
                $imageName = time().'.'.$extention;
                $file->move($uploadPath, $imageName);
                $product->product_image= $uploadPath.$imageName;
                $product->update();
            }
            return redirect()->back()->with('success_message',' تم اضافة'.$i.' الصور بنجاح');
       }


        // return response()->json(['success'=>$imageName]);
        return view('admin.products.add-images',compact('product'));
    }
    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);
        $path = $image->image;
        if (File::exists($path))
         {
          File::delete($path);
        }
        $image->delete();
        return redirect()->back();
    }

    public function updateAttributeStatus(Request $request)
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
            ProductAttribute::where('id',$data['attribute_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }
    public function deleteAttribute($id)
    {
        $attribute = ProductAttribute::findOrFail($id)->delete();
        $success_message = "تم حذف الصفة بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
    public function delete($id)
    {
        $product =  Product::findOrFail($id);
        $productImage = ProductImage::where('product_id',$id)->get();
        if (File::exists($product->product_image))
        {
          File::delete($product->product_image);
        }
        if (!empty($productImage))
        {

            foreach ($productImage as $image)
            {
                // dd($image->image);
                if (File::exists($image->image))
                {
                File::delete($image->image);
                }
            }

        }
        $product->images()->delete();
        $product->delete();
        $success_message = "تم حذف المنتج بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
}
