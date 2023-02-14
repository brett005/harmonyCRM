@extends('Admin.layouts.hr-base')
@section('charger')

    <div class="side-app main-container">
        <!--PAGE HEADER -->
        <div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">Charger de nouveaux prospects</div>
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


                    <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="tab-menu-heading hremp-tabs p-0 ">


                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab5">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Charger les prospects à partir de ce
                                                    fichier : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Numéro">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">

                                        <div class="row">

                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Campaign Name</label>
                                            </div>
                                            <div class="col-md-6">

                                                <input type="text" class="form-control mb-md-0 mb-5" placeholder="Nom">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Remplacement de l'ID de liste
                                                    : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="Oui">
                                                    <option label="Oui"></option>
                                                    <option value="1">Oui</option>
                                                    <option value="2">Non</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Remplacement du code téléphonique
                                                    : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder=" - NONE - ">

                                                    <option value=""> - NONE -</option>
                                                    <option value="A">A - Answering Machine</option>
                                                    <option value="AA">AA - Answering Machine Auto</option>
                                                    <option value="AB">AB - Busy Auto</option>
                                                    <option value="ADC">ADC - Disconnected Number Auto</option>
                                                    <option value="ADCT">ADCT - Disconnected Number Temporary</option>
                                                    <option value="AFAX">AFAX - Fax Machine Auto</option>
                                                    <option value="AFTHRS">AFTHRS - Inbound After Hours Drop</option>
                                                    <option value="AL">AL - Answering Machine Msg Played</option>
                                                    <option value="AM">AM - Answering Machine SentToMesg</option>
                                                    <option value="B">B - Busy</option>
                                                    <option value="CALLBK">CALLBK - Call Back</option>
                                                    <option value="DAIR">DAIR - Dead Air</option>
                                                    <option value="DC">DC - Disconnected Number</option>
                                                    <option value="DEC">DEC - Declined Sale</option>
                                                    <option value="DNC">DNC - DO NOT CALL</option>
                                                    <option value="DNCC">DNCC - DO NOT CALL Hopper Camp Match</option>
                                                    <option value="DNCL">DNCL - DO NOT CALL Hopper Sys Match</option>
                                                    <option value="DROP">DROP - Agent Not Available</option>
                                                    <option value="ERI">ERI - Agent Error</option>
                                                    <option value="INCALL">INCALL - Lead Being Called</option>
                                                    <option value="IQNANQ">IQNANQ - InQueue No-Agent-No-Queue drop
                                                    </option>
                                                    <option value="IVRXFR">IVRXFR - Outbound drop to Call Menu</option>
                                                    <option value="LRERR">LRERR - Outbound Local Channel Res Err
                                                    </option>
                                                    <option value="LSMERG">LSMERG - Agent lead search old lead mrg
                                                    </option>
                                                    <option value="MAXCAL">MAXCAL - Inbound Max Calls Drop</option>
                                                    <option value="MLINAT">MLINAT - Multi-Lead auto-alt set inactv
                                                    </option>
                                                    <option value="N">N - No Answer</option>
                                                    <option value="NA">NA - No Answer AutoDial</option>
                                                    <option value="NANQUE">NANQUE - Inbound No Agent No Queue Drop
                                                    </option>
                                                    <option value="NEW">NEW - New Lead</option>
                                                    <option value="NI">NI - Not Interested</option>
                                                    <option value="NP">NP - No Pitch No Price</option>
                                                    <option value="PDROP">PDROP - Outbound Pre-Routing Drop</option>
                                                    <option value="PM">PM - Played Message</option>
                                                    <option value="PU">PU - Call Picked Up</option>
                                                    <option value="QCFAIL">QCFAIL - QC_FAIL_CALLBK</option>
                                                    <option value="QUEUE">QUEUE - Lead To Be Called</option>
                                                    <option value="QVMAIL">QVMAIL - Queue Abandon Voicemail Left
                                                    </option>
                                                    <option value="RQXFER">RQXFER - Re-Queue</option>
                                                    <option value="SALE">SALE - Sale Made</option>
                                                    <option value="SVYCLM">SVYCLM - Survey sent to Call Menu</option>
                                                    <option value="SVYEXT">SVYEXT - Survey sent to Extension</option>
                                                    <option value="SVYHU">SVYHU - Survey Hungup</option>
                                                    <option value="SVYREC">SVYREC - Survey sent to Record</option>
                                                    <option value="SVYVM">SVYVM - Survey sent to Voicemail</option>
                                                    <option value="TIMEOT">TIMEOT - Inbound Queue Timeout Drop</option>
                                                    <option value="XDROP">XDROP - Agent Not Available IN</option>
                                                    <option value="XFER">XFER - Call Transferred</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Mise en page personnalisée à
                                                    utiliser : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder=" - NONE - ">

                                                    <option value=""> 1</option>
                                                    <option value="A">5</option>
                                                    <option value="AA">10
                                                    <option>
                                                    <option value="AB">20</option>
                                                    <option value="ADC">50</option>
                                                    <option value="ADCT">100</option>
                                                    <option value="AFAX">200</option>
                                                    <option value="AFTHRS">700</option>
                                                    <option value="AL">1000</option>
                                                    <option value="AL">2000</option>
                                                    <option value="AL">3000</option>
                                                    <option value="AL">4000</option>
                                                    <option value="AL">5000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Format de fichier à utiliser
                                                    :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Compagne">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Vérification des doublons : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder=" - NONE - ">
                                                    <option value='MANUAL'>MANUAL</option>
                                                    <option value='RATIO'>RATIO</option>
                                                    <option value='ADAPT_HARD_LIMIT'>ADAPT_HARD_LIMIT</option>
                                                    <option value='ADAPT_TAPERED'>ADAPT_TAPERED</option>
                                                    <option value='ADAPT_AVERAGE'>ADAPT_AVERAGE</option>
                                                    <option value='INBOUND_MAN'>INBOUND_MAN</option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2"> Vérification des doublons d'état
                                                    :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder=" - NONE - ">
                                                    <option value='random'>random</option>
                                                    <option value='oldest_call_start'>oldest_call_start</option>
                                                    <option value='oldest_call_finish'>oldest_call_finish</option>
                                                    <option value='overall_user_level'>overall_user_level</option>
                                                    <option value='campaign_rank'>campaign_rank</option>
                                                    <option value='campaign_grade_random'>campaign_grade_random</option>
                                                    <option value='fewest_calls'>fewest_calls</option>
                                                    <option value='longest_wait_time'>longest_wait_time</option>
                                                    <option value='overall_user_level_wait_time'>
                                                        overall_user_level_wait_time
                                                    </option>
                                                    <option value='campaign_rank_wait_time'>campaign_rank_wait_time
                                                    </option>
                                                    <option value='fewest_calls_wait_time'>fewest_calls_wait_time
                                                    </option>
                                                    <option value='random' SELECTED>random</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2"> Vérification États-Unis-Canada
                                                    :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder=" - NONE - ">
                                                    <option value='random'>random</option>
                                                    <option value='oldest_call_start'>oldest_call_start</option>
                                                    <option value='oldest_call_finish'>oldest_call_finish</option>
                                                    <option value='overall_user_level'>overall_user_level</option>
                                                    <option value='campaign_rank'>campaign_rank</option>
                                                    <option value='campaign_grade_random'>campaign_grade_random</option>
                                                    <option value='fewest_calls'>fewest_calls</option>
                                                    <option value='longest_wait_time'>longest_wait_time</option>
                                                    <option value='overall_user_level_wait_time'>
                                                        overall_user_level_wait_time
                                                    </option>
                                                    <option value='campaign_rank_wait_time'>campaign_rank_wait_time
                                                    </option>
                                                    <option value='fewest_calls_wait_time'>fewest_calls_wait_time
                                                    </option>
                                                    <option value='random' SELECTED>random</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"> Recherche de fuseau horaire
                                                principal</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="projects" class="form-control custom-select select2"
                                                    data-placeholder=" - NONE - ">
                                                <option value='random'>random</option>
                                                <option value='oldest_call_start'>oldest_call_start</option>
                                                <option value='oldest_call_finish'>oldest_call_finish</option>
                                                <option value='overall_user_level'>overall_user_level</option>
                                                <option value='campaign_rank'>campaign_rank</option>
                                                <option value='campaign_grade_random'>campaign_grade_random</option>
                                                <option value='fewest_calls'>fewest_calls</option>
                                                <option value='longest_wait_time'>longest_wait_time</option>
                                                <option value='overall_user_level_wait_time'>
                                                    overall_user_level_wait_time
                                                </option>
                                                <option value='campaign_rank_wait_time'>campaign_rank_wait_time</option>
                                                <option value='fewest_calls_wait_time'>fewest_calls_wait_time</option>
                                                <option value='random' SELECTED>random</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"> Recherche de fuseau horaire
                                                principal</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="projects" class="form-control custom-select select2"
                                                    data-placeholder=" - NONE - ">
                                                <option value='random'>random</option>
                                                <option value='oldest_call_start'>oldest_call_start</option>
                                                <option value='oldest_call_finish'>oldest_call_finish</option>
                                                <option value='overall_user_level'>overall_user_level</option>
                                                <option value='campaign_rank'>campaign_rank</option>
                                                <option value='campaign_grade_random'>campaign_grade_random</option>
                                                <option value='fewest_calls'>fewest_calls</option>
                                                <option value='longest_wait_time'>longest_wait_time</option>
                                                <option value='overall_user_level_wait_time'>
                                                    overall_user_level_wait_time
                                                </option>
                                                <option value='campaign_rank_wait_time'>campaign_rank_wait_time</option>
                                                <option value='fewest_calls_wait_time'>fewest_calls_wait_time</option>
                                                <option value='random' SELECTED>random</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Charger les prospects à partir de ce
                                                    fichier : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Numéro">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ROW -->
    </div>

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
