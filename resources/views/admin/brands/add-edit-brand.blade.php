@extends('layouts.admin.master')
@section('content')
    <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="card">
                            <div class="card-inner">
                                <h6 class="title nk-block-title" style="color:#9d72ff">  {{$title}}  </h6>
                               <div class="row">
                                    <form @if (empty($brand['id']))
                                          action="{{ url('admin/add-edit-brand') }}"
                                          @else
                                          action="{{ url('admin/add-edit-brand/'.$brand['id']) }}"
                                          @endif
                                          class="form-validate is-alter mt-5 " method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-gs">
                                            @if (!empty($brand['brand_image']))
                                                <div class="col-md-12">
                                                    <div class="">
                                                        <img src="{{asset($brand['brand_image'])}}"  style="height:100px; width:100px; border-radius:5%;object-fit:cover"alt="">
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="name">اسم العلامة التجارية   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="name" name="name" 
                                                        @if (empty($brand['name']))
                                                           placeholder = "ادخل اسم العلامة التجارية"
                                                           value="{{old('name')}}"
                                                        @else
                                                            value="{{$brand['name']}}"
                                                        @endif  aria-invalid="false" >
                                                        @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="brand_image">صورة العلامة التجارية </label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"  accept="image/*" class="form-file-input" id="brand_image"data-show-caption="false" data-show-upload="false" data-fouc name="brand_image">
                                                            <label class="form-file-label" for="brand_image">اختر صورة</label>
                                                            @error('brand_image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label class="form-label me-3 " for="site-off">الحالة </label>
                                                    <div class=" custom-control custom-switch ">
                                                        <input type="checkbox" class="custom-control-input" name="status" id="site-off"{{$brand->status == '1' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="site-off"><small>مفعل نعم / لا</small></label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary float-end  ">{{$send}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                               
                               </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- success message --}}
        @if (session('success_message'))
            <div id ="modal"class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
                <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-success swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
                    <div class="swal2-header">
                        <ul class="swal2-progress-steps" style="display: none;"></ul>
                        <div class="swal2-icon swal2-error" style="display: none;"></div>
                        <div class="swal2-icon swal2-question" style="display: none;"></div>
                        <div class="swal2-icon swal2-warning" style="display: none;"></div>
                        <div class="swal2-icon swal2-info" style="display: none;"></div>
                        <div class="swal2-icon swal2-success swal2-icon-show" style="display: flex;">
                            <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                            <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                            <div class="swal2-success-ring"></div>
                            <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                            <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                        </div>
                        <img class="swal2-image" style="display: none;">
                        <h2 class="swal2-title" id="swal2-title" style="display: flex;">تم بنجاح! </h2>
                        <button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
                    </div>
                    <div class="swal2-content">
                        <div id="swal2-content" class="swal2-html-container" style="display: block;">{{session('success_message')}}!</div>
                        <input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;">
                        <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                        <select class="swal2-select" style="display: none;"></select>
                        <div class="swal2-radio" style="display: none;"></div>
                        <label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label>
                        <textarea class="swal2-textarea" style="display: none;"></textarea>
                        <div class="swal2-validation-message" id="swal2-validation-message"></div>
                    </div>
                    <div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled " aria-label="" style="display: inline-block; background-color:#854fff"onclick="document.getElementById('modal').style.display='none'">OK</button><button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button></div>
                    <div class="swal2-footer" style="display: none;"></div>
                    <div class="swal2-timer-progress-bar-container">
                        <div class="swal2-timer-progress-bar" style="display: none;"></div>
                    </div>
                </div>
            </div>
        @endif

 
    <!-- content @s -->
@endsection
@section('scripts')
    
@endsection