@extends('Admin.layouts.hr-base')
@section('champ')

    <div class="side-app main-container">
        <!--PAGE HEADER -->
        <div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">Copier les champs</div>
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
                                                <label class="form-label mb-0 mt-2">ID de liste à partir duquel copier
                                                    les champs </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="Oui">

                                                    <option value="998"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">998 - Liste
                                                                manuelle par défaut</font></font></option>
                                                    <option value="999"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">999 - Liste
                                                                entrante par défaut</font></font></option>
                                                    <option value="4002"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">4002 - Test Robo
                                                                IVR</font></font></option>
                                                    <option value="12493"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">12493 -
                                                                essai</font></font></option>
                                                    <option value="1111111"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">1111111 -
                                                                listeComunik</font></font></option>
                                                    <option value="5082022"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5082022 - HUM CPF
                                                                05-08-2022</font></font></option>
                                                    <option value="7500001"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500001 - 75
                                                                A001.csv</font></font></option>
                                                    <option value="11111002"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">11111002 - test de
                                                                création champs</font></font></option>
                                                    <option value="25656464"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">25656464 - test
                                                                ttmp</font></font></option>
                                                    <option value="123456789"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">123456789 -
                                                                28-07-2022</font></font></option>
                                                    <option value="922000607"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">922000607 - Neuilly
                                                                sur seine 92200</font></font></option>
                                                    <option value="987654321"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">987654321 -
                                                                29-07-2022 Portable</font></font></option>
                                                    <option value="1111122222"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">1111122222 -
                                                                listcomunik001</font></font></option>
                                                    <option value="9412082022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9412082022 -
                                                                Fidelis 25-07-12-08</font></font></option>
                                                    <option value="9512082022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9512082022 -
                                                                Fidelis 01-08-12-08</font></font></option>
                                                    <option value="9612082022">9612082022 - Fidelis 04-08-12-08</option>
                                                    <option value="9712082022">9712082022 - Fidelis 08-08-12-08</option>
                                                    <option value="9812082022">9812082022 - Fidelis 10-08-12-08</option>
                                                    <option value="9912082022">9912082022 - Fidelis 28-07-12-08</option>
                                                    <option value="10106092022">10106092022 - 10106092022</option>
                                                    <option value="10206092022">10206092022 - 10206092022</option>
                                                    <option value="10306092022">10306092022 - 10306092022</option>
                                                    <option value="10406092022">10406092022 - 10406092022</option>
                                                    <option value="10506092022">10506092022 - 10506092022</option>
                                                    <option value="10606092022">10606092022 - 10606092022</option>
                                                    <option value="10706092022">10706092022 - 10706092022</option>
                                                    <option value="10806092022">10806092022 - 10806092022</option>
                                                    <option value="10906092022">10906092022 - 10906092022</option>
                                                    <option value="11006092022">11006092022 - 11006092022</option>
                                                    <option value="11106092022">11106092022 - 11106092022</option>
                                                    <option value="11206092022">11206092022 - 11206092022</option>
                                                    <option value="11306092022">11306092022 - 11306092022</option>
                                                    <option value="1300512102022">1300512102022 - 1300512102022</option>
                                                    <option value="2600107072022">2600107072022 - 26001 07-07-2022
                                                    </option>
                                                    <option value="2600207072022">2600207072022 - 26002 07-07-2022
                                                    </option>
                                                    <option value="2700120072022">2700120072022 - 27001 20-07-2022
                                                    </option>
                                                    <option value="2700220072022">2700220072022 - 27002 20-07-2022
                                                    </option>
                                                    <option value="3600112072022">3600112072022 - 36001 12-07-2022
                                                    </option>
                                                    <option value="3600212072022">3600212072022 - 36002 12-07-2022
                                                    </option>
                                                    <option value="4200107072022">4200107072022 - 42001 07-07-2022
                                                    </option>
                                                    <option value="4200207072022">4200207072022 - 42002 07-07-2022
                                                    </option>
                                                    <option value="5100112072022">5100112072022 - 51001 12-07-2022
                                                    </option>
                                                    <option value="5100112102022">5100112102022 - 5100112102022</option>
                                                    <option value="5100412072022">5100412072022 - 51004 12-07-2022
                                                    </option>
                                                    <option value="5300119072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5300119072022 -
                                                                53001 19-07-2022</font></font></option>
                                                    <option value="5300219072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5300219072022 -
                                                                53002 19-07-2022</font></font></option>
                                                    <option value="6300106072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">6300106072022 -
                                                                63001 06-07-2022</font></font></option>
                                                    <option value="6300206072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">6300206072022 -
                                                                63002 06-07-2022</font></font></option>
                                                    <option value="7500013052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500013052022 -
                                                                75000 Bloctel</font></font></option>
                                                    <option value="7500413052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500413052022 -
                                                                75004 13-05-22</font></font></option>
                                                    <option value="7500825042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500825042022 -
                                                                75008 25-04-22</font></font></option>
                                                    <option value="7500903112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500903112022 -
                                                                7500903112022</font></font></option>
                                                    <option value="7500925042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500925042022 -
                                                                75009 25-04-22</font></font></option>
                                                    <option value="7501003112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7501003112022 -
                                                                7501003112022</font></font></option>
                                                    <option value="7501103112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7501103112022 -
                                                                7501103112022</font></font></option>
                                                    <option value="7800607112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7800607112022 -
                                                                7800607112022</font></font></option>
                                                    <option value="8800106052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">8800106052022 -
                                                                88001 06-05-22</font></font></option>
                                                    <option value="9200625042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9200625042022 -
                                                                92006 25-04-22</font></font></option>
                                                    <option value="9300004112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300004112022 -
                                                                9300004112022</font></font></option>
                                                    <option value="9300304112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300304112022 -
                                                                9300304112022</font></font></option>
                                                    <option value="9300407112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300407112022 -
                                                                9300407112022</font></font></option>
                                                    <option value="9300507112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300507112022 -
                                                                9300507112022</font></font></option>
                                                    <option value="9300625042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300625042022 -
                                                                93006 25-04-22</font></font></option>
                                                    <option value="9500106052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9500106052022 -
                                                                95001 06-05-22</font></font></option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">ID de liste vers laquelle copier les
                                                    champs</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="Oui">

                                                    <option value="998"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">998 - Liste
                                                                manuelle par défaut</font></font></option>
                                                    <option value="999"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">999 - Liste
                                                                entrante par défaut</font></font></option>
                                                    <option value="4002"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">4002 - Test Robo
                                                                IVR</font></font></option>
                                                    <option value="12493"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">12493 -
                                                                essai</font></font></option>
                                                    <option value="1111111"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">1111111 -
                                                                listeComunik</font></font></option>
                                                    <option value="5082022"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5082022 - HUM CPF
                                                                05-08-2022</font></font></option>
                                                    <option value="7500001"><font style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500001 - 75
                                                                A001.csv</font></font></option>
                                                    <option value="11111002"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">11111002 - test de
                                                                création champs</font></font></option>
                                                    <option value="25656464"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">25656464 - test
                                                                ttmp</font></font></option>
                                                    <option value="123456789"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">123456789 -
                                                                28-07-2022</font></font></option>
                                                    <option value="922000607">922000607 - Neuilly sur seine 92200
                                                    </option>
                                                    <option value="987654321">987654321 - 29-07-2022 Mobile</option>
                                                    <option value="1111122222">1111122222 - listcomunik001</option>
                                                    <option value="9412082022">9412082022 - Fidelis 25-07-12-08</option>
                                                    <option value="9512082022">9512082022 - Fidelis 01-08-12-08</option>
                                                    <option value="9612082022">9612082022 - Fidelis 04-08-12-08</option>
                                                    <option value="9712082022">9712082022 - Fidelis 08-08-12-08</option>
                                                    <option value="9812082022">9812082022 - Fidelis 10-08-12-08</option>
                                                    <option value="9912082022">9912082022 - Fidelis 28-07-12-08</option>
                                                    <option value="10106092022">10106092022 - 10106092022</option>
                                                    <option value="10206092022">10206092022 - 10206092022</option>
                                                    <option value="10306092022">10306092022 - 10306092022</option>
                                                    <option value="10406092022">10406092022 - 10406092022</option>
                                                    <option value="10506092022">10506092022 - 10506092022</option>
                                                    <option value="10606092022">10606092022 - 10606092022</option>
                                                    <option value="10706092022">10706092022 - 10706092022</option>
                                                    <option value="10806092022">10806092022 - 10806092022</option>
                                                    <option value="10906092022">10906092022 - 10906092022</option>
                                                    <option value="11006092022">11006092022 - 11006092022</option>
                                                    <option value="11106092022">11106092022 - 11106092022</option>
                                                    <option value="11206092022">11206092022 - 11206092022</option>
                                                    <option value="11306092022">11306092022 - 11306092022</option>
                                                    <option value="1300512102022">1300512102022 - 1300512102022</option>
                                                    <option value="2600107072022">2600107072022 - 26001 07-07-2022
                                                    </option>
                                                    <option value="2600207072022">2600207072022 - 26002 07-07-2022
                                                    </option>
                                                    <option value="2700120072022">2700120072022 - 27001 20-07-2022
                                                    </option>
                                                    <option value="2700220072022">2700220072022 - 27002 20-07-2022
                                                    </option>
                                                    <option value="3600112072022">3600112072022 - 36001 12-07-2022
                                                    </option>
                                                    <option value="3600212072022">3600212072022 - 36002 12-07-2022
                                                    </option>
                                                    <option value="4200107072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">4200107072022 -
                                                                42001 07-07-2022</font></font></option>
                                                    <option value="4200207072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">4200207072022 -
                                                                42002 07-07-2022</font></font></option>
                                                    <option value="5100112072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5100112072022 -
                                                                51001 12-07-2022</font></font></option>
                                                    <option value="5100112102022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5100112102022 -
                                                                5100112102022</font></font></option>
                                                    <option value="5100412072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5100412072022 -
                                                                51004 12-07-2022</font></font></option>
                                                    <option value="5300119072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5300119072022 -
                                                                53001 19-07-2022</font></font></option>
                                                    <option value="5300219072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">5300219072022 -
                                                                53002 19-07-2022</font></font></option>
                                                    <option value="6300106072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">6300106072022 -
                                                                63001 06-07-2022</font></font></option>
                                                    <option value="6300206072022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">6300206072022 -
                                                                63002 06-07-2022</font></font></option>
                                                    <option value="7500013052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500013052022 -
                                                                75000 Bloctel</font></font></option>
                                                    <option value="7500413052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500413052022 -
                                                                75004 13-05-22</font></font></option>
                                                    <option value="7500825042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500825042022 -
                                                                75008 25-04-22</font></font></option>
                                                    <option value="7500903112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500903112022 -
                                                                7500903112022</font></font></option>
                                                    <option value="7500925042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7500925042022 -
                                                                75009 25-04-22</font></font></option>
                                                    <option value="7501003112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7501003112022 -
                                                                7501003112022</font></font></option>
                                                    <option value="7501103112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7501103112022 -
                                                                7501103112022</font></font></option>
                                                    <option value="7800607112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">7800607112022 -
                                                                7800607112022</font></font></option>
                                                    <option value="8800106052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">8800106052022 -
                                                                88001 06-05-22</font></font></option>
                                                    <option value="9200625042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9200625042022 -
                                                                92006 25-04-22</font></font></option>
                                                    <option value="9300004112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300004112022 -
                                                                9300004112022</font></font></option>
                                                    <option value="9300304112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300304112022 -
                                                                9300304112022</font></font></option>
                                                    <option value="9300407112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300407112022 -
                                                                9300407112022</font></font></option>
                                                    <option value="9300507112022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300507112022 -
                                                                9300507112022</font></font></option>
                                                    <option value="9300625042022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9300625042022 -
                                                                93006 25-04-22</font></font></option>
                                                    <option value="9500106052022"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">9500106052022 -
                                                                95001 06-05-22</font></font></option>


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Options de copie </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="projects" class="form-control custom-select select2"
                                                        data-placeholder="-not selected-">

                                                    <option value="1">AJOUTER</option>
                                                    <option value="2">METTRE A JOUR</option>
                                                    <option value="2">REMPLACER</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-9">

                                        </div>
                                        <div class="col-md-3">
                                            </BR>
                                            <a href="javascript:void(0);" class="btn btn-primary">Envoyer</a>
                                            <div class="form-group ">
                                            </div>
                                        </div>
                                    </div>
                                    <div>


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
