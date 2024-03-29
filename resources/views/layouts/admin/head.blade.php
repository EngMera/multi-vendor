<head>
    <base href="../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>@yield('title')</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/dashlite.rtl.css')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/admin/css/theme.css')}}">
    
    @yield('style')
</head>
{{-- {{asset('assets/admin/images')}} --}}