@extends('layouts.admin.master')
@section('title')
  {{$title}}
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
                                <h6 class="title nk-block-title" style="color:#9d72ff">  {{$title}}  </h6>
                               
                                    <form @if (empty($product['product_name']))
                                          action="{{ url('admin/add-edit-product') }}"
                                          @else
                                          action="{{ url('admin/add-edit-product/'.$product['id']) }}"
                                          @endif
                                          class="form-validate is-alter mt-5 " method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row g-gs">
                                           
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_name">اسم المنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="product_name" name="product_name" 
                                                        @if (empty($product->product_name))
                                                        placeholder = "ادخل اسم المنتج"product_name
                                                        value="{{old('product_name')}}"@else value="{{$product->product_name}}"@endif  aria-invalid="false" >
                                                        @error('product_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="category_id">التصنيف</label>
                                                    <div class="form-control-wrap ">
                                                        <select class="form-select form-control form-control-lg valid" id="category_id" name="category_id" data-placeholder="Select a option" aria-invalid="false">
                                                            <option value="" selected="">-- اختار من القائمة -- </option>
                                                            @foreach ($categories as $section)
                                                                <optgroup label="{{$section['name']}}"></optgroup>
                                                                @foreach ($section['categories'] as $category)
                                                                  <option @if(!empty($product['category_id']==$category['id'])) selected ="" @endif value="{{$category['id']}}">&nbsp;&nbsp;&nbsp;--&nbsp;{{$category['category_name']}}</option>
                                                                   @foreach ($category['subcategories'] as $subcategory)
                                                                      <option value="{{$subcategory['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-- {{$subcategory['category_name']}}</option>
                                                                   @endforeach
                                                                   @error('category_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                                @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="brand_id">العلامة التجارية</label>
                                                    <div class="form-control-wrap ">
                                                        <select class="form-select form-control form-control-lg valid" id="brand_id" name="brand_id" data-placeholder="Select a option" aria-invalid="false">
                                                            <option value="" selected="">-- اختار من القائمة -- </option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{$brand['id']}}" @if (!empty($product['brand_id']) && $product['brand_id']==$brand['id']) selected="" @endif>{{$brand['name']}}</option>
                                                            @endforeach
                                                            @error('brand_id')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_code">كود المنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="product_code" name="product_code" 
                                                        @if (empty($product->product_code))
                                                        placeholder = "ادخل كود المنتج"
                                                        value="{{old('product_code')}}"@else value="{{$product->product_code}}"@endif  aria-invalid="false" >
                                                    </div>
                                                    @error('product_code')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_price">سعر المنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="product_price" name="product_price" 
                                                        @if (empty($product->product_price))
                                                        placeholder = "ادخل سعر المنتج"
                                                        value="{{old('product_price')}}"@else value="{{$product->product_price}}"@endif  aria-invalid="false" >
                                                        @error('product_price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_discount">خصم المنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control " id="product_discount" name="product_discount" 
                                                        @if (empty($product->product_discount))
                                                        placeholder = "ادخل خصم المنتج"
                                                        value="{{old('product_discount')}}"@else value="{{$product->product_discount}}"@endif  aria-invalid="false" >
                                                        @error('product_discount')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_weight">وزن المنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control " id="product_weight" name="product_weight" 
                                                        @if (empty($product->product_weight))
                                                        placeholder = "ادخل وزن المنتج"
                                                        value="{{old('product_weight')}}"@else value="{{$product->product_weight}}"@endif  aria-invalid="false" >
                                                        @error('product_weight')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_color">لون المنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="color" class="form-control " id="product_color" name="product_color" 
                                                        @if (empty($product->product_color))
                                                        placeholder = "ادخل وزن المنتج"
                                                        value="{{old('product_color')}}"@else value="{{$product->product_color}}"@endif  aria-invalid="false" >
                                                        @error('product_color')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="description">وصف قصير للمنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="description" name="description" 
                                                        @if (empty($product->description))
                                                        placeholder = "ادخل وصف قصير للمنتج"
                                                        value="{{old('description')}}"@else value="{{$product->description}}"@endif  aria-invalid="false" >
                                                        @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="long_description">وصف طويل للمنتج   </label>
                                                    <div class="form-control-wrap">
                                                        <textarea type="text" class="form-control " id="long_description" name="long_description" >
                                                            @if (empty($product->long_description))
                                                              {{old('long_description')}}@else {{$product->long_description}}
                                                            @endif  
                                                       </textarea >
                                                        @error('long_description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="hr border-light">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_image">صورة المنتج </label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"  accept="image/*" class="form-file-input" id="product_image"data-show-caption="false" data-show-upload="false" data-fouc name="product_image">
                                                            <label class="form-file-label" for="product_image">اختر صورة</label>
                                                            {{-- @error('product_image')<div class="alert alert-danger">{{ $message }}</div>@enderror --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="product_video"> فيديو المنتج <small class="mx-1"> (يوصي بحجم اقل من 2MB) </small></label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-file">
                                                            <input type="file"   class="form-file-input" id="product_video"data-show-caption="false" data-show-upload="false" data-fouc name="product_video">
                                                            <label class="form-file-label" for="product_video">اختر  فيديو</label>
                                                            @error('product_video')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (!empty($product['product_image']))
                                                <div class="col-md-6" style="position: relative;">
                                                    <a href="{{url('admin/delete-product-image/'.$product['id'])}}"><em class="icon ni ni-cross-sm"
                                                        style="font-size: 26px; color:white; background-color:red; border-radius:50%; position:absolute; right:6px; top:-6px"></em></a>
                                                    <img src="{{asset($product['product_image'])}}" class="img-thumbnail" style="height: 200px; width:200px; object-fit:cover" alt="">
                                                </div>
                                            @endif
                                            @if (!empty($product['product_video']))
                                                <div class="col-md-6">
                                                    <video width="320" height="240" autoplay>
                                                        <source src="{{asset($product['product_video'])}}" type="video/mp4">
                                                        <source src="{{asset($product['product_video'])}}" type="video/ogg">
                                                            متصفحك الحالي لا يدعم تشغيل الفيديو.
                                                    </video>
                                                </div>
                                            @endif
                                            <hr class="hr border-light">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="meta_title">عنوان الميتا    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="meta_title" name="meta_title" 
                                                        @if (empty($product->meta_title))
                                                        placeholder = "ادخل عنوان الميتا "
                                                        value="{{old('meta_title')}}"@else value="{{$product->meta_title}}"@endif  aria-invalid="false" >
                                                        @error('meta_title')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="meta_description">وصف الميتا    </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="meta_description" name="meta_description" 
                                                        @if (empty($product->meta_description))
                                                        placeholder = "ادخل وصف الميتا"
                                                        value="{{old('meta_description')}}"@else value="{{$product->meta_description}}"@endif  aria-invalid="false" >
                                                        @error('meta_description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div><div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="meta_keywords">الكلمات المفتاحية   </label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control " id="meta_keywords" name="meta_keywords" 
                                                        @if (empty($product->meta_keywords))
                                                        placeholder = "ادخل الكلمات المفتاحية"
                                                        value="{{old('meta_keywords')}}"@else value="{{$product->meta_keywords}}"@endif  aria-invalid="false" >
                                                        @error('meta_keywords')<div class="alert alert-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="hr border-light">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label class="form-label me-3 " for="site-off">الحالة </label>
                                                    <div class=" custom-control custom-switch ">
                                                        <input type="checkbox" class="custom-control-input" name="status" id="site-off"{{$product->status == '1' ? 'checked' : '' }}>
                                                        <label class="custom-control-label" for="site-off"><small>مفعل نعم / لا</small></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <label class="form-label me-3 " for="is_featured">متميز </label>
                                                    <div class=" custom-control custom-switch ">
                                                        <input type="checkbox" class="custom-control-input" name="is_featured" id="is_featured" value="نعم"
                                                            @if(!empty($product['is_featured']) && $product['is_featured']== "نعم") checked="" @endif>
                                                        <label class="custom-control-label" for="is_featured"><small>مميز نعم / لا</small></label>
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