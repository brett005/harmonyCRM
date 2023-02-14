@extends('Admin.layouts.hr-base')
@section('ajouter_lead')
    <!--PAGE HEADER -->

    <div class="side-app main-container">
        <!--PAGE HEADER -->
        <div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">Ajouter lead</div>
                <h5>Activer l'affichage des journaux archivés</h5>
            </div>
            <div class="page-rightheader ms-md-auto">
                <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                    <div class="btn-list">
                        <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"><i
                                class="feather feather-mail"></i></button>
                        <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact">
                            <i class="feather feather-phone-call"></i></button>
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
                <div class="card box-widget widget-user">
                    <div class="card-body text-center">


                    </div>


                    <div class="col-xl-6 col-md-6 col-lg-6">
                        <div class="tab-menu-heading hremp-tabs p-0 ">


                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab5">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">
                                                    ID de prospect : NOUVEL ID de liste </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option label="Select"></option>
                                                    <option value="1">test liste</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">Titre </label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control mb-md-0 mb-5"
                                                               placeholder="Titre">
                                                        <span class="text-muted"></span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">premiére</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="premiére">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">Titre </label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control mb-md-0 mb-5"
                                                               placeholder="titre">
                                                        <span class="text-muted"></span>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">dernier</label>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" placeholder="dernier">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">Adresse 1</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Adresse">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">Adresse 2</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" placeholder="Adresse">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label class="form-label mb-0 mt-2">Adresse 3</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"
                                                                   placeholder="Adresse">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <label class="form-label mb-0 mt-2">Ville</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" placeholder="ville">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="col-md-2">
                                                            <label class="form-label mb-0 mt-2">Etat</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control mb-md-0 mb-5"
                                                                           placeholder="etat">
                                                                    <span class="text-muted"></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label class="form-label mb-0 mt-2">Code
                                                                        postal</label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="code">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <label class="form-label mb-0 mt-2">Province</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="row">

                                                            <div class="col-md-2">
                                                                <label class="form-label mb-0 mt-2">Pays</label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <input type="text"
                                                                               class="form-control mb-md-0 mb-5"
                                                                               placeholder="pays">
                                                                        <span class="text-muted"></span>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <label class="form-label mb-0 mt-2">Date de
                                                                            naissance</label>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="Date">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <label
                                                                        class="form-label mb-0 mt-2">Téléphoner</label>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control"
                                                                           placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label class="form-label mb-0 mt-2">Composer le
                                                                            code </label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <input type="text" class="form-control"
                                                                               placeholder="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <label class="form-label mb-0 mt-2">Alt.Téléphone</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control"
                                                                                   placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <label class="form-label mb-0 mt-2">E-mail</label>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <input type="text" class="form-control"
                                                                                       placeholder="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-2">
                                                                                    <label class="form-label mb-0 mt-2">Spectacle</label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="form-group">
                                                                                <div class="row">
                                                                                    <div class="col-md-2">
                                                                                        <label
                                                                                            class="form-label mb-0 mt-2">Fournisseur
                                                                                            ID</label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="form-group">
                                                                                    <div class="row">
                                                                                        <div class="col-md-2">
                                                                                            <label
                                                                                                class="form-label mb-0 mt-2">Rang</label>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <input type="text"
                                                                                                   class="form-control"
                                                                                                   placeholder="">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <div class="col-md-2">
                                                                                                <label
                                                                                                    class="form-label mb-0 mt-2">Propriétaire</label>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <input type="text"
                                                                                                       class="form-control"
                                                                                                       placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="form-group">
                                                                                            <div class="row">
                                                                                                <div class="col-md-2">
                                                                                                    <label
                                                                                                        class="form-label mb-0 mt-2">Commentaire</label>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           placeholder="">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- END ROW -->
                                                                    </div>
                                                                </div>
                                                                <!-- APP-CONTENT END -->
                                                            </div>
                                                            <!-- PAGE-MAIN END -->

                                                            <!-- CHANGE PASSWORD MODAL -->


                                                            @endsection

                                                            <!-- CUSTOM1 JS -->
                                                            @section('script')
                                                                <!-- STAR RATING JS -->
                                                                <a href="#top" id="back-to-top"><i
                                                                        class="feather feather-chevrons-up"></i></a>

                                                                <!-- JQUERY JS -->
                                                                <script
                                                                    src="../../assets/plugins/jquery/jquery.min.js"></script>

                                                                <!-- BOOTSTRAP JS -->
                                                                <script
                                                                    src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
                                                                <script
                                                                    src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

                                                                <!-- MOMENT JS -->
                                                                <script
                                                                    src="../../assets/plugins/moment/moment.js"></script>

                                                                <!-- CIRCLE-PROGRESS JS -->
                                                                <script
                                                                    src="../../assets/plugins/circle-progress/circle-progress.min.js"></script>

                                                                <!-- SIDE-MENU JS -->
                                                                <script
                                                                    src="../../assets/plugins/sidemenu/sidemenu.js"></script>

                                                                <!-- PERFECT SCROLLBAR JS-->
                                                                <script
                                                                    src="../../assets/plugins/p-scrollbar/p-scrollbar.js"></script>
                                                                <script
                                                                    src="../../assets/plugins/p-scrollbar/p-scroll1.js"></script>

                                                                <!-- SIDERBAR JS -->
                                                                <script
                                                                    src="../../assets/plugins/sidebar/sidebar.js"></script>

                                                                <!-- SELECT2 JS -->
                                                                <script
                                                                    src=" ../../assets/plugins/select2/select2.full.min.js"></script>

                                                                <!-- STICKY JS -->
                                                                <script src="../../assets/js/sticky.js"></script>




                                                                <!-- CUSTOM1 JS -->
                                                                <script src="../../assets/js/custom1.js"></script>

                                                                <!-- SWITCHER JS -->
                                                                <script
                                                                    src="../../assets/switcher/js/switcher.js"></script>

                                                                <!-- SCRIPTS END-->
                                                                <!-- STAR RATING JS -->
                                                                <script
                                                                    src="../../assets/plugins/rating/jquery-rate-picker.js"></script>
                                                                <script
                                                                    src="../../assets/plugins/rating/rating-picker.js"></script>

                                                                <!-- INTERNAL  DATEPICKER JS -->
                                                                <script
                                                                    src="../../assets/plugins/date-picker/jquery-ui.js"></script>

                                                                <!-- INTERNAL INDEX JS -->
                                                                <script src="../../assets/js/hr/hr-empview.js"></script>

                                                                <!-- THEME COLOR JS -->
                                                                <script src="../../assets/js/themeColors.js"></script>
@endsection
