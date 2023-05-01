@extends('layouts.app')
@section('title')
 متجرك
@endsection
@section('content')
<!-- Banner Slider Area -->
    <div class="banner-slider-area">
        <div class="banner-slider owl-carousel owl-theme">
            @foreach ($sliderBanners as $banner)
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
            @endforeach
        </div>
    </div>
<!-- Banner Slider Area End -->


{{-- fixedBanner --}}
    @if (isset($fixedBanners[0]['image']))
    <div class="row my-2" style="position: relative;">
        <a @if (!empty($fixedBanners[0]['link'])) href="{{url($fixedBanners[0]['link'])}}"@else href="javascript:;"@endif  >
        <img src="{{$fixedBanners[0]['image']}}" alt="{{$fixedBanners[0]['alt']}}" style="height:300px; width:1920px; object-fit:cover;over-flow:hidden">
        </a>
        <div style="position: absolute;top: 50%;padding: 10px; background-color: #ffffff3d;text-align: center;
                    margin: 0 50px;width:40%;border-radius:5px;backdrop-filter: blur(700px);">
            <h2 style="color: #000000;">{{$fixedBanners[0]['title']}}</h2>
            <a @if (!empty($fixedBanners[0]['link'])) href="{{url($fixedBanners[0]['link'])}}"@else href="javascript:;"@endif  class="default-btn btn-bg-one border-radius-50">تسوق الان</a>
        </div>
    </div>
    @endif
{{-- fixedBanner --}}

<!-- Products Tabs -->
<section class="slider-products pt-5 pb-70" style="background-color: #F5F5F5; ">

    <div class="container">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item nav-item-tab" role="presentation">
              <button class="nav-link active" id="new-arrivals" data-bs-toggle="tab" data-bs-target="#new-arrivals-pane" type="button" role="tab" aria-controls="new-arrivals-pane" aria-selected="true">وصل حديثاً</button>
            </li>
            <li class="nav-item nav-item-tab" role="presentation">
              <button class="nav-link" id="best-seller" data-bs-toggle="tab" data-bs-target="#best-seller-pane" type="button" role="tab" aria-controls="best-seller-pane" aria-selected="false">الاكثر مبيعاً</button>
            </li>
            <li class="nav-item nav-item-tab" role="presentation">
              <button class="nav-link" id="is-featured" data-bs-toggle="tab" data-bs-target="#is-featured-pane" type="button" role="tab" aria-controls="is-featured-pane" aria-selected="false">متميز</button>
            </li>
            <li class="nav-item nav-item-tab" role="presentation">
              <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
            </li>
        </ul>
          <div class="tab-content" id="myTabContent">
            <!-- New Products -->
            <div class="tab-pane fade show active" id="new-arrivals-pane" role="tabpanel" aria-labelledby="new-arrivals" tabindex="0">
                <div  class="slider-product pt-5 ">
                    <div class="section-title ">
                        <h2 style="color:#ff6364">وصل حديثاً</h2>
                    </div>
                    <div class="row @if($newCount > 3) products @endif " >
                            @foreach ($newProducts as $newProduct)
                            <div class="col-3 m-2">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{url('products/'.$newProduct['id'])}}">
                                            <img src="{{$newProduct['product_image']}}" alt="{{$newProduct['product_name']}}">
                                        </a>
                                        <div class="product-item-tag">
                                            <h3>جديد</h3>
                                        </div>
                                        <ul class="product-item-action">
                                            <li><a href="#"><i class="bx bx-repost"></i></a></li>
                                            <li><a href="wishlist.html"><i class="bx bx-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="bx bx-cart"></i></a></li>
                                        </ul>

                                    </div>

                                    <div class="content mb-2 "style="text-align: right; padding-right:20px">
                                        <a href="{{url('products/'.$newProduct['id'])}}" style="color:#777"><span>{{$newProduct['product_code']}} </span></a>
                                        <h3 ><a href="{{url('products/'.$newProduct['id'])}}">{{$newProduct['product_name']}}</a></h3>
                                        <div class="rating ">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        </div>
                                        <hr style="width: 90%">

                                        <div class="d-flex justify-content-between align-items-center pb-3">
                                            <div><strong >{{$newProduct['product_price']}} </strong><span>ر.س</span></div>
                                            @if (!empty($newProduct['product_discount']))
                                            <div style="padding-left: 20px"><del class="float-left"style="font-size:20px; font-weight:500">{{$newProduct['product_discount']}} </del><span>ر.س</span></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                </div>
            </div>
            <!-- New Products -->

            <!-- Best Seller -->
            <div class="tab-pane fade" id="best-seller-pane" role="tabpanel" aria-labelledby="best-seller" tabindex="0">
                <div  class="slider-product pt-5 ">
                   <div class="section-title ">
                       <h2 style="color:#ff6364">الاكثر مبيعاً </h2>
                   </div>
                   <div class="row @if($bestCount > 3) products @endif " >
                           @foreach ($bestProducts as $bestProduct)
                           <div class="col-3 m-2">
                               <div class="product-item">
                                   <div class="product-img">
                                       <a href="{{url('products/'.$bestProduct['id'])}}">
                                           <img src="{{$bestProduct['product_image']}}" alt="{{$bestProduct['product_name']}}">
                                       </a>
                                       <div class="product-item-tag">
                                           <h3>جديد</h3>
                                       </div>
                                       <ul class="product-item-action">
                                           <li><a href="#"><i class="bx bx-repost"></i></a></li>
                                           <li><a href="wishlist.html"><i class="bx bx-heart"></i></a></li>
                                           <li><a href="cart.html"><i class="bx bx-cart"></i></a></li>
                                       </ul>

                                   </div>

                                   <div class="content mb-2 "style="text-align: right; padding-right:20px">
                                       <a href="{{url('products/'.$bestProduct['id'])}}" style="color:#777"><span>{{$bestProduct['product_code']}} </span></a>
                                       <h3 ><a href="{{url('products/'.$bestProduct['id'])}}">{{$bestProduct['product_name']}}</a></h3>
                                       <div class="rating ">
                                           <i class="bx bxs-star"></i>
                                           <i class="bx bxs-star"></i>
                                           <i class="bx bxs-star"></i>
                                           <i class="bx bxs-star"></i>
                                           <i class="bx bxs-star"></i>
                                       </div>
                                       <hr style="width: 90%">

                                       <div class="d-flex justify-content-between align-items-center pb-3">
                                           <div><strong >{{$bestProduct['product_price']}} </strong><span>ر.س</span></div>
                                           @if (!empty($bestProduct['product_discount']))
                                           <div style="padding-left: 20px"><del class="float-left"style="font-size:20px; font-weight:500">{{$bestProduct['product_discount']}} </del><span>ر.س</span></div>
                                           @endif
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endforeach

                   </div>
                </div>
            </div>
            <!-- Best Seller -->


            <!-- Is Featured -->
            <div class="tab-pane fade" id="is-featured-pane" role="tabpanel" aria-labelledby="is-featured" tabindex="0">
                <div  class="slider-product pt-5 ">
                    <div class="section-title ">
                        <h2 style="color:#ff6364">مجموعتنا المميزة </h2>
                    </div>
                    <div class="row @if($featureCount > 3) products @endif " >
                            @foreach ($featuredProducts as $featuredProduct)
                            <div class="col-3 m-2">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="{{url('products/'.$featuredProduct['id'])}}">
                                            <img src="{{$featuredProduct['product_image']}}" alt="{{$featuredProduct['product_name']}}">
                                        </a>
                                        <div class="product-item-tag">
                                            <h3>جديد</h3>
                                        </div>
                                        <ul class="product-item-action">
                                            <li><a href="#"><i class="bx bx-repost"></i></a></li>
                                            <li><a href="wishlist.html"><i class="bx bx-heart"></i></a></li>
                                            <li><a href="cart.html"><i class="bx bx-cart"></i></a></li>
                                        </ul>

                                    </div>

                                    <div class="content mb-2 "style="text-align: right; padding-right:20px">
                                        <a href="{{url('products/'.$featuredProduct['id'])}}" style="color:#777"><span>{{$featuredProduct['product_code']}} </span></a>
                                        <h3 ><a href="{{url('products/'.$featuredProduct['id'])}}">{{$featuredProduct['product_name']}}</a></h3>
                                        <div class="rating ">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        </div>
                                        <hr style="width: 90%">

                                        <div class="d-flex justify-content-between align-items-center pb-3">
                                            <div><strong >{{$featuredProduct['product_price']}} </strong><span>ر.س</span></div>
                                            @if (!empty($featuredProduct['product_discount']))
                                            <div style="padding-left: 20px"><del class="float-left"style="font-size:20px; font-weight:500">{{$featuredProduct['product_discount']}} </del><span>ر.س</span></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                </div>
            </div>
            <!-- Is Featured -->

            <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
          </div>




    </div>
</section>
<!-- Products Tabs -->



@endsection
@section('scripts')
    <script>
        $('.products').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            dots:true,
            speed:800,
            prevArrow:'<i class="bx bx-chevron-right  right-arrow" ></i>',
            nextArrow:'<i class="bx bx-chevron-left left-arrow"></i>',
            autoplaySpeed: 2000,
            rtl: true,
        });

    </script>
@endsection
