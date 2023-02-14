@extends('Admin.layouts.hr-base')
@section('ajouter1')

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
            <div class="page-title">Add Employee</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
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
    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Employees List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">User.ID.#.</th>
                                <th class="border-bottom-0">Nom et prénom</th>
                                <th class="border-bottom-0 w-10">Niveau</th>
                                <th class="border-bottom-0">Groupe</th>
                                <th class="border-bottom-0">Activité</th>
                                <th class="border-bottom-0">Modifier</th>
                                <th class="border-bottom-0">Statistiques/th>
                                <th class="border-bottom-0">statut</th>
                                <th class="border-bottom-0">Temps</th>

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
                                <td>+9685321475</td>
                                <td>05-05-2017</td>
                                <td>3 yrs 1 mons 13 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+8653217950</td>
                                <td>02-01-2018</td>
                                <td>3 yrs 0 mons 25 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+9563258417</td>
                                <td>02-08-2019</td>
                                <td>2 yrs 3 mons 23 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+8563249751</td>
                                <td>01-01-2020</td>
                                <td>1 yrs 0 mons 25 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+9635826432</td>
                                <td>05-05-2021</td>
                                <td>0 yrs 0 mons 20 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+9685231572</td>
                                <td>05-05-2020</td>
                                <td>0 yrs 8 mons 20 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+8635291470</td>
                                <td>15-02-2019</td>
                                <td>1 yrs 11 mons 10 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+9986357240</td>
                                <td>05-05-2020</td>
                                <td>0 yrs 9 mons 20 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+9356982472</td>
                                <td>01-05-2018</td>
                                <td>2 yrs 9 mons 25 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+9685321475</td>
                                <td>05-05-2017</td>
                                <td>3 yrs 1 mons 13 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>+8674231566</td>
                                <td>025-08-2020</td>
                                <td>0 yrs 4 mons 0 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>12</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/14.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Ryan Young</h6>
                                            <p class="text-muted mb-0 fs-12">ryan@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#2987</td>
                                <td>Designing Department</td>
                                <td>Ui Designer</td>
                                <td>+9685321475</td>
                                <td>05-05-2017</td>
                                <td>3 yrs 1 mons 13 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>13</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/7.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Jennifer Hardacre</h6>
                                            <p class="text-muted mb-0 fs-12">jennifer@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#9365</td>
                                <td>Technical Department</td>
                                <td>Supporter</td>
                                <td>+9685321475</td>
                                <td>03-09-2019</td>
                                <td>1 yrs 2 mons 25 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>14</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/15.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Justin Parr</h6>
                                            <p class="text-muted mb-0 fs-12">justin@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#3109</td>
                                <td>Application Department</td>
                                <td>App Developer</td>
                                <td>+9685321475</td>
                                <td>12-12-2020</td>
                                <td>0 yrs 01 mons 13 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>15</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/8.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Julia Hodges</h6>
                                            <p class="text-muted mb-0 fs-12">julia@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#2987</td>
                                <td>Development Department</td>
                                <td>Java Developer</td>
                                <td>+8659357241</td>
                                <td>04-04-2020</td>
                                <td>0 yrs 9 mons 21 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
                                <td>16</td>
                                <td>
                                    <div class="d-flex">
                                        <span class="avatar avatar-md brround me-3"
                                              style="background-image: url(../../assets/images/users/16.jpg)"></span>
                                        <div class="me-3 mt-0 mt-sm-1 d-block">
                                            <h6 class="mb-1 fs-14">Michael Sutherland</h6>
                                            <p class="text-muted mb-0 fs-12">michael@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>#2987</td>
                                <td>Accounts Department</td>
                                <td>Accountant</td>
                                <td>+8866449975</td>
                                <td>15-10-2018</td>
                                <td>2 yrs 2 mons 10 days</td>
                                <td><span class="badge badge-success">Active</span></td>
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
    <script src="{{asset('assets/switcher/js/switcher.js')}}"></script>

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
