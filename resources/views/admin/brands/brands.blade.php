@extends('layouts.admin.master')
@section('title')
 العلامة التجارية
@endsection

@section('style')
    
@endsection
@section('content')
    <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="card card-bordered card-preview">
                            <div class="card-inner">

                                <div id="DataTables_Table_0_wrapper"class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="d-flex justify-between mb-3">
                                        <h5 class="text-primary"><em class="icon ni ni-list-thumb-alt-fill px-2"></em>قائمة العلامات التجارية</h5>
                                        <a href="{{url('admin/add-edit-brand')}}" class="btn btn-primary ">أضافة علامة تجارية جديد</a>
                                    </div>
                                    {{-- table data --}}
                                    <table class="table table-striped datatable-init table dataTable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">الاسم</th>
                                                <th scope="col">الصورة</th>
                                                <th scope="col">الحالة</th>
                                                <th scope="col">العمليات  </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($brands as $brand)
                                            
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$brand['name']}}</td>
                                                <td>
                                                    @if (!empty($product['product_image']))
                                                      <img src="{{asset($brand['brand_image'])}}"  style="height:40px; width:40px; border-radius:50%; object-fit:cover"alt="">
                                                    @else
                                                        <img src="{{asset('uploads/brand/no-image.jpg')}}"  style="height:40px; width:40px; border-radius:50%; object-fit:cover"alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($brand['status'] == 1)
                                                    <a href="javascript:void(0)" id="brand-{{$brand['id']}}"
                                                        brand_id = {{ $brand['id'] }} class="updateBrandStatus">
                                                        <em class="icon ni ni-check-fill-c text-success" status="Active" style="font-size: 25px"></em>
                                                        </a>
                                                        @else
                                                        <a href="javascript:void(0)" id="brand-{{$brand['id']}}"
                                                        brand_id = {{ $brand['id'] }} class="updateBrandStatus">
                                                        <em class="icon ni ni-cross-fill-c text-danger" Status="Inactive" style="font-size: 25px"></em>
                                                        </a>
                                                    @endif
                                                </td>
                                              
                                                <td>
                                                        <a href="{{url('admin/add-edit-brand/'.$brand['id'])}}">
                                                            <button type="button" class="btn btn-sm" style="background-color: none; outline:none" >
                                                                <em class="icon ni ni-edit text-primary" title="تعديل" style="font-size:25px ; cursor:pointer"></em>
                                                            </button>
                                                        </a>
                                                        <button type="button" class="btn btn-sm" style="background-color: none; outline:none" data-bs-toggle="modal" data-bs-target="#delete{{$brand['id']}}">
                                                            <em class="icon ni ni-trash text-danger" title="حذف" style="font-size:25px ; cursor:pointer"></em>
                                                        </button>
                                                </td>
                                            </tr>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete{{$brand['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body modal-body modal-body-lg text-center">
                                                            <div class="nk-modal">
                                                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                                                    <h5 class="nk-modal-title">حذف  الماركة !</h5>
                                                                    <div class="nk-modal-text">
                                                                        <p class="lead"> هل أنت متأكد من حذف الماركة ؟!</p>
                                                                    </div>
                                                                    <form action="{{url('admin/brands/'.$brand['id'].'/delete')}}"method="Get">
                                                                        @csrf
                                                                        <input type="text" value="{{$brand['name']}}" class="mb-5 text-center" disabled>
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- table data --}}
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