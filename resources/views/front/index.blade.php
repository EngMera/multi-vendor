@extends('layouts.app')
@section('title')
 متجرك
@endsection
@section('content')
<!-- Banner Slider Area -->
    <div class="banner-slider-area">
        <div class="banner-slider owl-carousel owl-theme">
            @foreach ($banners as $banner)
             @if (!empty($banner['type']&&$banner['type']=="slider"))
                <div class="banner-slider-item">
                    <div class="row" style="position: relative;">
                        <a @if (!empty($banner['link'])) href="{{url($banner['link'])}}"@else href="javascript:;"@endif  >
                          <img src="{{$banner['image']}}" alt="{{$banner['alt']}}" style="height:480px; width:1920px; object-fit:cover">
                        </a>
                        <div style="position: absolute;top: 60%;padding: 10px; background-color: #ffffff3d;text-align: center;
                                    margin: 0 50px;width:40%;border-radius:5px;backdrop-filter: blur(700px);">
                            <h2 style="color: #000000;">{{$banner['title']}}</h2>
                            <a @if (!empty($banner['link'])) href="{{url($banner['link'])}}"@else href="javascript:;"@endif  class="default-btn btn-bg-one border-radius-50">تسوق الان</a>
                        </div>
                    </div>
                </div>
             @endif
            @endforeach
        </div>
    </div>
    @foreach ($banners as $banner)
    @if (!empty($banner['type']&&$banner['type']=="fixed"))
        <div class="row my-2" style="position: relative;">
            <a @if (!empty($banner['link'])) href="{{url($banner['link'])}}"@else href="javascript:;"@endif  >
            <img src="{{$banner['image']}}" alt="{{$banner['alt']}}" style="height:300px; width:1920px; object-fit:cover;over-flow:hidden">
            </a>
            <div style="position: absolute;top: 60%;padding: 10px; background-color: #ffffff3d;text-align: center;
                        margin: 0 50px;width:40%;border-radius:5px;backdrop-filter: blur(700px);">
                <h2 style="color: #000000;">{{$banner['title']}}</h2>
                <a @if (!empty($banner['link'])) href="{{url($banner['link'])}}"@else href="javascript:;"@endif  class="default-btn btn-bg-one border-radius-50">تسوق الان</a>
            </div>
        </div>
    @endif
    @endforeach
<!-- Banner Slider Area End -->
@endsection
