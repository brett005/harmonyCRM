@extends('Admin.layouts.hr-base')
@section('admin')

    <link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>

    <!-- BOOTSTRAP CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet" id="style"/>

    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet"/>

    <!--- ANIMATE CSS -->
    <link href="{{asset('assets/css/animated.css')}}" rel="stylesheet"/>

    <!--- ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>
    <!-- INTERNAL SWITCHER CSS -->
    <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet">
    <link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet">


    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Compagne</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-compagne" class="btn btn-primary me-3">Ajouter une compagne</a>
                    <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"><i
                                class="feather feather-mail"></i></button>
                    <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"><i
                                class="feather feather-phone-call"></i></button>
                    <button class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"><i
                                class="feather feather-info"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->


    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Compagne List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">Compagne</th>
                                <th class="border-bottom-0">Nom</th>
                                <th class="border-bottom-0 w-10"> Actif</th>
                                <th class="border-bottom-0 w-10"> Groupe</th>
                                <th class="border-bottom-0 w-10"> Méthode de </br>cadran</th>
                                <th class="border-bottom-0 w-10"> Statut de</br>numérotation</th>
                                <th class="border-bottom-0 w-10"> Statuts</th>
                                <th class="border-bottom-0 w-10"> Niveau</th>

                                <th class="border-bottom-0"> Modifier</th>


                            </tr>
                            </thead>

                            <tbody>
                            dd($response)
                            @isset($campaigns)
                                @foreach($campaigns as $campaign)
                                    <tr>
                                        <td>{{$campaign->campaign_id}}</td>
                                        <td>{{$campaign->campaign_name }}</td>
                                        <td>{{$campaign->active}}</td>
                                        <td>{{$campaign->local_call_time}}</td>


                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">Aucune compagne existe</td>
                                </tr>
                            @endisset


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- PAGE-MAIN END -->

@endsection
@section('script')
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- MOMENT JS -->
    <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

    <!-- CIRCLE-PROGRESS JS -->
    <script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

    <!-- PERFECT SCROLLBAR JS-->
    <script src="{{asset('assets/plugins/p-scrollbar/p-scrollbar.js')}}"></script>
    <script src="{{asset('assets/plugins/p-scrollbar/p-scroll1.js')}}"></script>

    <!-- SIDERBAR JS -->
    <script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

    <!-- SELECT2 JS -->
    <script src=" {{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

    <!-- STICKY JS -->
    <script src="{{asset('assets/js/sticky.js')}}"></script>
    <!-- CUSTOM1 JS -->
    <script src="{{asset('assets/js/custom1.js')}}"></script>

    <!-- SWITCHER JS -->
    <script src="../../assets/switcher/js/switcher.js')}}"></script>


    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{asset('assets/js/hr/hr-emp.js')}}"></script>

    <!-- THEME COLOR JS -->
    <script src="{{asset('assets/js/themeColors.js')}}"></script>

@endsection
