<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBankDetail;
use App\Models\VendorsBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

  
    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile'=>'required|numeric',
            ];

            $customMessages = [
                'email.required'=> 'يجب اضافة  عنوان البريد الالكتروني',
                'email.email'=>'يجب ان يكون عنوان البريد الالكتروني متوفر',
                'email.max'=>'يجب الا يزيد البريد عن 255',
                'name.required'=>'يجب اضافة الاسم ',
                'name.regex'=>'تنسيق الاسم غير صالح.',
                'mobile.required'=>'يجب اضافة الاسم ',
                'mobile.max'=>'يجب الا يزيد عن 10 ارقام  ',
                'mobile.min'=>'يجب الا يقل عن 9 ارقام  ',
                'mobile.numeric'=> 'يجب  ادخال ارقام فقط',
            ];
            
            $this->validate($request, $rules , $customMessages);

            Admin::where('id',Auth::guard('admin')->user()->id)->update([
                'name'=> $data['name'],
                'email'=> $data['email'],
                // 'type'=> $data['type'],
                'mobile'=> $data['mobile'],
                'status'=> $request->status == true ?'1':'0',
            ]);
            return redirect()->back()->with('success_message','تم التعديل بنجاح !');

        }
        $admin =  Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.settings.update-admin-details',compact('admin'));
    }
    public function updateVendorDetails($slug , Request $request)
    {

        if ($slug == "personal")
        {
            $vendor =  Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first();
            if($request->isMethod('post'))
            {
                $data = $request->all();

                $rules = [
                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile'=>'required|numeric',
                ];
    
                $customMessages = [
                    'vendor_name.required'=>'يجب اضافة الاسم ',
                    'vendor_name.regex'=>'تنسيق الاسم غير صالح.',
                    'vendor_mobile.required'=>'يجب اضافة الاسم ',
                    'vendor_mobile.max'=>'يجب الا يزيد عن 10 ارقام  ',
                    'vendor_mobile.min'=>'يجب الا يقل عن 9 ارقام  ',
                    'vendor_mobile.numeric'=> 'يجب  ادخال ارقام فقط',
                ];
                
                $this->validate($request, $rules , $customMessages);
                
                
                Admin::where('id',Auth::guard('admin')->user()->id)->update([
                    'name'=> $data['vendor_name'],
                    'mobile'=> $data['vendor_mobile'],
                    'status'=> $request->status == true ?'1':'0',
                ]);

                Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->update([
                    'name'=> $data['vendor_name'],
                    'address'=>$data['vendor_address'],
                    'country'=>$data['vendor_country'],
                    'city'=>$data['vendor_city'],
                    'state'=>$data['vendor_state'],
                    'pincode'=>$data['vendor_pincode'],
                    'mobile'=> $data['vendor_mobile'],
                    'status'=> $request->status == true ?'1':'0',
                ]);
                
                return redirect()->back()->with('success_message','تم التعديل بنجاح !');
            }
        return view('admin.settings.update-vendor-details',compact('slug','vendor'));

        }
        elseif ($slug == "business")
        {
            if($request->isMethod('post'))
            {
                $data = $request->all();

                $rules = [
                    'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_address' => 'required|regex:/^[\pL\s\-]+$/u',
                    'shop_city'=>'required',
                    'shop_country'=>'required',
                    'shop_mobile'=>'required|numeric',
                ];
                
                $customMessages = [
                    'shop_name.required'=>'يجب اضافة اسم المتجر ',
                    'shop_name.regex'=>'تنسيق الاسم غير صالح.',
                    'shop_address.required'=>'يجب اضافة عنوان المتجر ',
                    'shop_address.regex'=>'تنسيق العنوان غير صالح.',
                    'shop_city.required'=>'يجب اضافة اسم المدينة ',
                    'shop_country.required'=>'يجب اضافة اسم الدولة ',
                    'shop_mobile.required'=>'يجب اضافة الاسم ',
                    'shop_mobile.max'=>'يجب الا يزيد عن 10 ارقام  ',
                    'shop_mobile.min'=>'يجب الا يقل عن 9 ارقام  ',
                    'shop_mobile.numeric'=> 'يجب  ادخال ارقام فقط',
                ];
                $this->validate($request, $rules , $customMessages);
                $vendorBusiness =  VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                    'shop_name'=> $request->shop_name,
                    'shop_address'=>$data['shop_address'],
                    'shop_city'=>$data['shop_city'],
                    'shop_country'=>$data['shop_country'],
                    'shop_state'=>$data['shop_state'],
                    'shop_pincode'=>$data['shop_pincode'],
                    'shop_mobile'=>$data['shop_mobile'],
                    'shop_email'=>$data['shop_email'],
                    // 'shop_website'=>$data['shop_website'],
                    'address_proof'=>$data['address_proof'],
                    'business_license_number'=>$request->business_license_number,
                    'gst_number'=>$data['gst_number'],
                ]);
                return redirect()->back()->with('success_message','تم التعديل بنجاح !');
                
            }
            $vendorBusiness =  VendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
            return view('admin.settings.update-vendor-details',compact('slug','vendorBusiness'));


        }
        elseif ($slug == "bank")
        {
            if ($request->isMethod('post')) 
            {
                $data = $request->all();

                $rules = [
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'bank_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'account_number'=>'required|numeric',
                ];
                
                $customMessages = [
                    'account_holder_name.required'=>'يجب اضافة اسم صاحب الحساب ',
                    'account_holder_name.regex'=>'تنسيق الاسم غير صالح.',
                    'bank_name.required'=>'يجب اضافة اسم البنك ',
                    'bank_name.regex'=>'تنسيق الاسم غير صالح.',
                    'shop_city.required'=>'يجب اضافة اسم المدينة ',
                    'shop_country.required'=>'يجب اضافة اسم الدولة ',
                    'account_number.required'=>'يجب اضافة الاسم ',
                    'account_number.numeric'=> 'يجب  ادخال ارقام فقط',
                ];
                $this->validate($request, $rules , $customMessages);
                $vendorBank =  VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->update([
                    'account_holder_name'=> $request->account_holder_name,
                    'bank_name'=>$data['bank_name'],
                    'account_number'=>$data['account_number'],

                ]);
                return redirect()->back()->with('success_message','تم التعديل بنجاح !');
            }
            $vendorBank =  VendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
            return view('admin.settings.update-vendor-details',compact('slug','vendorBank'));


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

    public function admins($type=null)
    {
        $admins = Admin::query();
        if (!empty($type)) 
        {
            $admins = $admins->where('type',$type);
            $title = ucfirst($type);
        } 
        else
        {
            $title = "Admin/Subadmins/Vendors";
        }
       
        $admins = $admins->get()->toArray();
        
        return view('admin.admins.admins',compact('admins','title'));
    }
    public function viewVendorDetails($id)
    {
        $vendor = Admin::with('vendorPersonal','vendorBusiness','vendorBank')
                               ->where('id',$id)->get();
        // dd($vendors);
        return view('admin.admins.view-vendor-details',compact('vendor'));
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

   
}
