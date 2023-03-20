<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::with(['section','parentcategory'])->get()->toArray();
        return view('admin.categories.categories',compact('categories'));
    }
    public function updateCategoryStatus(Request $request)
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
            Category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
        }
    }
    public function addEditCategory(Request $request , $id=null)
    {
        if ($id == "")
        {
            $title = "أضافة تصنيف جديد";
            $category = new Category();
            $getCategories = array();
            $success_message = "تم أضافة التصنيف بنجاح";
            $send = "أضافة";
        }
        else
        {
            $title = "تعديل التصنيف ";
            $category = Category::findOrFail($id);
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$category['section_id']])->get();
            $success_message = "تم تعديل التصنيف بنجاح";
            $send = "تعديل";
        }
        if ($request->isMethod('post'))
        {
            $data = $request->all();
            $rules = [
                'category_name'=> 'required|regex:/^[\pL\s\-]+$/u',
                'section_id'=> 'required',
                // 'category_image'=> 'mimes:jpg,jpeg,png',
                'url'=> 'required',
                'meta_title'=>'required|max:255',
                'meta_description'=>'required',
                'meta_keyword'=>'required',
            ];
            $customMessage = [
                'category_name.required'=>'يجب اضافة اسم التصنيف',
                'category_name.regex'=>'تنسيق الاسم غير صحيح',
                'section_id.required'=>'يجب اختيار القسم',
                // 'category_image.mimes'=>'امتداد الملف غير صحيح',
                'url.required'=>' يجب اضافة هذا الحقل',
                'meta_title.required'=>' يجب اضافة هذا الحقل',
                'meta_title.max'=>' يجب الا يزيد عن 255 حرف',
                'meta_description.required'=>' يجب اضافة هذا الحقل',
                'meta_keyword.required'=>' يجب اضافة هذا الحقل',
            ];
            $this->validate($request,$rules,$customMessage);
            
            

            $category->category_name = $data['category_name'];
            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];

           // Upload Category Image 
           $uploadPath = 'uploads/category/';
           if ($request->hasFile('category_image')) {
               $file = $request->file('category_image');
               $ext = $file->getClientOriginalExtension();
               $filename = time().'.'.$ext;
               $file->move('uploads/category/', $filename);

               $category->category_image =  $uploadPath.$filename;
           }
            $category->category_discount = $data['category_discount'];
            $category->description =  $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keyword = $data['meta_keyword'];
            $category->status = $request->status == true ? '1':'0';
            $category->save();

            return redirect('admin/categories')->with('success_message',$success_message) ;

        }
        $sections = Section::get()->toArray();
        return view('admin.categories.add-edit-category',compact('category','title','send','sections','getCategories'));

    }
    public function appendCategoriesLevel(Request $request)
    {
        if ($request->ajax())
        {
            $data = $request->all();
            $getCategories = Category::with('subcategories')->where(['parent_id'=>0,'section_id'=>$data['section_id']])->get()->toArray();
            return view('admin.categories.append_categories_level',compact('getCategories'));
        }
    }
    public function delete($id)
    {
        $category =  Category::find($id); 
        $path = $category->category_image; 
        if (File::exists($path)) 
         {
          File::delete($path);
        }
        $category->delete();
        $success_message = "تم حذف التصنيف بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
   
}
