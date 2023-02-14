@extends('Admin.layouts.hr-base')
@section('recherche')

    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Recherche<span class="font-weight-normal text-muted ms-2">un utilisateur</span>
            </div>
        </div>

    </div>


    <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
        <div class="tab-content">
            <div class="tab-pane active" id="tab5">
                <div class="card-body">

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label mb-0 mt-2"> numéro d'utilisateur</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-md-0 mb-5"
                                               placeholder="numéro d'utilisateur">
                                        <span class="text-muted"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label mb-0 mt-2">Nom et prénom</label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-md-0 mb-5"
                                               placeholder="numéro d'utilisateur">
                                        <span class="text-muted"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label mb-0 mt-2">Niveau d'utilisateur</label>
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-6">
                                    <select name="cars" id="cars">
                                        <option value="volvo">1</option>
                                        <option value="saab">2</option>
                                        <option value="mercedes">3</option>
                                        <option value="audi">4</option>
                                        <option value="audi">5</option>
                                        <option value="audi">6</option>
                                        <option value="audi">7</option>
                                        <option value="audi">8</option>
                                        <option value="audi">9</option>
                                        <option value="audi">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label mb-0 mt-2">Utilisateur source </label>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control mb-md-0 mb-5"
                                               placeholder="numéro d'utilisateur">
                                        <span class="text-muted"></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-9">

                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-primary">Nous faire parvenir</button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <!-- END ROW -->

        @endsection


        @section('script')
            <!-- STAR RATING JS -->
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
