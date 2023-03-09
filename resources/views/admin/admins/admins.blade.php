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
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$admin['name']}}</td>
                                            <td>{{$admin['type']}}</td>
                                            <td>{{$admin['email']}}</td>
                                            <td>{{$admin['mobile']}}</td>
                                            <td>
                                                <img src="{{asset('admin/images/photos/'.$admin['image'])}}" alt="">
                                                
                                            </td>
                                            <td>
                                                @if ($admin['status']==1)
                                                 <em class="icon ni ni-check-fill-c text-success" style="font-size: 25px"></em>
                                                    
                                                @else
                                                 <em class="icon ni ni-cross-fill-c text-danger" style="font-size: 25px"></em>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($admin['type']=='vendor')
                                                    <a href="{{url('admin/view-vendor-details/'.$admin['id'])}}">
                                                       <span title="عرض التفاصيل "class=" " ><em class="icon ni ni-file-docs"style="font-size:25px"></em></span>
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