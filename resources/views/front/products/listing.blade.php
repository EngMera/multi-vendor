@extends('layouts.app')
@section('title')
 متجرك
@endsection
@section('content')
<!-- Products Listing -->
<div class="product-area pt-100 pb-70">
    <div class="container">
        <div class="product-topper">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="product-topper-title">
                        <h3> {{$categoryDetails['categoryDetails']['category_name']}} <span></span> </h3>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <select name="" id="" class="form-select">
                        <option>mera</option>

                    </select>

                        {{-- <div class="form-group">
                            <select class="form-control" style=>
                                <optgroup label="Swedish Cars">
                                    <option value="volvo">Volvo</option>
                                    <option value="saab">Saab</option>
                                </optgroup>
                            </select>
                            <div class="nice-select form-control" tabindex="0">
                                <span class="current">التصنيفات</span>
                                <select class="list">
                                     @foreach ($sections as $section)
                                     <optgroup value="{{$section['name']}}" class="option selected">
                                        {{$section['name']}}
                                        @if (count($section['categories'])>0)
                                            @foreach ($section['categories'] as $category)
                                            <option value="{{$category['category_name']}}" class="option selected">
                                               {{$category['category_name']}}

                                            </option>
                                            @endforeach
                                       @endif

                                     </optgroup>


                                     @endforeach

                                </select>
                            </div>
                        </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Show All Products --}}
            @forelse ($categoryProducts as $product)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="product-img">
                        <a href="{{url('products/'.$product['id'])}}">
                            <img src="{{$product['product_image']}}" alt="{{$product['product_name']}}">
                        </a>
                        @if (!empty($product['product_discount']))
                            <div class="product-item-tag">
                                <h3>خصم {{$product['product_discount']}}</h3>
                            </div>
                        @endif
                        <ul class="product-item-action">
                            <li><a href="#"><i class="bx bx-repost"></i></a></li>
                            <li><a href="wishlist.html"><i class="bx bx-heart"></i></a></li>
                            <li><a href="cart.html"><i class="bx bx-cart"></i></a></li>
                        </ul>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">{{$product['product_name']}}</a></h3>
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </div>
                        <hr style="margin:10px 15px">

                        <div class="d-flex justify-content-between align-items-center pb-3 mx-4">
                            <div><strong >{{$product['product_price']}} </strong><span>ر.س</span></div>
                            @if (!empty($product['product_old_price']))
                            <div style="padding-left: 20px">
                                <del class="float-left"style="font-size:20px; font-weight:500">{{$product['product_old_price']}} </del><span>ر.س</span>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="container">
                <div class="" style="width:400px; margin:auto; ">
                    <img src="{{asset('assets/frontend/images/pics/no-product.png')}}" alt="no-product.png">
                    <h2 class="text-danger text-center mt-2">لايوجد منتجات بعد</h2>
                </div>

            </div>

            @endforelse

            {{-- Show All Products  --}}
        </div>
    </div>
</div>
<!-- Products Listing -->
@endsection
