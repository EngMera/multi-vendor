@extends('layouts.app')
@section('title')
 متجرك
@endsection
@section('content')
<!-- Banner Slider Area -->
    <div class="banner-slider-area">
        <div class="banner-slider owl-carousel owl-theme">
            @foreach ($banners as $banner)
                <div class="banner-slider-item">
                    <div class="row" style="position: relative;">
                        <img src="{{$banner['image']}}" alt="{{$banner['alt']}}">
                        <div style="position: absolute;top: 70%;padding: 10px;background-color: #ffffff3d;text-align: center;
                                    margin: 0 50px;width:20%;border-radius:5px;backdrop-filter: blur(700px);">
                            <h2 style="color: #000000;">{{$banner['title']}}</h2>
                            <a href="{{url($banner['link'])}}" class="default-btn btn-bg-one border-radius-50">تسوق الان</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
<!-- Banner Slider Area End -->
@endsection
