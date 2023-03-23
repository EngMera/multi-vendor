<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function brands()
    {
        $brands = Brand::get();
        return view('admin.brands.brands',compact('brands'));
    }
    public function updateBrandStatus(Request $request)
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
            Brand::where('id',$data['brand_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'brand_id'=>$data['brand_id']]);
        }
    }
    public function addEditBrand(Request $request , $id=null)
    {
        if ($id == "") {
            $title = "أضافة علامة تجارية جديدة";
            $brand = new Brand();
            $success_message = "تم أضافة العلامة التجارية بنجاح";
            $send = "أضافة";
        } 
        else 
        {
            $title = "تعديل العلامة التجارية ";
            $brand = Brand::findOrFail($id);
            $success_message = "تم تعديل العلامة التجارية بنجاح";
            $send = "تعديل";

        }
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $rules = [
                'name'=> 'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessage = [
                'name.required'=>'يجب اضافة اسم العلامة التجارية',
                'name.regex'=>'تنسيق الاسم غير صحيح',
                'section_id.required'=>'يجب اختيار القسم',
            ];
            $this->validate($request,$rules,$customMessage);

            $brand->name = $data['name'];

           // Upload brand Image 
           $uploadPath = 'uploads/brand/';
           if ($request->hasFile('brand_image')) {
               $file = $request->file('brand_image');
               $ext = $file->getClientOriginalExtension();
               $filename = time().'.'.$ext;
               $file->move('uploads/brand/', $filename);

               $brand->brand_image =  $uploadPath.$filename;
           }
            $brand->status = $request->status == true ? '1':'0';
            $brand->save();

            return redirect('admin/brands')->with('success_message',$success_message) ;
        }
        return view('admin.brands.add-edit-brand',compact('title','brand','success_message','send'));
        
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        $path = $brand->brand_image; 
        if (File::exists($path)) 
         {
          File::delete($path);
        }
        $brand->delete();
        $success_message = "تم حذف العلامة التجارية بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
}
