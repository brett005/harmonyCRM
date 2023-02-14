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
    <div class="">

        <!-- APP-HEADER -->

        <!-- APP-HEADER END-->

        @include('Admin.layouts.app-header')

        <!-- APP-SIDEBAR -->


        @include('Admin.layouts.app-sidebar')

        <!-- APP-SIDEBAR END-->

        <!-- APP-CONTENT -->
        <div class="app-content main-content">
            <div class="side-app main-container">
                @yield('ajouter')
                @yield('modifier')
                @yield('c_panel')
                @yield('copier')
                @yield('recherche')
                @yield('statut_utilisateur')
                @yield('afficher_utilisateur')
                @yield('ajouter_liste')
                @yield('ajouter_lead')
                @yield('load_list')
                @yield('import_leads')
                @yield('recherche_prospect')
                @yield('ajouter_DNC')
         
                @yield('charger')
                @yield('ajouter_script')
                @yield('afficher_script')
                @yield('ajouter_filtre')
                @yield('afficher_filtre')
                @yield('ajouter_groupe')
                @yield('afficher_groupe')
                @yield('statistique_groupe')
                @yield('modifier_groupe')
                @yield('ajouter_agent_distant')
                @yield('liste_groupe')
                @yield('ajouter_messagerie')
                @yield('ajouter_discussion')
                @yield('ajouter_entrant')
                @yield('ajouter_did')
                @yield('ajouter_menu')
                @yield('ajouter_groupe_telephone')
                @yield('copier_entrant')
                @yield('copier_email')
                @yield('copier_chat')
                @yield('copier_menu')
                @yield('copier_SDA')
                @yield('afficher_menu')
                @yield('ajouter1')
                @yield('page')
                @yield('ajouter-telephone')
                @yield('modifier-telephone')
                @yield('admin')
            </div>


            <!-- APP-CONTENT END -->
        </div>
    </div>
    <!-- PAGE-MAIN END -->

    <!-- CHANGE PASSWORD MODAL -->

    <!-- CHANGE PASSWORD MODAL END-->

    <!-- RIGHT-SIDEBAR -->

    @include('Admin.layouts.right-sidebar')

    <!-- RIGHT-SIDEBAR END-->

    <!-- FOOTER -->

    @include('Admin.layouts.footer')

    <!-- FOOTER END-->
    @yield('css')
     @yield('css1')
     @yield('css3')
</div>
<!-- PAGE END -->

<!-- SCRIPTS -->
@include('Admin.layouts.scripts')

@yield('script')
<!-- CUSTOM1 JS -->
<!-- CUSTOM1 JS -->

<!-- BOOTSTRAP JS -->
<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/custom1.js')}}"></script>

<!-- SWITCHER JS -->
<script src="{{asset('assets/switcher/js/switcher.js')}}"></script>

<!-- SCRIPTS END-->


</body>

</html>



