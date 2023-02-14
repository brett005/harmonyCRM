@extends('Admin.layouts.hr-base')
@section('admin')

    <!--PAGE HEADER -->

    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">

        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"> <i class="feather feather-home  sidemenu_icon"></i> Ajouter compagne</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold"><i class="feather feather-home  sidemenu_icon"></i> Information Compagne</h4>

                            <form action="{{ route('addCampaign') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Campaign ID</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="cpm_number" class="form-control" placeholder="Numéro">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Campaign Name</label>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="text" name="cpm_name" class="form-control mb-md-0 mb-5" placeholder="Nom">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Actif </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_actif" class="form-control custom-select select2">
                                                <option value="Y">Oui</option>
                                                <option value="N">Non</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Minimum Hopper Level </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_hoper_level" class="form-control custom-select select2" >
                                                <option value="1">1</option>
                                                <option value="5">5</option>
                                                <option value="10">10<option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="700">700</option>
                                                <option value="1000">1000</option>
                                                <option value="2000">2000</option>
                                                <option value="3000">3000</option>
                                                <option value="4000">4000</option>
                                                <option value="5000">5000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2"> Next Agent Call</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_next_agent_call" class="form-control custom-select select2">
                                                <option value='random'>random</option>
                                                <option value='oldest_call_start'>oldest_call_start</option>
                                                <option value='oldest_call_finish'>oldest_call_finish</option>
                                                <option value='overall_user_level'>overall_user_level</option>
                                                <option value='campaign_rank'>campaign_rank</option>
                                                <option value='campaign_grade_random'>campaign_grade_random</option>
                                                <option value='fewest_calls'>fewest_calls</option>
                                                <option value='longest_wait_time'>longest_wait_time</option>
                                                <option value='overall_user_level_wait_time'>overall_user_level_wait_time</option>
                                                <option value='campaign_rank_wait_time'>campaign_rank_wait_time</option>
                                                <option value='fewest_calls_wait_time'>fewest_calls_wait_time</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-footer text-end">
                                   <button type="submit" class="btn btn-outline-success" value="Ajouter Une Campagne">Ajouter Une Campagne <i class="fe fe-plus me-2"></i></button>
                                </div>
                            </form>
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

