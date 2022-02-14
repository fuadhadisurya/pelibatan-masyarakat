
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin_dashboard/assets/img/favicon.ico') }}"/>
    {{-- <link href="{{ asset('admin_dashboard/assets/css/loader.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('admin_dashboard/assets/js/loader.js') }}"></script> --}}
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('admin_dashboard/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_dashboard/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin_dashboard/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_dashboard/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    @stack('styles')
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
</head>
<body class="sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    {{-- <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div> --}}
    <!--  END LOADER -->
    
    <!--  BEGIN NAVBAR  -->
    @include('admin_dashboard.includes.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('admin_dashboard.includes.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->
                
                @yield('content')

                <!-- CONTENT AREA -->

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © {{ Carbon\Carbon::now()->year }} <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    @stack('modal')

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('admin_dashboard/assets/js/libs/jquery-3.1.1.js') }}"></script>
    <script src="{{ asset('admin_dashboard/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin_dashboard/assets/js/app.js') }}"></script>
    <script src="{{ asset('admin_dashboard/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script type="text/javascript">
        feather.replace();
    </script>
    <script src="{{ asset('admin_dashboard/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @stack('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>