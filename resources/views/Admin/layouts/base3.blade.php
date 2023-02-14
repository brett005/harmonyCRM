<!doctype html>
<html lang="en" dir="ltr">
<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta
            content="DayOne - It is one of the Major Dashboard Template which includes - HR, Employee and Job Dashboard. This template has multipurpose HTML template and also deals with Task, Project, Client and Support System Dashboard."
            name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
          content="admin dashboard, admin dashboard template, admin template, bootstrap 5 django, django, django bootstrap admin, django template, django bootstrap template, django admin, django admin dashboard, django admin dashboard template, django admin panel, django admin template, django dashboard, dashboard template">
    <!-- TITLE -->
    <title>harmonie</title>
    @include('Admin.layouts.styles')

    <!-- INTERNAL SWITCHER CSS -->
    <link href="{{ asset('assets/switcher/css/switcher.css')}}" rel="stylesheet"/>
    <link href="{{ asset('assets/switcher/demo.css')}}" rel="stylesheet"/>

    <!-- END STYLES -->

</head>

<body class="ltr app sidebar-mini">

<!-- SWITCHER -->
@include('Admin.layouts.switcher')
<!-- SWITCHER END-->

<!-- GLOBAL-LOADER -->
<!--div id="global-loader">
            <img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
        </div-->
<!-- GLOBAL-LOADER END -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

        <!-- APP-HEADER -->

        <!-- APP-HEADER END-->

        @include('Admin.layouts.app-header')

        <!-- APP-SIDEBAR -->


        @include('Admin.layouts.app-sidebar3')

        <!-- APP-SIDEBAR END-->

        <!-- APP-CONTENT -->
        <div class="app-content main-content">

            <div class="side-app main-container">

                @yield('agent3')
            </div>
            <!-- APP-CONTENT END -->
        </div>
        <!-- PAGE-MAIN END -->
    </div>
    <!-- CHANGE PASSWORD MODAL -->

    @include('Admin.layouts.modal')

    <!-- CHANGE PASSWORD MODAL END-->

    <!-- RIGHT-SIDEBAR -->

    @include('Admin.layouts.right-sidebar')

    <!-- RIGHT-SIDEBAR END-->

    <!-- FOOTER -->

    @include('Admin.layouts.footer')

    <!-- FOOTER END-->

</div>
<!-- PAGE END -->

<!-- SCRIPTS -->

@include('Admin.layouts.scripts')


<!-- CUSTOM1 JS -->
<script src="{{asset('assets/js/custom1.js')}}"></script>

<!-- SWITCHER JS -->
<script src="{{asset('assets/switcher/js/switcher.js')}}"></script>

<!-- SCRIPTS END-->

</body>

</html>



