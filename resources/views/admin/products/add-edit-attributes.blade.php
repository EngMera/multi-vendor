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
                                <div class="nk-block-head">
                                    <div class="nk-block-between g-3">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title text-primary">أضافة صفات المنتج</h5>
                                        </div>
                                        <div class="nk-block-head-content">
                                            <a href="{{url('admin/products')}}" class="btn btn-outline-light bg-primary  text-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-right"></em></a>
                                            <a href="{{url('admin/products')}}" class="btn btn-icon btn-outline-light bg-primary text-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-right"></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Product Information Card --}}
                        <div class="card">
                            <div class="card-inner">
                                <h5 class="text-primary mb-4 "> معلومات المنتج </h5>
                                <div class="row mb-4">
                                    <div class="col-md-2">
                                        @if (!empty($product['product_image']))
                                            <div class="col-md-6" style="position: relative;">
                                                <img src="{{asset($product['product_image'])}}" class="img-thumbnail" style="border-radius:5px; height: 120px; width:120px; object-fit:cover" alt="">
                                            </div>
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
                        </div>

                        {{-- Add Attributes Card --}}
                        <div class="card">
                            <div class="card-inner">
                                <form action="{{ url('admin/add-edit-attributes/'.$product['id']) }}"
                                        class="form-validate is-alter mt-5 " method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-gs">
                                        <div class="row">
                                            <div class="d-flex justify-between mb-3">
                                                <h5 class="text-primary bg-white" style="background-color: #ffffff !important;z-index: 99;padding-left:20px;"> {{$title}} </h5>
                                            </div>
                                            <div class="col-md-3" style="width: 23.5%;">
                                                <label for="size">الحجم :</label>
                                            </div>
                                            <div class="col-md-3" style="width: 23.5%;">
                                                <label for="sku"  >وحدة SKU :</label>
                                            </div>
                                            <div class="col-md-3" style="width: 23.5%;">
                                                <label for="price" >السعر :</label>
                                            </div>
                                            <div class="col-md-3" style="width: 23.5%;">
                                                <label for="stock" >المخزن :</label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="field_wrapper">
                                                    <div class="d-flex" >

                                                        <input type="text" name="size[]" placeholder="ادخل الحجم .." value=""class="form-control" style="display: inline-block; width: 80%;" required/>
                                                        <input type="text" name="sku[]" placeholder="ادخل وحدة حفظ المخزون SKU .." value=""class="form-control mx-2" style="display: inline-block; width: 80%;" required/>
                                                        <input type="text" name="price[]" placeholder="ادخل السعر .." value=""class="form-control mx-2" style="display: inline-block; width: 80%;" required/>
                                                        <input type="text" name="stock[]" placeholder="ادخل المخزن .." value=""class="form-control mx-2" style="display: inline-block; width: 80%;" required/>
                                                        <a href="javascript:void(0);" class="add_button" title="Add field"><em class="icon ni ni-plus-round-fill" style="font-size: 30px;"></em></a>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label class="form-label me-3 " for="site-off">الحالة </label>
                                                <div class=" custom-control custom-switch ">
                                                    <input type="checkbox" class="custom-control-input" name="status" id="site-off">
                                                    <label class="custom-control-label" for="site-off"><small>مفعل نعم / لا</small></label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 mb-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary float-end  ">{{$send}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                        
                        {{-- Attributes List Card & Edit --}}
                        <div class="card">
                            <div class="card-inner">
                                <div class="row g-gs">
                                    <div class="container-fluid">
                                        <div class="nk-content-inner">
                                            <div class="nk-content-body">
                                                <div id="DataTables_Tabl_0_wrapper"class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                    <h5 class="text-primary mt-4 mb-4">قائمة الصفات </h5>
                                                    <table class="table table-striped datatable-init  dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">الحجم</th>
                                                                <th scope="col">وحدة حفظ المخزون</th>
                                                                <th scope="col">السعر </th>
                                                                <th scope="col">المخزن</th>
                                                                <th scope="col">الحالة</th>
                                                                <th scope="col">العمليات  </th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($product['attributes'] as $attribute)
                                                                    <tr>
                                                                        <th scope="row">{{$loop->iteration}}</th>
                                                                        <td>{{$attribute['size']}}</td>
                                                                        
                                                                        <td>{{$attribute['sku']}}</td>
                                                                        <td>
                                                                            {{$attribute['price']}}
                                                                        </td>
                                                                        <td>
                                                                            {{$attribute['stock']}}
                                                                        </td>
                                                                        

                                                                        <td>
                                                                            @if ($attribute['status'] == 1)
                                                                            <a href="javascript:void(0)" id="attribute-{{$attribute['id']}}"
                                                                                attribute_id = {{ $attribute['id'] }} class="updateAttributeStatus">
                                                                                <em class="icon ni ni-check-fill-c text-success" status="Active" style="font-size: 25px"></em>
                                                                                </a>
                                                                                @else
                                                                                <a href="javascript:void(0)" id="attribute-{{$attribute['id']}}"
                                                                                attribute_id = {{ $attribute['id'] }} class="updateAttributeStatus">
                                                                                <em class="icon ni ni-cross-fill-c text-danger" Status="Inactive" style="font-size: 25px"></em>
                                                                                </a>
                                                                            @endif
                                                                        </td>
                                                                    
                                                                        <td>
                                                                                
                                                                                <button type="button" class="btn btn-sm" style="background-color: none; outline:none" data-bs-toggle="modal" data-bs-target="#edit{{$attribute['id']}}">
                                                                                    <em class="icon ni ni-edit text-primary" title="تعديل" style="font-size:25px ; cursor:pointer"></em>
                                                                                </button>
                                                                                <button type="button" class="btn btn-sm" style="background-color: none; outline:none" data-bs-toggle="modal" data-bs-target="#delete{{$attribute['id']}}">
                                                                                    <em class="icon ni ni-trash text-danger" title="حذف" style="font-size:25px ; cursor:pointer"></em>
                                                                                </button>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <!-- Delete Modal -->
                                                                    <div class="modal fade" id="delete{{$attribute['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body modal-body modal-body-lg text-center">
                                                                                    <div class="nk-modal">
                                                                                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                                                                            <h5 class="nk-modal-title">حذف  الصفة !</h5>
                                                                                            <div class="nk-modal-text">
                                                                                                <p class="lead"> هل أنت متأكد من حذف الصفة ؟!</p>
                                                                                            </div>
                                                                                            <form action="{{url('admin/attribute/'.$attribute['id'].'/delete')}}"method="Get">
                                                                                                @csrf
                                                                                                <input type="text" value="{{$attribute['size']}}" class="mb-5 text-center" disabled>
                                                                                                <div>
                                                                                                    <button type="submit" class="btn btn-danger">حذف</button>
                                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                                                                                                </div>
                                                                                            </form>
                                                                                    </div> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- Delete Modal -->
                                                                    <!-- edit Modal -->
                                                                    <div class="modal fade" id="edit{{$attribute['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">

                                                                                    <h5 class="modal-title"> تعديل الصفة </h5>
                                                                                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                        <em class="icon ni ni-cross"></em>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{url('admin/edit-attribute/'.$product['id'])}}"method="post" >
                                                                                        @csrf
                                                                                        <input type="hidden" class="form-control"  name="id" value="{{$attribute['id']}}">
                                                                                        <div class="col-sm-12 mb-3">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">الحجم</label>
                                                                                                <input type="text" class="form-control"  name="size" value="{{$attribute['size']}}" >
                                                                                                @error('size') <div class="text-danger">*{{$message}}</div> @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 mb-3">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">وحدة حفظ المخزون</label>
                                                                                                <input type="text" class="form-control"  name="sku" value="{{$attribute['sku']}}" required>
                                                                                                @error('sku') <div class="text-danger">*{{$message}}</div> @enderror

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 mb-3">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">السعر</label>
                                                                                                <input type="number" class="form-control"  name="price" value="{{$attribute['price']}}" required>
                                                                                                @error('price') <div class="text-danger">*{{$message}}</div> @enderror

                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-12 mb-3">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label">المخزن</label>
                                                                                                <input type="number" class="form-control"  name="stock" value="{{$attribute['stock']}}" required>
                                                                                                @error('stock') <div class="text-danger">*{{$message}}</div> @enderror
                                                                                            </div>
                                                                                        </div>
                                                                                        {{-- <div class="col-md-12">
                                                                                            <div class="form-group">
                                                                                                <label class="form-label me-3 " for="status">الحالة </label>
                                                                                                <div class=" custom-control custom-switch ">
                                                                                                    <input type="checkbox" class="custom-control-input" name="status" id="status" {{$attribute['status'] == '1' ? 'checked' : '' }}>
                                                                                                    <label class="custom-control-label" for="status"><small>مفعل نعم / لا</small></label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div> --}}
                                                                                        <div class="col-sm-12 ">
                                                                                            <div class="mt-4 ">
                                                                                                <button type="submit" class="btn btn-primary  ">حفظ</button>
                                                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- edit Modal -->
                                                                    
                                                                
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        {{-- success message --}}

        {{-- error message --}}
        @if (session('error_message'))
            <div id ="modal2"class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
                <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
                    <div class="swal2-header">
                        <ul class="swal2-progress-steps" style="display: none;"></ul>
                        <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;"><span class="swal2-x-mark">
                            <span class="swal2-x-mark-line-left"></span>
                            <span class="swal2-x-mark-line-right"></span>
                            </span>
                        </div>
                        <div class="swal2-icon swal2-question" style="display: none;"></div>
                        <div class="swal2-icon swal2-warning" style="display: none;"></div>
                        <div class="swal2-icon swal2-info" style="display: none;"></div>
                        <div class="swal2-icon swal2-success" style="display: none;"></div>
                        <img class="swal2-image" style="display: none;">
                        <h2 class="swal2-title" id="swal2-title" style="display: flex;">خطا!</h2>
                        <button type="button" class="swal2-close" aria-label="Close this dialog" style="display: none;">×</button>
                    </div>
                    <div class="swal2-content">
                        <div id="swal2-content" class="swal2-html-container" style="display: block;">{{session('error_message')}}</div>
                        <input class="swal2-input" style="display: none;"><input type="file" class="swal2-file" style="display: none;">
                        <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                        <select class="swal2-select" style="display: none;"></select>
                        <div class="swal2-radio" style="display: none;"></div>
                        <label for="swal2-checkbox" class="swal2-checkbox" style="display: none;"><input type="checkbox"><span class="swal2-label"></span></label>
                        <textarea class="swal2-textarea" style="display: none;"></textarea>
                        <div class="swal2-validation-message" id="swal2-validation-message"></div>
                    </div>
                    <div class="swal2-actions"><button type="button" class="swal2-confirm swal2-styled btn btn-primary" aria-label="" style="display: inline-block; background-color:#854fff"onclick="document.getElementById('modal2').style.display='none'">OK</button><button type="button" class="swal2-cancel swal2-styled" aria-label="" style="display: none;">Cancel</button></div>
                    <div class="swal2-footer" style="display: none;"></div>
                    <div class="swal2-timer-progress-bar-container">
                        <div class="swal2-timer-progress-bar" style="display: none;"></div>
                    </div>
                </div>
            </div>
        @endif
        {{-- error message --}}
        
       
 
    <!-- content @s -->
@endsection
@section('scripts')
    
@endsection