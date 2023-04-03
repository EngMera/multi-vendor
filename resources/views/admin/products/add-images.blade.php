@extends('layouts.admin.master')
@section('title')
    {{ $product->product_name }}
@endsection

@section('style')
    
@endsection
@section('content')
    <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title text-primary">أضافة صور المنتج</h5>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="{{url('admin/products')}}" class="btn btn-outline-light bg-primary  text-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-right"></em></a>
                                            <a href="{{url('admin/products')}}" class="btn btn-icon btn-outline-light bg-primary text-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-right"></em></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-inner">
                                <h6 class="title nk-block-title mb-4" style="color:#9d72ff"> معلومات  المنتج :</h6>
                                <div class="row">
                                    <div class="row mb-4">
                                        <div class="col-md-2">
                                            @if (!empty($product['product_image']))
                                                    <img src="{{asset($product['product_image'])}}" class="thumb" style="border-radius:5px; height: 120px; width:120px; object-fit:cover" alt="">
                                            @else
                                            <img src="{{asset('uploads/product/images/no-image.jpg')}}"  class="thumb"  style="border-radius:5px; height: 120px; width:120px; object-fit:cover" alt="">
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="product_name">اسم المنتج   </label>
                                                        <input type="text" class="form-control" value="{{ $product['product_name']}}" disabled/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="product_code">كود المنتج   </label>
                                                        <input type="text" class="form-control" value="{{ $product['product_code']}}" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="product_color">لون المنتج   </label>
                                                        <input type="text" class="form-control" value="{{ $product['product_color']}}" disabled/>
    
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label" for="product_price">سعر المنتج   </label>
                                                        <input type="text" class="form-control" value="{{ $product['product_price']}}" disabled/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <form action="{{url('admin/add-images/'.$product['id'])}}" method="post" enctype="multipart/form-data"  id="uploadForm">
                                      @csrf
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        @if (empty($product->product_image))
                                                        <label class="form-label"> اختر صورة رئيسية للمنتج  :</label>
                                                            
                                                        @else
                                                        <label class="form-label"> تعديل الصورة الرئيسية للمنتج  :</label>
                                                        @endif
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file"  class="form-file-input" name="product_image" id="customMultipleFiles">
                                                                <label class="form-file-label" for="customMultipleFiles">اختر ملف</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">اختر صور المنتج :</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-file">
                                                                <input type="file" multiple="" class="form-file-input" name="image[]" id="customMultipleFiles">
                                                                <label class="form-file-label" for="customMultipleFiles">اختر ملفات</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-md-12 mt-5">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-lg btn-primary float-end  ">أضافة</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </form>
                                        @if (!empty($product['images']))
                                        <div class="row mt-5">
                                            <h6 class="title nk-block-title mb-4" style="color:#9d72ff">  صور المنتج :</h6>
                                            @foreach ($product['images'] as $image)
                                                <div class="col-md-2 p-2 " style="position: relative">
                                                    <a href="{{asset($image['image'])}}" class="gallery-image popup-image">
                                                      <img src="{{asset($image['image'])}}" class=" mfp-img" style="border-radius:5px; height:150px ; width:150px; border:1px solid #eee ; object-fit:cover" alt="">

                                                    </a>
                                                    <a href="{{url('admin/delete-image/'.$image['id'])}}"><em class="icon ni ni-cross-sm text-white" style="position: absolute;z-index:10; background-color:red; border-radius:50%;left: 6px;font-size: 20px;top: 7px;"></em></a>
                                                </div>
                                            @endforeach
                                        </div>
                                        @endif
                                    <div id="uploadStatus"></div>
                                    

                                <div class="gallery">

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