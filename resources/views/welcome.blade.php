<!doctype html>
<html lang="ar" dir="rtl">
    @include('layouts.frontend.head')
    <body>
        <!-- Pre Loader -->
        {{-- <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <img src="assets/images/preloder-img.png" alt="Images">
                    <h2>Hilo</h2>
                </div>
            </div>
        </div> --}}
        <!-- End Pre Loader -->

        <!-- Top Header Start -->
         @include('layouts.frontend.header')
        <!-- Top Header End -->

        <!-- Start Navbar Area -->
         @include('layouts.frontend.navbar')
        <!-- End Navbar Area -->

        <!-- content Area -->
          @yield('content')
        <!-- content End -->

        <!-- Footer Area -->
         @include('layouts.frontend.footer')
        <!-- Footer Area End -->


        @include('layouts.frontend.footer-scripts')


    </body>
</html>
