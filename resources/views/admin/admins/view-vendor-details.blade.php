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
                    {{-- View Personal Information  --}}
                    <div class="card">
                        <div class="card-inner">
                            <h6 class="title nk-block-title mb-4" style="color:#9d72ff"> التفاصيل الشخصية :      </h6>
                            <div class="row g-gs">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_name">اسم المستخدم  </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="vendor_name" name="vendor_name"  value="{{$vendor['vendor_personal']['name']}}" aria-invalid="false" disabled >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_address">العنوان </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="vendor_address" name="vendor_address"   value="{{$vendor['vendor_personal']['address']}}" aria-invalid="false"disabled >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_country">الدولة   </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="vendor_country" name="vendor_country"  value="{{$vendor['vendor_personal']['country']}}" aria-invalid="false"disabled >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_city">المدينة   </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="vendor_city" name="vendor_city"  value="{{$vendor['vendor_personal']['city']}}"  aria-invalid="false"disabled >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_state">الولاية   </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="vendor_state" name="vendor_state"  value="{{$vendor['vendor_personal']['state']}}"   aria-invalid="false"disabled >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_pincode">الرمز السري <span>  (pincode) </span>  </label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="vendor_pincode" name="vendor_pincode" placeholder="ادخل الرمز السري "    value="{{$vendor['vendor_personal']['pincode']}}" aria-invalid="false"disabled >
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
                                                <input type="text" class="form-control form-control-lg" name="vendor_mobile" placeholder="ادخل رقم الهاتف " value="{{$vendor['vendor_personal']['mobile']}}"  disabled minlength="9" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                        <label class="form-label me-3 " >الصورة الشخصية : </label>
                                            @if (!empty($vendor['image']))
                                            <div class="form-file">
                                                <img src="{{asset($vendor['image'])}}"  style="height:100px; width:100px; border-radius:5px" alt="">
                                            </div>
                                            @endif                                
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="form-label me-3 " for="site-off">الحالة </label>
                                        @if ($vendor['status'] == '1')
                                        <em class="icon ni ni-check-fill-c text-success " style="font-size: 25px"></em> <span> نشط </span>
                                        @else
                                        <em class="icon ni ni-cross-fill-c text-danger" style="font-size: 25px"></em><span> غير نشط</span>
                                        @endif
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>

                    {{-- View Business Information --}}
                    <div class="card">
                        <div class="card-inner">
                            <h6 class="title nk-block-title mb-4" style="color:#9d72ff"> تفاصيل المتجر :      </h6>
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_name">اسم المتجر   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_name" name="shop_name"  value="{{$vendor['vendor_business']['shop_name']}}"   aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_address">العنوان </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_address" name="shop_address" value="{{$vendor['vendor_business']['shop_address']}}"   aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_city">الدولة   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_city" name="shop_city"  value="{{$vendor['vendor_business']['shop_city']}}"   aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_country">المدينة   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_country" name="shop_country"  value="{{$vendor['vendor_business']['shop_country']}}"  aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_state">الولاية   </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_state" name="shop_state"  value="{{$vendor['vendor_business']['shop_country']}}"   aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_pincode">الرمز السري <span>  (pincode) </span>  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="shop_pincode" name="shop_pincode"   value="{{$vendor['vendor_business']['shop_pincode']}}" aria-invalid="false" disabled >
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
                                                    <input type="text" class="form-control form-control-lg" name="shop_mobile" value="{{$vendor['vendor_business']['shop_mobile']}}"   disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="shop_email">البريد الالكتروني  </label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control form-control-lg" id="shop_email" name="shop_email"  value="{{$vendor['vendor_business']['shop_email']}}" aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="address_proof"> إثبات العنوان  </label>
                                            <div class="form-control-wrap ">
                                                <select class="form-control form-select" id="address_proof" name="address_proof" data-placeholder="Select a option"  disabled="">
                                                    <option label="-- اختار من القائمة --" value=""></option>
                                                    <option value="Passport" {{$vendor['vendor_business']['address_proof'] == 'Passport' ? 'selected' : '' }}>جواز السفر</option>
                                                    <option value="Voting Card" {{$vendor['vendor_business']['address_proof'] == 'Voting Card' ? 'selected' : '' }}>كرت التصويت</option>
                                                    <option value="Driving Licence"{{$vendor['vendor_business']['address_proof']  == 'Driving Licence' ? 'selected' : '' }}>رخصة القيادة</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                  

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="business_license_number">رقم الرخصة التجارية </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="business_license_number" name="business_license_number"   value="{{$vendor['vendor_business']['business_license_number']}}" aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="gst_number">الرقم الضريبي  <span>  (gst_number) </span>  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="gst_number" name="gst_number"   value="{{$vendor['vendor_business']['gst_number']}}" aria-invalid="false" disabled >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                            <label class="form-label me-3 " >صورة المتجر  : </label>
                                                @if (!empty($vendor['vendor_business']['address_proof_image']))
                                                <div class="form-file">
                                                    <img src="{{asset($vendor['vendor_business']['address_proof_image'])}}" class="mb-5" style="height:100px; width:100px; border-radius:5px" alt="">
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                                
                        </div>
                    </div>

                    {{-- View Bank Information --}}
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
                                                <input type="text" class="form-control form-control-lg" id="account_holder_name" value="{{$vendor['vendor_bank']['account_holder_name']}}"  name="account_holder_name"  disabled >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="bank_name"> اسم البنك  </label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                </div>
                                                <input type="text" class="form-control form-control-lg" id="bank_name" value="{{$vendor['vendor_bank']['bank_name']}}"  name="bank_name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                  

                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="account_number">رقم الحساب</label>
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="account_number" value="{{$vendor['vendor_bank']['account_number']}}"  disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>

     
    <!-- content @s -->
@endsection
@section('scripts')

    
@endsection
