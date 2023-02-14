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

    <!-- FAVICON -->
    <link rel="icon" href="{{asset('assets/images/brand/capital.jpg')}}" type="image/x-icon"/>

    <!-- BOOTSTRAP CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" id="style"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet"/>

    <!--- ANIMATE CSS -->
    <link href="{{asset('assets/css/animated.css')}}" rel="stylesheet"/>

    <!--- ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>
    <!-- INTERNAL SWITCHER CSS -->
    <title>harmonie</title>
    @include('Admin.layouts.styles')

    <!-- INTERNAL SWITCHER CSS -->
    <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet"/>


    <!-- END STYLES -->


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

        @include('Admin.layouts.app-header1')

        <!-- APP-SIDEBAR -->
        @include('Admin.layouts.sidebar-form')



        <!-- APP-SIDEBAR END-->

        <!-- APP-CONTENT -->
        <div class="app-content main-content">

            <div class="side-app main-container">


                @yield('message')
                @yield('formulaire2')


            </div>
            <!-- APP-CONTENT END -->
        </div>
        <!-- PAGE-MAIN END -->
    </div>
    <!-- CHANGE PASSWORD MODAL -->

    @include('Admin.layouts.modal')
    @include('Admin.layouts.qualif')

    <!-- CHANGE PASSWORD MODAL END-->

    <!-- RIGHT-SIDEBAR -->

    @include('Admin.layouts.right-sidebar')

    <!-- RIGHT-SIDEBAR END-->

    <!-- FOOTER -->

    <!-- @include('Admin.layouts.footer')-->

    <!-- FOOTER END-->

</div>
<!-- PAGE END -->

<!-- SCRIPTS -->

@include('Admin.layouts.scripts')

<script src="{{asset('assets/js/custom1.js')}}"></script>

<!-- SWITCHER JS -->
<script src="{{asset('assets/switcher/js/switcher.js')}}"></script>
<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    });
    /* js pour menu*/
    let dropdowns = document.querySelectorAll('.dropdown-toggle')
    dropdowns.forEach((dd) => {
        dd.addEventListener('click', function (e) {
            var el = this.nextElementSibling
            el.style.display = el.style.display === 'block' ? 'none' : 'block'
        })
    })
</script>

</body>

</html>




