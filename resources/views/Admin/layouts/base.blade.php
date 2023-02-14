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

<!-- SWITCHER END-->

<!-- GLOBAL-LOADER -->
<!--div id="global-loader">
            <img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
        </div-->
<!-- GLOBAL-LOADER END -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">


        <!-- APP-CONTENT -->


        @yield('page')
        @yield('formulaire2')
        @yield('demarrer')
        @yield('content')

        <!-- APP-CONTENT END -->

    </div>
    <!-- PAGE-MAIN END -->

    <!-- CHANGE PASSWORD MODAL -->


    <!-- CHANGE PASSWORD MODAL END-->

    <!-- RIGHT-SIDEBAR -->


    <!-- RIGHT-SIDEBAR END-->

    <!-- FOOTER -->


    <!-- FOOTER END-->

</div>
<!-- PAGE END -->

<!-- SCRIPTS -->


<!-- CUSTOM1 JS -->
<!-- CUSTOM1 JS -->
<script src="{{asset('assets/js/custom1.js')}}"></script>

<!-- SWITCHER JS -->
<script src="{{asset('assets/switcher/js/switcher.js')}}"></script>
<script src="{{asset('assetsjs/jquery.flipTimer.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.flipTimer').flipTimer({direction: 'up'});
    });
</script>


</body>

</html>



