<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::get();
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
    public function delete($id)
    {
        Category::where('id',$id)->delete();
        $success_message = "تم حذف التصنيف بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
}
