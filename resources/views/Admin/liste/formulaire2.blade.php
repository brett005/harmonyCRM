@extends('Admin.layouts.base-agent')
@section('formulaire2')
    <!--qualification  des fiches-->

    </br>
    <div class="col-xl-12 col-md-12 col-lg-12">

        <form id="Update_dispo">
            @csrf
            <input type="hidden" name="uniqueid" id="uniqueid">
            <input type="hidden" name="list_id" id="list_id">
            <input type="hidden" name="called_count" id="called_count">
            <input type="hidden" name="lead_id" id="lead_id1">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card box-widget widget-user">
                    <div class="card-body text-center">

                        <div class="card-header  border-0">

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">

                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #48DF71" class="btn btn-sm mb-1">not interested </a>


                                    </div>
                                </div>

                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">

                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #2EB87E" class="btn btn-sm mb-1">Sale</a>


                                    </div>
                                </div>

                            </div>


                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">

                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #14AD3E" class="btn btn-sm mb-1">Ne pas rappeler</a>


                                    </div>
                                </div>

                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">

                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #015718" class="btn  btn-sm mb-1">Small button</a>


                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-header  border-0">

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">


                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #35C6F4" class="btn  btn-sm mb-1">Small button</a>


                                    </div>
                                </div>

                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">


                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #0664D1" class="btn  btn-sm mb-1">Small button</a>


                                    </div>
                                </div>


                            </div>


                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">

                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #1921DB" class="btn  btn-sm mb-1">Small button</a>


                                    </div>
                                </div>

                            </div>

                            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">

                                <div class="row">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">

                                        <a style="background: #161C96" class="btn  btn-sm mb-1">Small button</a>


                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div>


                    </div>
        </form>

    </div>

    <div class="page-header d-xl-flex d-block bloc_incall" id="production_tabs" style="display:none;">

        <div class="page-leftheader">
            <div class="page-leftheader">
                <div class="page-title">Information<span
                            class="font-weight-normal text-muted ms-2">sur le contact</span>
                </div>
            </div>
        </div>


        <div class="text-center py-4 bg-light border">
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <a class="btn btn-pill btn-secondary" id="class" onclick="hangupQualif()">
                        </i></a>

                </div>
            </div>

        </div>

    </div>


    <div class="page-header d-xl-flex d-block">
        <div id="content_ecran_conf" style="padding: 10px;">

            <div class="row"><!-- button pour raccrocher et qualifier a la foi -->
                <div class="col-md-6">
                    <button class="btn btn-danger" id="class" onclick="hangupQualif()">Raccrocher et Qualifier</button>
                </div>
            </div>
            <!-- button pour raccrocher l'appel et rendre l'agent en état DISPO -->
            <div class="row">
                <div class="col-md-3">
                    <button class="btn btn-danger" id="racc" onclick="hangup()">Raccrocher</button>
                </div>

            </div>
        </div>


    </div>
    </div>




    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card box-widget widget-user">
                <div class="card-body text-center">
                    <div class="card-header  border-0">
                        <div id="timeINCALL1"></div>

                    </div>
                    <div>
                        <button type="button" class="btn btn-danger btn-circle btn-xl "><i class="si si-call-end"
                                                                                           data-bs-toggle="tooltip"
                                                                                           title=""
                                                                                           data-bs-original-title="si-call-end"
                                                                                           aria-label="si-call-end"></i>
                        </button>
                        <div class="row" id="ReClass" style="">
                            <div class="col-md-4">
                                <button class="btn btn-info" onclick="requalifier()"><i class="fa fa-check"></i>
                                    Requalifier la fiche
                                </button>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-warning" onclick="retour()"><i class="fa fa-arrow-left"></i>
                                    Retour
                                </button>
                            </div>
                            <div class="col-md-4" id="manDial">

                            </div>
                        </div>


                    </div>

                </div>

                <div id="content_ecran_conf" style="padding: 10px;">
                    <input type="hidden" name="agent_status" id="agent_status" value="">
                    <input type="hidden" value="" id="etat_agent">
                    <input type="hidden" value="" id="agentchannel">
                    <input type="hidden" id="channel" value=''>
                    <input type="hidden" id="lead_id" value=''>
                    <input type="hidden" name="uniqueid" id="uniqueid1">
                    <div class="form-group" dir="ltr" data-prop="field_expert" data-numfield="2858">

                        <div class="col-xl-12 col-md-12 col-lg-12">
                            <div class="tab-menu-heading hremp-tabs p-0 ">


                            </div>
                        </div>
                        <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab5">
                                    <form id="RegisternewInfoContact" method="post">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group ">

                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">NOM</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mb-md-0 mb-5"
                                                                       placeholder="" id="first_name" name="first_name">
                                                                <span class="text-muted"></span>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="form-label mb-0 mt-2">Prenom </label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" id="last_name"
                                                                       name="last_name" placeholder="">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">
                                                            Adresse1</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mb-md-0 mb-5"
                                                                       placeholder="" id="adr1" name="adr1">
                                                                <span class="text-muted"></span>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="form-label mb-0 mt-2">Code postal</label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder=""
                                                                       id="postal_code" name="postal_code">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">Ville</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mb-md-0 mb-5"
                                                                       placeholder="" id="city" name="city">
                                                                <span class="text-muted"></span>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="form-label mb-0 mt-2">Alt.
                                                                    Téléphoner</label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder=""
                                                                       id="alt_phone" name="alt_phone">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">Num fixe</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control mb-md-0 mb-5"
                                                                       placeholder="" id="phone_number"
                                                                       name="phone_number">
                                                                <span class="text-muted"></span>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <label class="form-label mb-0 mt-2">E-mail</label>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="text" class="form-control" placeholder=""
                                                                       id="email" name="email">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">

                                                <div class="row">

                                                    <div class="col-md-2">
                                                        <label class="form-label mb-0 mt-2">Commentaire</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control mb-md-0 mb-5"
                                                                       placeholder="" id="commentaire"
                                                                       name="commentaire">
                                                                <span class="text-muted"></span>
                                                            </div>

                                                            <div class="col-md-2">

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END ROW -->
        </div>

@endsection
