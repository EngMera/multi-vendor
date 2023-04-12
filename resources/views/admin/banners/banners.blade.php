@extends('layouts.admin.master')
@section('title')
    الصور المتحركة
@endsection

@section('style')

@endsection
@section('content')
    <!-- content @s -->
        <div class="nk-content ">
            <div class="container-fluid">
                <div class="nk-content-inner">
                    <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                <h5 class="nk-block-title  text-primary">قائمة الصور المتحركة</h5>
                                </div>
                                <!-- .nk-block-head-content -->
                                <div class="nk-block-head-content">
                                    <div class="toggle-wrap nk-block-tools-toggle">
                                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                        <div class="toggle-expand-content" data-content="pageMenu">
                                            <ul class="nk-block-tools g-3">
                                                <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-search"></em>
                                                    </div>
                                                    <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                                </div>
                                                </li>
                                                <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><span>جديد</span></a></li>
                                                            <li><a href="#"><span>مميز</span></a></li>
                                                            <li><a href="#"><span>إنتهى من المخزن</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                </li>
                                                <li class="nk-block-tools-opt">
                                                    <a href="{{url('admin/add-edit-banner')}}"  class=" btn btn-primary d-none d-md-inline-flex"><span>أضافة صورة</span><em class="icon ni ni-plus"></em></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- .nk-block-head-content -->
                            </div>
                            <!-- .nk-block-between -->
                        </div>
                        <!-- .nk-block-head -->
                        <div class="nk-block">
                            <div class="card">
                                <div class="card-inner-group">
                                    <div class="card-inner p-0">
                                        <div class="nk-tb-list ">
                                            <div class="nk-tb-item nk-tb-head">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid">
                                                    <label class="custom-control-label" for="pid"></label>
                                                </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm"><span>الصورة</span></div>
                                                <div class="nk-tb-col"><span>العنوان  </span></div>
                                                <div class="nk-tb-col tb-col-sm"><span>النص البديل</span></div>
                                                <div class="nk-tb-col"><span>الرابط</span></div>
                                                <div class="nk-tb-col"><span>الحالة</span></div>
                                                <div class="nk-tb-col tb-col-md"><em class="tb-asterisk icon ni ni-star-round"></em></div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="me-n1">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>تعديل المحدد</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span> حذف المحدد</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-bar-c"></em><span> تعديل المخزن</span></a></li>
                                                                    <li><a href="#"><em class="icon ni ni-invest"></em><span>تعديل السعر </span></a></li>
                                                                </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- .nk-tb-item -->
                                            @foreach ($banners as $banner)

                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid1">
                                                    <label class="custom-control-label" for="pid1"></label>
                                                </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                <span class="tb-product">
                                                @if (!empty($banner['image']))
                                                    <a class="gallery-image popup-image" href="{{asset($banner['image'])}}">
                                                        <img src="{{asset($banner['image'])}}" class="thumb" alt="{{$banner['alt']}}">
                                                    </a>
                                                @else
                                                    <img src="{{asset('uploads/banner/no-image.jpg')}}"  class="thumb" alt="">
                                                @endif
                                                <span class="title">{{$banner['title']}}</span>
                                                </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{$banner['title']}}</span>
                                                  </div>
                                                <div class="nk-tb-col">
                                                  <span class="tb-sub">{{$banner['alt']}}</span>
                                                </div>
                                                <div class="nk-tb-col">
                                                  <span class="tb-lead">{{$banner['link']}}</span>
                                                </div>


                                                <div class="nk-tb-col tb-col-md">
                                                    <span class="tb-sub">
                                                        @if ($banner['status'] == 1)
                                                            <a href="javascript:void(0)" id="banner-{{$banner['id']}}"
                                                               banner_id = {{ $banner['id'] }} class="updatebannerstatus">
                                                                <em class="icon ni ni-check-fill-c text-success" status="Active" style="font-size: 25px"></em>
                                                            </a>
                                                            @else
                                                            <a href="javascript:void(0)" id="banner-{{$banner['id']}}"
                                                               banner_id = {{ $banner['id'] }} class="updatebannerstatus">
                                                                <em class="icon ni ni-cross-fill-c text-danger" Status="Inactive" style="font-size: 25px"></em>
                                                            </a>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col tb-col-md">
                                                    <div class="asterisk tb-asterisk">
                                                        <a href="#"><em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="me-n1">
                                                        <div class="dropdown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{url('admin/add-edit-banner/'.$banner['id'])}}"><em class="icon ni ni-edit"></em><span> تعديل الصورة</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-eye"></em><span> عرض الصورة</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-activity-round"></em><span> الطلبات</span></a></li>
                                                                <li><a href="#"data-bs-toggle="modal" data-bs-target="#delete{{$banner['id']}}"><em class="icon ni ni-trash"></em><span> حذف الصورة</span></a>
                                                                </li>
                                                            </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                </div>
                                            </div>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete{{$banner['id']}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body modal-body modal-body-lg text-center">
                                                            <div class="nk-modal">
                                                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                                                    <h5 class="nk-modal-title">حذف  الماركة !</h5>
                                                                    <div class="nk-modal-text">
                                                                        <p class="lead"> هل أنت متأكد من حذف الماركة ؟!</p>
                                                                    </div>
                                                                    <form action="{{url('admin/banners/'.$banner['id'].'/delete')}}"method="Get">
                                                                        @csrf
                                                                        <input type="text" value="{{$banner['banner_name']}}" class="mb-5 text-center" disabled>
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

                                            <!-- .nk-tb-item -->

                                        </div>
                                        <!-- .nk-tb-list -->
                                    </div>
                                    <div class="card-inner">
                                        <div class="nk-block-between-md g-3">
                                            <div class="g">
                                                <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                   {{-- {{ $banners->links() }} --}}
                                                </div>
                                            </div><!-- .pagination-goto -->
                                        </div><!-- .nk-block-between -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .nk-block -->
                   </div>
                </div>
            </div>
        </div>
    <!-- content @s -->
@endsection
@section('scripts')

@endsection
