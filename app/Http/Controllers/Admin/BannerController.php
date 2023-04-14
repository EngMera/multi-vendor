<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function banners()
    {
        $banners = Banner::get();
        return view('admin.banners.banners',compact('banners'));
    }
    public function updateBannerStatus(Request $request)
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
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=>$data['banner_id']]);
        }
    }
    public function addEditBanner(Request $request , $id= null)
    {
        if ($id == "") {
            $title = "أضافة صورة متحركة  ";
            $banner = new Banner();
            $success_message = "تم أضافة الصورة بنجاح";
            $send = "أضافة";
        }
        else
        {
            $title = "تعديل الصورة  ";
            $banner = Banner::findOrFail($id);
            $success_message = "تم تعديل الصورة  بنجاح";
            $send = "تعديل";

        }
        if($request->isMethod('post'))
        {
            $data = $request->all();
            $rules = [
                'alt'=> 'required',
                'link'=> 'required',

            ];
            $customMessage = [
                'alt.required'=>'يجب اضافة  النص البديل ',
                'link.required'=>'يجب اضافة الرابط',
            ];
            $this->validate($request,$rules,$customMessage);

            $banner->link = $data['link'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];

           // Upload banner Image
           $uploadPath = 'uploads/banner/';
           if ($request->hasFile('image')) {
               $file = $request->file('image');
               $ext = $file->getClientOriginalExtension();
               $filename = time().'.'.$ext;
               $file->move('uploads/banner/', $filename);

               $banner->image =  $uploadPath.$filename;
           }
            $banner->status = $request->status == true ? '1':'0';
            $banner->save();

            return redirect('admin/banners')->with('success_message',$success_message) ;
        }
        return view('admin.banners.add-edit-banner',compact('title','banner','success_message','send'));

    }
    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        $path = 'uploads/banner';
        if (File::exists($path)) {
            File::delete($path);
        }
        $banner->delete();
        $success_message = "تم حذف  الصورة  بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
}
