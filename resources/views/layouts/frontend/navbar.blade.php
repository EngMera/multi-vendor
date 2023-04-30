<?php
  use App\Models\Section;
  $getSections = Section::sections();
?>

<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index.html" class="logo">
            <img src="{{url('assets/frontend/images/logos/logo-1.png')}}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        @foreach ($getSections as $section)
                            @if (count($section['categories'])>0)
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    {{$section['name']}}
                                    <i class="bx bx-chevron-down"></i>
                                </a>
                                @if (count($section['categories'])>0)
                                <ul class="dropdown-menu">
                                    @foreach ($section['categories'] as $category)
                                        <li class="nav-item">
                                            <a href="{{url($category['url'])}}" class="nav-link ">
                                                {{$category->category_name}}
                                                @if (count($category['subcategories'])>0)
                                                <i class="bx bx-chevron-down"></i>
                                                @endif
                                            </a>
                                        @if (count($category['subcategories'])>0)
                                            <ul class="dropdown-menu">
                                            @foreach ($category['subcategories'] as $subcategory)
                                                <li class="nav-item">
                                                    <a href="{{url($subcategory['url'])}}" class="nav-link ">
                                                        {{$subcategory->category_name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        @endif
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                                {{-- <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="index.html" class="nav-link active">
                                            Home One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-2.html" class="nav-link">
                                            Home Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-3.html" class="nav-link">
                                            Home Three
                                        </a>
                                    </li>
                                </ul> --}}
                            </li>
                            @endif
                        @endforeach
                    </ul>

                    <div class="nav-right-side">
                        <ul class="nav-right-list">
                            <li><a href="#"><i class='bx bx-repost'></i></a></li>
                            <li><a href="#"><i class='bx bx-heart'></i></a></li>
                            <li class="cart-span">
                                <a href="#"><i class='bx bx-cart'></i></a>
                                <span>1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-nav-item">
                            <ul class="nav-right-list">
                                <li><a href="#"><i class='bx bx-repost'></i></a></li>
                                <li><a href="#"><i class='bx bx-heart'></i></a></li>
                                <li class="cart-span">
                                    <a href="#"><i class='bx bx-cart'></i></a>
                                    <span>1</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
