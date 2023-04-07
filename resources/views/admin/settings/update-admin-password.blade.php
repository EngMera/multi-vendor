@extends('layouts.admin.master')
@section('title')
    تعديل كلمة السر
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
                            <h4 class="title nk-block-title" style="color:#9d72ff">الاعدادات  </h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-inner">
                            <h6 class="title nk-block-title" style="color:#9d72ff">تعديل  كلمة السر  :  </h6>
                           
                           
                            <form action="{{ url('admin/update-admin-password') }}" class="form-validate is-alter" method="POST"
                                  name="updateAdminPasswordForm" id="updateAdminPasswordForm">
                                @csrf
                                <div class="row g-gs">
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="default-06">الصورة الشخصية</label>
                                            <div class="form-control-wrap">
                                                <div class="form-file">
                                                    <input type="file" multiple accept="image/*" class="form-file-input" id="customFile"data-show-caption="false" data-show-upload="false" data-fouc>
                                                    <label class="form-file-label" for="customFile">اختر صورة</label>

                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fva-full-name">الاسم  </label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control form-control-lg" id="fva-full-name" name="name" value="{{$admin->name}}" required aria-invalid="false" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fva-email">عنوان البريد الالكتروني </label>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-mail"></em>
                                                </div>
                                                <input type="text" class="form-control form-control-lg" id="fva-email" name="email" value="{{$admin->email}}"disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fva-topics">النوع</label>
                                            <div class="form-control-wrap ">
                                                {{-- form-select --}}
                                                <select class="form-control form-control-lg " id="fva-topics" name="fva-topics" data-placeholder="Select a option" required disabled>
                                                    <option label="-- اختار من القائمة --" value=""></option>
                                                    <option value= "superadmin" {{$admin->type == "superadmin" ? 'selected':"" }}>المشرف المتميز</option>
                                                    <option value="admin" {{$admin->type == "admin" ? 'selected':"" }}>مسؤل</option>
                                                    <option value="subadmin" {{$admin->type == "subadmin" ? 'selected':"" }}>المشرف الفرعي</option>
                                                    <option value="vendor" {{$admin->type == "vendor" ? 'selected':"" }}>بائع </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="current_password">كلمة السر الحالية  </label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="current_password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-lg" id="current_password" name="current_password" placeholder="ادخل كلمة السر الحالية هنا" required aria-invalid="false">
                                                <span id="check_password"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="new_password">كلمة السر الجديدة  </label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="new_password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-lg" id="new_password" name="new_password" placeholder="ادخل كلمة السر الجديدة هنا"  required aria-invalid="false">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="confirm_password">تأكيد كلمة السر   </label>
                                            <div class="form-control-wrap">
                                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="confirm_password">
                                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                </a>
                                                <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="تأكيد كلمة السر الجديدة  "  required aria-invalid="false">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-phone">رقم الهاتف</label>
                                            <div class="form-control-wrap">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="fv-phone">+966</span>
                                                    </div>
                                                    <input type="text" class="form-control" required value="{{$admin->mobile}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label class="form-label me-3 " for="site-off">الحالة </label>
                                            <div class=" custom-control custom-switch ">
                                                <input type="checkbox" class="custom-control-input" name="reg-public" id="site-off">
                                                <label class="custom-control-label" for="site-off"><small>مفعل نعم / لا</small></label>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    {{-- <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fva-message">Message</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-sm" id="fva-message" name="fva-message" placeholder="Write your message" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label">Communication</label>
                                            <ul class="custom-control-group g-3 align-center">
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="fva-com" id="fva-com-email" required="">
                                                        <label class="custom-control-label" for="fva-com-email">Email</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="fva-com" id="fva-com-sms" required="">
                                                        <label class="custom-control-label" for="fva-com-sms">SMS</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="fva-com" id="fva-com-phone" required="">
                                                        <label class="custom-control-label" for="fva-com-phone">Phone</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-light float-end mx-2" type="reset">الغاء</button>
                                            <button type="submit" class="btn  btn-primary float-end ">تعديل</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                   
                    
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

        {{-- error message --}}
        @if (session('error_message'))
                <div id ="modal2"class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;"><div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;"><div class="swal2-header"><ul class="swal2-progress-steps" style="display: none;"></ul><div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                    <span class="swal2-x-mark-line-left"></span>
                    <span class="swal2-x-mark-line-right"></span>
                </span>
                </div><div class="swal2-icon swal2-question" style="display: none;"></div><div class="swal2-icon swal2-warning" style="display: none;"></div><div class="swal2-icon swal2-info" style="display: none;"></div><div class="swal2-icon swal2-success" style="display: none;"></div><img class="swal2-image" style="display: none;"><h2 class="swal2-title" id="swal2-title" style="display: flex;">خطا!</h2><button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button></div><div class="swal2-content"><div id="swal2-content" class="swal2-html-container" style="display: block;">{{session('error_message')}}</div><input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;"><div class="swal2-range" style="display: none;"><input type="range"><output></output></div><select class="swal2-select" style="display: none;"></select><div class="swal2-radio" style="display: none;"></div><label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label><textarea class="swal2-textarea" style="display: none;"></textarea><div class="swal2-validation-message" id="swal2-validation-message"></div></div><div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled btn btn-primary" aria-label="" style="display: inline-block; background-color:#854fff"onclick="document.getElementById('modal2').style.display='none'">OK</button><button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button></div><div class="swal2-footer" style="display: none;"></div><div class="swal2-timer-progress-bar-container"><div class="swal2-timer-progress-bar" style="display: none;"></div></div></div></div>
        @endif
        {{-- error message --}}
        
    <!-- content @s -->
@endsection
@section('scripts')

    
@endsection
