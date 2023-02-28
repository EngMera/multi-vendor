<!DOCTYPE html>
<html lang="zxx" class="js">

@include('layouts.admin.head')


<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-split nk-split-page nk-split-lg">
                        <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white" dir="rtl">
                            <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                                <a href="#" class="toggle btn-white btn btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                            </div>
                            <div class="nk-block nk-block-middle nk-auth-body">
                                <div class="brand-logo pb-5">
                                    <a href="{{url('admin/login')}}" class="logo-link">
                                        <img class="logo-light logo-img logo-img-lg" src="{{asset('assets/admin/images/logo.png')}}" srcset="{{asset('assets/admin/images/logo2x.png')}} 2x" alt="logo">
                                        <img class="logo-dark logo-img logo-img-lg" src="{{asset('assets/admin/images/logo-dark.png')}}" srcset="{{asset('assets/admin/images/logo-dark2x.png ')}} 2x" alt="logo-dark">
                                    </a>
                                </div>
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title">تسجيل الدخول</h5>
                                        <div class="nk-block-des">
                                            <span style="color:#d7dcff">ادخل بريدل الالكتروني وكلمة السر </span>
                                        </div>
                                    </div>
                                </div>
                                @if (session('message'))
                                <div class="alert alert-danger alert-icon alert-dismissible">
                                     <strong>خطأ !</strong> {{ session('message') }} <button class="close" data-bs-dismiss="alert"></button>
                                </div>
                                @endif
                                
                                <!-- .nk-block-head -->
                                <form action="{{url('admin/login')}}" class="form-validate is-alter" autocomplete="off" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="email">البريد الالكتروني</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="#">تحتاج مساعدة؟</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input autocomplete="off" type="text" name="email" class="form-control form-control-lg"  id="email" placeholder="ادخل بريدك الالكتروني . . ." required>
                                            @error('email')<div  class=" alert alert-danger  "> * {{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <!-- .form-group -->
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">كلمة السر</label>
                                            <a class="link link-primary link-sm" tabindex="-1" href="html/pages/auths/auth-reset.html">نسيت كلمة السر ؟</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input autocomplete="off" type="password" name="password" class="form-control form-control-lg"  id="password" placeholder="ادخل كلمة السر هنا . . . "required>
                                            @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div><!-- .form-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary btn-block">تسجيل الدخول</button>
                                    </div>
                                </form>
                                <!-- form -->
                                <div class="form-note-s2 pt-4"> ليس لديك حساب؟ <a href="html/pages/auths/auth-register.html">حساب جديد</a>
                                </div>
                                <div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>او</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>
                            </div>
                           
                        </div>
                        <!-- .nk-split-content -->
                        <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right" data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                            <div class="slider-wrap w-100 w-max-550px p-3 p-sm-5 m-auto">
                                <div class="slider-init" data-slick='{"dots":true, "arrows":false}'>
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            {{-- #2b357e --}}
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <img src="{{asset('assets/admin/images/auth/2.png')}}" alt="">
                                                <p>. عدل كلمة السر في حال نسيانها </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <img src="{{asset('assets/admin/images/auth/1.png')}}" alt="">
                                                <p>. لوحة تحكم توفر حماية لك ولموقعك التجاري ومستخدمين متجرك الالكتروني </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .slider-item -->
                                    <div class="slider-item">
                                        <div class="nk-feature nk-feature-center">
                                            <div class="nk-feature-content py-4 p-sm-5">
                                                <img src="{{asset('assets/admin/images/auth/3.png')}}" alt="">
                                                <p>. كن بامان انت وموقعك في بيئة توفر لك الحماية الخاصة والمرنة والمتجاوبة </p>
                                            </div>
                                        </div>
                                    </div><!-- .slider-item -->
                                </div><!-- .slider-init -->
                                <div class="slider-dots"></div>
                                <div class="slider-arrows"></div>
                            </div><!-- .slider-wrap -->
                        </div><!-- .nk-split-content -->
                    </div><!-- .nk-split -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @include('layouts.admin.footer-scripts')
   

</html>