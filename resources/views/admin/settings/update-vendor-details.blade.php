@extends('layouts.admin.master')
@section('title')
    تعديل تفاصيل البائعين
@endsection

@section('style')

@endsection
@section('content')
    <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h4 class="title nk-block-title" style="color:#9d72ff">تعديل تفاصيل البائع  </h4>
                        </div>
                    </div>
                    @if ($slug=="personal")
                    <div class="card">
                        <div class="card-inner">
                            <h6 class="title nk-block-title mb-4" style="color:#9d72ff"> التفاصيل الشخصية :      </h6>
                            <form action="{{ url('admin/update-vendor-details/personal') }}" class="form-validate is-alter" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if (!empty(Auth::guard('admin')->user()->image))
                                               <img src="{{asset($vendorDetails->image)}}" style="height: 60px; width:60px; border-radius:50%"  alt="image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_image">الصورة الشخصية</label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input type="file"  accept="image/*" class="form-file-input" id="vendor_image"data-show-caption="false" data-show-upload="false" data-fouc name="vendor_image">
                                                    <label class="form-file-label" for="vendor_image">اختر صورة</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_name">اسم المستخدم  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="vendor_name" name="vendor_name" placeholder="ادخل اسم المستخدم" value="{{$vendor->name}}" aria-invalid="false"required >
                                                @error('vendor_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_address">العنوان </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="vendor_address" name="vendor_address"  placeholder="ادخل العنوان "  value="{{$vendor->address}}" aria-invalid="false"required >
                                                @error('vendor_address')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_country">الدولة   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="vendor_country" name="vendor_country" placeholder="ادخل  الدولة "   value="{{$vendor->country}}" aria-invalid="false"required >
                                                @error('vendor_country')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_city">المدينة   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="vendor_city" name="vendor_city" placeholder="ادخل اسم المدينة " value="{{$vendor->city}}"  aria-invalid="false"required >
                                                @error('vendor_city')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_state">الولاية   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="vendor_state" name="vendor_state" placeholder="ادخل اسم الولاية" value="{{$vendor->state}}"   aria-invalid="false"required >
                                                @error('vendor_state')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_pincode">الرمز السري <span>  (pincode) </span>  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="vendor_pincode" name="vendor_pincode" placeholder="ادخل الرمز السري "    value="{{$vendor->pincode}}" aria-invalid="false"required >
                                                @error('vendor_pincode')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_mobile">رقم الهاتف</label>
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="vendor_mobile">+966</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-lg" name="vendor_mobile" placeholder="ادخل رقم الهاتف " value="{{$vendor->mobile}}"  required minlength="9" maxlength="10">
                                                </div>
                                                @error('vendor_mobile')<div class="alert alert-danger">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                  

                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="form-label me-3 " for="site-off">الحالة </label>
                                            <div class=" custom-control custom-switch ">
                                                <input type="checkbox" class="custom-control-input" name="status" id="site-off"{{$vendor->status == '1' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="site-off"><small>مفعل نعم / لا</small></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary float-end ">تعديل</button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>

                    @elseif($slug=="business")
                    <div class="card">
                        <div class="card-inner">
                            <h6 class="title nk-block-title mb-4" style="color:#9d72ff"> تفاصيل المتجر :      </h6>
                            <form action="{{ url('admin/update-vendor-details/business') }}" class="form-validate is-alter" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                
                                <div class="row g-gs">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            @if (!empty($vendorBusiness->address_proof_image))
                                               <img src="{{asset($vendorBusiness->address_proof_image)}}" style="height: 60px; width:60px; border-radius:50%"  alt="image">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address_proof_image">صورة المتجر  </label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input type="file"   name="address_proof_image" class="form-file-input" id="address_proof_image">
                                                    <label class="form-file-label" for="customFile"> اضغط لاختيار  صورة</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_name">اسم المتجر   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_name" name="shop_name"  value="{{$vendorBusiness->shop_name}}" placeholder="ادخل اسم المتجر"  aria-invalid="false"required >
                                                @error('shop_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_address">العنوان </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_address" name="shop_address" value="{{$vendorBusiness->shop_address}}" placeholder="ادخل العنوان "  aria-invalid="false"required >
                                                @error('shop_address')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_city">الدولة   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_city" name="shop_city" placeholder="ادخل  الدولة " value="{{$vendorBusiness->shop_city}}"  value="" aria-invalid="false"required >
                                                @error('shop_city')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_country">المدينة   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_country" name="shop_country" placeholder="ادخل اسم المدينة " value="{{$vendorBusiness->shop_country}}"  aria-invalid="false"required >
                                                @error('shop_country')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_state">الولاية   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_state" name="shop_state" placeholder="ادخل اسم الولاية" value="{{$vendorBusiness->shop_state}}"   aria-invalid="false"required >
                                                @error('shop_state')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_pincode">الرمز السري <span>  (pincode) </span>  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_pincode" name="shop_pincode" placeholder="ادخل الرمز السري "    value="{{$vendorBusiness->shop_pincode}}" aria-invalid="false"required >
                                                @error('shop_pincode')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_mobile">رقم الهاتف</label>
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="shop_mobile">+966</span>
                                                    </div>
                                                    <input type="text" class="form-control form-control-lg" name="shop_mobile" placeholder="ادخل رقم الهاتف " value="{{$vendorBusiness->shop_mobile}}"  required minlength="9" maxlength="10">
                                                </div>
                                                @error('shop_mobile')<div class="alert alert-danger">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_email">البريد الالكتروني  </label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control form-control-lg" id="shop_email" name="shop_email" placeholder="ادخل البريد الالكتروني  "    value="{{$vendorBusiness->shop_email}}" aria-invalid="false"required >
                                                @error('shop_email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address_proof"> إثبات العنوان  </label>
                                            <div class="form-control-wrap ">
                                                <select class="form-control form-select" id="address_proof" name="address_proof" data-placeholder="Select a option" required="">
                                                    <option label="-- اختار من القائمة --" value=""></option>
                                                    <option value="Passport" {{$vendorBusiness->address_proof == 'Passport' ? 'selected' : '' }}>جواز السفر</option>
                                                    <option value="Voting Card" {{$vendorBusiness->address_proof == 'Voting Card' ? 'selected' : '' }}>كرت التصويت</option>
                                                    <option value="Driving Licence"{{$vendorBusiness->address_proof == 'Driving Licence' ? 'selected' : '' }}>رخصة القيادة</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="business_license_number">رقم الرخصة التجارية </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="business_license_number" name="business_license_number" placeholder="ادخل رقم الرخصة التجارية  "   value="{{$vendorBusiness->business_license_number}}" aria-invalid="false"required >
                                                @error('business_license_number')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="gst_number">الرقم الضريبي  <span>  (gst_number) </span>  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="gst_number" name="gst_number" placeholder="ادخل الرقم الضريبي  "    value="{{$vendorBusiness->gst_number}}" aria-invalid="false"required >
                                                @error('gst_number')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    
                                    
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary float-end ">تعديل</button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>

                    @elseif($slug=="bank")
                    <div class="card">
                        <div class="card-inner">
                            <h6 class="title nk-block-title mb-4" style="color:#9d72ff"> التفاصيل المصرفية :      </h6>
                            <form action="{{ url('admin/update-vendor-details/bank') }}" class="form-validate is-alter" method="POST"
                                  name="updateAdminDetailsForm" id="updateAdminDetailsForm">
                                @csrf

                                
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="account_holder_name">اسم صاحب الحساب   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="account_holder_name" value="{{$vendorBank->account_holder_name}}" placeholder="ادخل اسم صاحب الحساب هنا " name="account_holder_name"  aria-invalid="false"required >
                                                @error('account_holder_name')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="bank_name"> اسم البنك  </label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                </div>
                                                <input type="text" class="form-control form-control-lg" id="bank_name" value="{{$vendorBank->bank_name}}" placeholder="ادخل اسم البنك هنا " name="bank_name" required>
                                                @error('bank_name')<div class="alert alert-danger">{{ $message }}</div>@enderror

                                            </div>
                                        </div>
                                    </div>
                                  

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="account_number">رقم الحساب</label>
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="account_number" value="{{$vendorBank->account_number}}"  placeholder="ادخل رقم الحساب" required minlength="9" maxlength="10">
                                                </div>
                                                @error('account_number')<div class="alert alert-danger">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary float-end ">تعديل</button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
                    @endif
                    

                   
                    
                </div>
            </div>
        </div>

        {{-- update message --}}
        @if (session('success_message'))
            <div id ="modal"class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error" style="display: none;"></div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;"><div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
            <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
            <div class="swal2-success-ring"></div> <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
        </div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">تم بنجاح! </h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">{{session('success_message')}}!</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled " aria-label="" style="display: inline-block; background-color:#854fff"onclick="document.getElementById('modal').style.display='none'">OK</button><button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
        @endif
        {{-- update message --}}
        <input type="file" multiple="multiple" class="dz-hidden-input" tabindex="-1" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">

    <!-- content @s -->
@endsection
@section('scripts')

    
@endsection
