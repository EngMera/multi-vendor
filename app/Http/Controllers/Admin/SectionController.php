<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function sections()
    {
        $sections = Section::get();
        return view('admin.sections.sections', compact('sections'));
    }
    public function updateSectionStatus(Request $request)
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
            Section::where('id',$data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
    public function addEditSection(Request $request, $id=null)
    {

            if($id == "")
            {
                $title = "أضافة قسم جديد";
                $section = new Section();
                $success_message = "تم أضافة القسم بنجاح";
                $send = "أضافة";
            }
            else
            {
                $title = "تعديل القسم ";
                $section = Section::findOrFail($id);
                $success_message = "تم تعديل القسم بنجاح";
                $send = "تعديل";
    
    
            }
            if($request->isMethod('post'))
            {
                $data = $request->all();
                $rules = [
                    'section_name'=> 'required|regex:/^[\pL\s\-]+$/u'
                ];
                $customMessage = [
                    'section_name.required'=> 'يجب أضافة اسم القسم',
                    'section_name.regex' => 'تنسيق الاسم غير صحيح'
                ];
                $this->validate($request,$rules,$customMessage);

                $section->name = $data['section_name'];
                $section->status = 1;
                $section->save();

                return  redirect('admin/sections')->with('success_message',$success_message);
            }
            return view('admin.sections.add-edit-section',compact('section','title','send'));
       
        
    }
    public function delete($id)
    {
        Section::where('id',$id)->delete();
        $success_message = "تم حذف القسم بنجاح";
        return redirect()->back()->with('success_message',$success_message);
    }
}
