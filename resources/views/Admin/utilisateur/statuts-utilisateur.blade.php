@extends('Admin.layouts.hr-base')
@section('statut_utilisateur')

    <div class="side-app main-container">
        <!-- PAGE HEADER -->
        <div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">STATUTS<span class="font-weight-normal text-muted ms-2">Compagne</span></div>
            </div>

        </div>
        <!-- END PAGE HEADER -->

        <!-- ROW -->

        <!-- END ROW -->

        <!-- ROW -->
        <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header  border-0">
                        <h4 class="card-title">statuts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                <thead>
                                <tr>
                                    <th class="border-bottom-0 w-5">Compagne</th>
                                    <th class="border-bottom-0">Nom</th>
                                    <th class="border-bottom-0 w-10"> Statuts</th>
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
    <a href="#top" id="back-to-top"><i class="feather feather-chevrons-up"></i></a>

    <!-- JQUERY JS -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- MOMENT JS -->
    <script src="../../assets/plugins/moment/moment.js"></script>

    <!-- CIRCLE-PROGRESS JS -->
    <script src="../../assets/plugins/circle-progress/circle-progress.min.js"></script>

    <!-- SIDE-MENU JS -->
    <script src="../../assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- PERFECT SCROLLBAR JS-->
    <script src="../../assets/plugins/p-scrollbar/p-scrollbar.js"></script>
    <script src="../../assets/plugins/p-scrollbar/p-scroll1.js"></script>

    <!-- SIDERBAR JS -->
    <script src="../../assets/plugins/sidebar/sidebar.js"></script>

    <!-- SELECT2 JS -->
    <script src=" ../../assets/plugins/select2/select2.full.min.js"></script>

    <!-- STICKY JS -->
    <script src="../../assets/js/sticky.js"></script>




    <!-- CUSTOM1 JS -->
    <script src="../../assets/js/custom1.js"></script>

    <!-- SWITCHER JS -->
    <script src="../../assets/switcher/js/switcher.js"></script>

    <!-- SCRIPTS END-->
    <!-- STAR RATING JS -->
    <script src="../../assets/plugins/rating/jquery-rate-picker.js"></script>
    <script src="../../assets/plugins/rating/rating-picker.js"></script>

    <!-- INTERNAL  DATEPICKER JS -->
    <script src="../../assets/plugins/date-picker/jquery-ui.js"></script>

    <!-- INTERNAL INDEX JS -->
    <script src="../../assets/js/hr/hr-empview.js"></script>

    <!-- THEME COLOR JS -->
    <script src="../../assets/js/themeColors.js"></script>
@endsection
