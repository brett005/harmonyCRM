@extends('Admin.layouts.hr-base')
@section('admin')
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Mélange des listes</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-compagne" class="btn btn-primary me-3">Add New liste</a>
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
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Mélange des liste</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">Compagne</th>
                                <th class="border-bottom-0">Nom</th>
                                <th class="border-bottom-0 w-10"> Mélange de liste</th>
                                <th class="border-bottom-0"> Modifier</th>


                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>01</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/1.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Faith Harris</h6>
                                            <p class="text-muted mb-0 fs-12">faith@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#2987</td>
                                <td><a href="javascript:void(0);" class="btn btn-green">Modifier</a></td>


                            </tr>
                            <tr>
                                <td>02</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/9.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Austin Bell</h6>
                                            <p class="text-muted mb-0 fs-12">austin@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#4987</td>
                                <td><a href="javascript:void(0);" class="btn btn-green">Modifier</a></td>


                            </tr>
                            <tr>
                                <td>03</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/2.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Maria Bower</h6>
                                            <p class="text-muted mb-0 fs-12">maria@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#6729</td>
                                <td><a href="javascript:void(0);" class="btn btn-green">Modifier</a></td>


                            </tr>
                            <tr>
                                <td>04</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/10.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Peter Hill</h6>
                                            <p class="text-muted mb-0 fs-12">peter@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#2098</td>
                                <td><a href="javascript:void(0);" class="btn btn-green">Modifier</a></td>


                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
    </div>

@endsection
@section('script')
    <!-- INTERNAL PEITYCHART JS -->
    <script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
    <script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

    <!-- INTERNAL DATEPICKER JS -->
    <script src="{{asset('assets/plugins/modal-datepicker/datepicker.js')}}"></script>

    <!-- INTERNAL CHART JS -->
    <script src="{{asset('assets/plugins/chart/chart.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

    <!-- INTERNAL CHARTJS ROUNDED-BARCHART -->
    <script src="{{asset('assets/plugins/chart.min/chart.min.js')}}"></script>
    <script src="{{asset('assets/plugins/chart.min/rounded-barchart.js')}}"></script>

    <!-- INTERNAL DATA TABLES  -->
    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="{{asset('assets/js/index7.js')}}"></script>

    <!-- THEME COLOR JS -->
    <script src="{{asset('assets/js/themeColors.js')}}"></script>

    <link rel="icon" href="{{asset('asset/images/brand/favicon.ico')}}" type="image/x-icon"/>
@endsection
