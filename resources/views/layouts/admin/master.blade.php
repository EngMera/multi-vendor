
<!DOCTYPE html>
<html lang="zxx" class="js">

@include('layouts.admin.head')

<body class="nk-body bg-lighter npc-default has-sidebar has-rtl" dir="rtl">
    
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('layouts.admin.sidebar')
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">

                <!-- main header @s -->
                @include('layouts.admin.main-header')
                <!-- main header @e -->

                <!-- content @s -->
                @yield('content')
                <!-- content @e -->

                <!-- footer @s -->
                @include('layouts.admin.footer')
                <!-- footer @e -->

            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- select region modal -->
    @include('layouts.admin.modal')
    <!-- .modal -->


    <!-- JavaScript -->
    

     @include('layouts.admin.footer-scripts')

   
</body>

</html>