<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password))
            {
                if($data['new_password'] == $data['confirm_password'])
                {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message','تم التعديل بنجاح !');

                }
                else
                {
                    return redirect()->back()->with('error_message','كلمة السر الجديدة غير متطابقة ');
                }
            }
            else
            {
                return redirect()->back()->with('error_message','كلمة السر الحالية غير صحيحة ');
            }
        }
        $admin =  Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings.update-admin-password',compact('admin'));
    }
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        // return $data;

        if (Hash::check($data['current_password'],Auth::guard('admin')->user()->password))
        {
            return "true";
        }
        else
        {
            return "false";
        }
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required'=> 'يجب اضافة  عنوان البريد الالكتروني',
                'email.email'=>'يجب ان يكون عنوان البريد الالكتروني متوفر',
                'email.max'=>'يجب الا يزيد البريد عن 255',
                'password.required'=>'يجب اضافة كلمة السر',
            ];
            
            $this->validate($request, $rules , $customMessages);

            if (Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],
                                              'status'=>1])) 
            {
                return redirect('admin/dashboard');
            }
            else 
            {
                return redirect()->back()->with('message','البريد الالكتروني او الباسورد غير متوفر');
            }
        }
         return view('admin.auth.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

   
}
