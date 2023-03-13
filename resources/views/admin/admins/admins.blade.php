@extends('layouts.admin.master')
@section('title')

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
                                @if ($title == 'Subadmin')
                                    <h6 class="mb-4">المشرفين الفرعيين</h6>
                                @elseif ($title == 'Admin')
                                    <h6 class="mb-4">المشرفين</h6>
                                @elseif ($title == 'Vendor')
                                    <h6 class="mb-4">البائعين</h6>
                                @else
                                    <h6 class="mb-4">المشرفين / المشرفيين الفرعيين / البائعيين </h6>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">الاسم</th>
                                            <th scope="col">النوع</th>
                                            <th scope="col">البريد الالكتروني</th>
                                            <th scope="col">رقم الهاتف </th>
                                            <th scope="col">الصورة  </th>
                                            <th scope="col">الحالة  </th>
                                            <th scope="col">العمليات  </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                        <tr>
                                            <th scope="row">{{$admin['id']}}</th>
                                            <td>{{$admin['name']}}</td>
                                            <td>{{$admin['type']}}</td>
                                            <td>{{$admin['email']}}</td>
                                            <td>{{$admin['mobile']}}</td>
                                            <td>
                                                <img src="{{asset($admin['image'])}}" style="height:35px;width:35px;border-radius:50%"alt="">
                                            </td>
                                            <td>
                                                @if ($admin['status']==1)
                                                <a href="javascript:void(0)" id="admin-{{$admin['id']}}"
                                                   admin_id = {{ $admin['id'] }} class="updateAdminStatus">
                                                   <em class="icon ni ni-check-fill-c text-success" status="Active" style="font-size: 25px"></em>
                                                </a>
                                                @else
                                                <a href="javascript:void(0)" id="admin-{{$admin['id']}}"
                                                   admin_id = {{ $admin['id'] }} class="updateAdminStatus">
                                                   <em class="icon ni ni-cross-fill-c text-danger" Status="Inactive" style="font-size: 25px"></em>
                                                </a>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($admin['type']=='vendor')
                                                    <a href="{{url('admin/view-vendor-details/'.$admin['id'])}}">
                                                       <span title="عرض التفاصيل " ><em class="icon ni ni-file-docs"style="font-size:25px"></em></span>
                                                    </a>
                                                @else
                                                    
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- content @s -->
@endsection
@section('scripts')
    
@endsection