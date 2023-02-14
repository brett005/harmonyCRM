@extends('Admin.layouts.hr-base')
@section('admin')


    <div class="page-header d-xl-flex d-block">

        <div class="page-leftheader">

            <div class="page-title">Information<span class="font-weight-normal text-muted ms-2">Contact</span></div>

        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
                <div class="btn-list">
                    <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"><i
                                class="feather feather-mail"></i></button>
                    <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"><i
                                class="feather feather-phone-call"></i></button>
                    <button type="button" class="btn btn-danger btn-circle btn-xl">Raccrocher</button>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card box-widget widget-user">
                <div class="card-body text-center">

                    <h1>ttt</h1>

                </div>


                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="tab-menu-heading hremp-tabs p-0 ">


                    </div>
                </div>
                <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab5">
                            <div class="card-body">

                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Ancien Don</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">Ancien PA</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">
                                                Date Don</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">ID client</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">CIVILITE
                                            </label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_CIVILITE </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="projects" class="form-control custom-select select2"
                                                            data-placeholder="Select">
                                                        <option label="Select"></option>
                                                        <option value="1">M</option>
                                                        <option value="2">Mlle</option>
                                                        <option value="3">Mme</option>
                                                        <option value="4">M Mme</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">NOM </label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_NOM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">PRENOM</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_PRENOM</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">RAISON SOCIALE</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_RAISON SOCIALE</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">PROFESSIONNEL</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_PROFESSIONNEL</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">ADR2</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_ADR2</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">ADR3</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_ADR3</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">ADR4 LIBELLE VOIE</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_ADR4 LIBELLE VOIE</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">ADR5</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_ADR5</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">CONTACT CP</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_CONTACT CP</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">
                                                CONTACT VILLE</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_
                                                        CONTACT VILLE</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">
                                                CONTACT TEL</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_
                                                        CONTACT TEL</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">
                                                TEL1</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_
                                                        TEL1</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">
                                                CONTACT EMAIL</label>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control mb-md-0 mb-5" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label mb-0 mt-2">new_
                                                        CONTACT EMAIL</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Type Accord</label>
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="Select">
                                                    <option value="" selected="">-- choisir le type d'accord --</option>
                                                    <option value="Don avec montant">Don avec montant</option>
                                                    <option value="PA">PA</option>
                                                    <option value="Don en ligne">Don en ligne</option>
                                                    <option value="PA en ligne">PA en ligne</option>
                                                    <option value="Promesse Don en ligne">Promesse Don en ligne</option>
                                                    <option value="Promesse Pa en ligne">Promesse Pa en ligne</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Envoi
                                                    Courrier</label>
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="Select">
                                                    <option value="" selected="">-- choisir le type d'envoi --</option>
                                                    <option value="Avec Courrier">Avec courrier</option>
                                                    <option value="Sans courrier">Sans courrier</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Cas
                                                    Particulier</label>
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="Select">
                                                    <option value="" selected="">-- choisir le type d'envoi --</option>
                                                    <option value="Avec Courrier">Avec courrier</option>
                                                    <option value="Sans courrier">Sans courrier</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-success">Valider<i class="fa fa-check fa-spin ms-2"></i></button>

                            </div>
                            </br>
                            <div class="col-md-3">
                                <button class="btn btn-info">Envpyez un message <i
                                            class="fa fa-comment-o fa-spin ms-2"></i></button>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        @endsection
        @section('script')
            <!-- INTERNAL SELECT2 JS -->
            <script src="{{asset('assets/assets/js/select2.js"></script>

<!-- THEME COLOR JS -->
<script src="{{asset('assets/assets/js/themeColors.js"></script>

    @endsection
