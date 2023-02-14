@extends('Admin.layouts.hr-base')
@section('admin')
    <!-- PAGE HEADER -->

    <!-- END PAGE HEADER -->

    <!-- ROW -->

    <!-- END ROW -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Script List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">Script ID</th>
                                <th class="border-bottom-0">Nom de script</th>
                                <th class="border-bottom-0 w-10"> Actif</th>
                                <th class="border-bottom-0 w-10"> Groupe D'administration</th>
                                <th class="border-bottom-0 w-10"> Couleur</th>
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
                                <td>Designing Department</td>
                                <td>Web Designer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
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
                                <td>Development Department</td>
                                <td>Angular Developer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
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
                                <td>Marketing Department</td>
                                <td>Marketing analyst</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
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
                                <td>IT Department</td>
                                <td>Testor</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>05</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/3.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Victoria Lyman</h6>
                                            <p class="text-muted mb-0 fs-12">victoria@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#1025</td>
                                <td>Managers Department</td>
                                <td>General Manager</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>06</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/11.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Adam Quinn</h6>
                                            <p class="text-muted mb-0 fs-12">adam@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#3262</td>
                                <td>Accounts Department</td>
                                <td>Accountant</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>07</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/4.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Melanie Coleman</h6>
                                            <p class="text-muted mb-0 fs-12">melanie@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#3489</td>
                                <td>Application Department</td>
                                <td>App Designer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>08</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/12.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Max Wilson</h6>
                                            <p class="text-muted mb-0 fs-12">max@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#3698</td>
                                <td>Development Department</td>
                                <td>PHP Developer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>09</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/5.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Amelia Russell</h6>
                                            <p class="text-muted mb-0 fs-12">amelia@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#5612</td>
                                <td>Designing Department</td>
                                <td>UX Designer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/13.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Justin Metcalfe</h6>
                                            <p class="text-muted mb-0 fs-12">justin@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#0245</td>
                                <td>Designing Department</td>
                                <td>Web Designer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/6.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Sophie Anderson</h6>
                                            <p class="text-muted mb-0 fs-12">faith@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#3467</td>
                                <td>Development Department</td>
                                <td>Java Developer</td>


                                <td>
                                    <a class="btn btn-primary btn-icon btn-sm" href="hr-empview">
                                        <i class="feather feather-edit" data-bs-toggle="tooltip"
                                           data-original-title="View/Edit"></i>
                                    </a>
                                    <a class="btn btn-danger btn-icon btn-sm" data-bs-toggle="tooltip"
                                       data-original-title="Delete"><i class="feather feather-trash-2"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- END ROW -->
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
