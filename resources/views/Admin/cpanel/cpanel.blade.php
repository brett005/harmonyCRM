@extends('Admin.layouts.hr-base')
@section('c_panel')
@section('css')
<style>
    .font-weight-semibold {
    font-weight: 100 !important;
}
    .table td {
    padding: 0.1rem;
    vertical-align: middle;
    border-top: 0;
}
.table thead th, .text-wrap table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #e9ebfa;
    border-bottom-width: 1px;
    padding-top: 0.1rem;
    padding-bottom: 0.1rem;
}

    .btn-sm {
    font-size: 0.75rem;
    min-width: 1.625rem;

    padding: 0.1rem 0.1rem;

    border-radius: 0.2rem;
    margin-left:0.2em;
    margin-left:0.2em;


}
.table td {
    padding: 0.1rem;
    vertical-align: middle;
    border-top: 0;
}
.app-content .side-app {
    padding: 20px 0.5rem 1.5em 0.5rem;
}


span {
  font-size: 0.8rem;
}
.th{
    font-size: 0.1rem;
}
.page-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    margin: 0.5rem 0 0.5rem;
    -ms-flex-wrap: wrap;
    justify-content: space-between;
    padding: 0;
    border-radius: 7px;
    position: relative;
    min-height: 50px;
}
#card-body-dash{
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.5rem 0.5rem;
    position: relative;
}

.icon1 {
    height: 25px;
    width: 25px;
    line-height: 25px;
    border-radius: 7px;
    text-align: center;
    font-size: 23px;
    color: #fff;
}
.dark-mode .table-bordered, .dark-mode .text-wrap table, .dark-mode .table-bordered th, .dark-mode .text-wrap table th, .dark-mode .table-bordered td, .dark-mode.text-wrap table td {
    border: 2px solid #fff;;
}
.dark-mode .table-vcenter td, .dark-mode .table-vcenter th {
    color: #fff;
}

.dark-mode .table th, .dark-mode .text-wrap table th {
    color: #e9ebfa;
    border-top: 2px solid #fafbff;
}
.dark-mode .table-responsive .table> :not(:last-child)> :last-child>* {
    border-bottom-color: #ffffff !important;
}
.card-body1 {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.9rem 1.5rem;
    margin-top: -20px;
    margin-bottom: -23px;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    position: relative;
    margin-bottom: 0.3rem;
    width: 100%;
    border: 0;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(196, 205, 224, 0.2);
    border-radius: 13px;
}
.mb-2, .my-2 {
    margin-bottom: 0.2rem !important;
}
.mt-1, .my-1 {
    margin-top: 0.15rem !important;
}
.btn i {
    font-size: 0.85rem;
    line-height: 1.1;
}

.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 19px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

</style>
@endsection
    <!-- APP-CONTENT -->

            <!-- PAGE HEADER -->
        <div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">Dashboard Admin</div>
            </div>
            <div class="page-rightheader ms-md-auto">
                <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                    <div class="btn-list">
                        <button  class="btn  btn-outline-primary" onclick="location.href='admin'" ><i class="las la-building"></i>Version detaillé</button>
                        <button  class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"> <i class="feather feather-info"></i> </button>
                    </div>
                </div>
            </div>
        </div>
            <!-- END PAGE HEADER -->

      <!-- ROW -->

<div class="card-body" style="padding-top: 0.2rem;">
    <div class="panel-group1" id="accordion1">
        <div class="panel panel-default mb-4 overflow-hidden br-7">
            <div class="panel-heading1">
                <h4 class="panel-title1" >
                    <a class="accordion-toggle collapsed bg-gradient-light" data-bs-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" style="padding: 10px;">Statistiques</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1">
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold"> LOGGED </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="sum_agent_logged_in"class="mb-0 mt-1 text-success mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-success my-auto  float-end"> <i class="fa fa-user-o" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-drivers-license-o" aria-label="fa fa-drivers-license-o" ></i> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">INCALL</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="sum_call_incall" class="mb-0 mt-1 text-purple mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-purple  my-auto  float-end"> <i class="fa fa-volume-control-phone" aria-label="fa fa-volume-control-phone"></i> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"><span class="font-weight-semibold"> READY</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="sum_call_ready" class="mb-0 mt-1 text-teal mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-teal my-auto  float-end"> <i class="mdi mdi-account-check" data-bs-toggle="tooltip" title="" data-bs-original-title="mdi-account-check" aria-label="mdi-account-check"></i> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">Call waitting </span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="sum_call_ready" class="mb-0 mt-1 text-primary mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-bleu my-auto  float-end">  <div class="icon1 bg-primary my-auto  float-end"> <i class="mdi mdi-alarm" data-bs-toggle="tooltip" title="" data-bs-original-title="mdi-alarm" aria-label="mdi-alarm"></i> </div> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">PAUSE</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="sum_call_paused" class="mb-0 mt-1 text-secondary mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-secondary my-auto  float-end"> <i class="zmdi zmdi-assignment-account" data-bs-toggle="tooltip" title="" data-bs-original-title="zmdi zmdi-assignment-account" aria-label="zmdi zmdi-assignment-account"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1">
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">Calls waiting for agents</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="calls_waitting"class="mb-0 mt-1 text-pink mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-pink my-auto  float-end"> <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" ><path d="M0 0h24v24H0z" fill="none"></path><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-2 14l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"></path></svg> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">Calls in IVR</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="count_ivr" class="mb-0 mt-1 text-yellow mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-yellow my-auto  float-end"> <i class="fa fa-volume-control-phone" aria-label="fa fa-volume-control-phone"></i> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"><span class="font-weight-semibold">Calls Waiting for Agents</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="count_liveCallsWFAegnts" class="mb-0 mt-1 text-orange mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-orange my-auto  float-end"> <i class="mdi mdi-account-check" data-bs-toggle="tooltip" title="" data-bs-original-title="mdi-account-check" aria-label="mdi-account-check"></i> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body" id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">Call waitting for agent</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="calls_waitting" class="mb-0 mt-1 text-gray mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-gray my-auto  float-end"> <i class="mdi mdi-alarm" data-bs-toggle="tooltip" title="" data-bs-original-title="mdi-alarm" aria-label="mdi-alarm"></i> </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                            <div class="card">
                                <div class="card-body"id="card-body-dash">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mt-0 text-start"> <span class="font-weight-semibold">Agent</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="mt-0 text-start">
                                                        <h3 id="sum_call_paused" class="mb-0 mt-1 text-danger mb-2">0</h3>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="icon1 bg-danger my-auto  float-end"> <i class="zmdi zmdi-assignment-account" data-bs-toggle="tooltip" title="" data-bs-original-title="zmdi zmdi-assignment-account" aria-label="zmdi zmdi-assignment-account"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-1 col-xl-1 col-lg-1 col-md-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body" style="padding-top: 0.2rem;">
    <div class="panel-group1" id="accordion1">
        <div class="panel panel-default mb-4 overflow-hidden br-7">
            <div class="panel-heading1">
                <h4 class="panel-title1" >
                    <a class="accordion-toggle collapsed bg-gradient-light" data-bs-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" style="padding: 10px;">Liste des IVRs</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                <div class="panel-body">
                    <!-- INBOUND/OUTBOUND CALLS -->
                        <div id="inbount_outbound_calls" class="table-responsive">
                            <table id="table_inbount_outbound_calls" class="table  table-vcenter text-nowrap table-bordered border-bottom"  style="width:100%;" >
                                <thead>
                                <tr>
                                    <th>STATUS</th>
                                    <th>CAMPAGN</th>
                                    <th>PHONE</th>
                                    <th>SERVER IP</th>
                                    <th>DIAL TIME</th>
                                    <th>CALL TYPE</th>
                                    <th>PRIORITY</th>
                                </tr>
                                </thead>
                                <tbody id="tbody_inbount_outbound_calls">

                                </tbody>
                            </table>
                        </div>
                        <!-- END -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-body" style="padding-top: 0.2rem;">
    <div class="panel-group1" id="accordion1">
        <div class="panel panel-default mb-4 overflow-hidden br-7">
            <div class="panel-heading1">
                <h4 class="panel-title1" >
                    <a class="accordion-toggle collapsed bg-gradient-light" data-bs-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" style="padding: 10px;">Liste des usitilisateurs</a>
                </h4>
            </div>
            <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                <div class="panel-body">
                   <div class="card-body1">
                      <div class="row">
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                            <div class="card">
                                    <div class="row">
                                        <div class="col-12">
                                            <input id="select_phone" type="text" class="form-control mb-md-0 mb-5"  placeholder="Web Phone ">
                                        </div>
                                    </div>

                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                            <div class="card">

                                    <div class="row">
                                        <div class="col-12">
                                            <select class="form-control" id="monitor_options" name="monitor_options" required>
                                                <option  value=""> Select Type Please </option>
                                                <option value="MONITOR" >MONITOR</option>
                                                <option value="BARGE" >BARGE</option>
                                                <option value="HIJACK" >HIJACK</option>
                                            </select>
                                        </div>

                                    </div>

                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">

                           <div class="row">
                                    <div class="col-12">
                                        <a id="selected_server_record_webphone"class="btn btn-outline-success"><i class="fa fa-volume-control-phone" ></i>web phone</a>
                                    </div>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                                <div class="row">
                                    <div class="col-12">
                                        <a id="selected_server_record_webphone_hungup"class="btn btn-outline-warning"><i class="fa fa-volume-control-phone" >stop listen</i></a>
                                    </div>
                               </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2">
                                <div class="row">
                                    <div class="col-12">
                                        <a id="selected_server_record_webphone_stop" class="btn btn-outline-danger"><i class="fa fa-times" ></i>web phone</a>
                                    </div>

                                    <div class="col-md-2" >
                                        <label for="" id="set_phone" style="color: #0b2e13; accent-color: #0c0e0f; alignment: center; appearance: textfield; background-color: #6f42c1; block-ellipsis: revert; font-size: xx-large; font-family: "Roboto", "Helvetica Neue", "Helvetica", "Arial" "></label>
                                    </div>
                                    <div class="col-9" id="webphone_monitor" style="display: none" ></div>
                                </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div id="loader" style="margin: auto; margin-left: 100x; padding-inline: inherit; display: none;" >
                            <img src="{{ asset('images/loading.gif') }}" alt="">
                        </div>



                        <div id="all_content_s" class="table-responsive">
                            <table id="search_logged_in_agents" class="table  table-vcenter text-nowrap table-bordered border-bottom"  style="width:100%" >
                                <thead>
                                    <tr>
                                        <th>full_name</th>
                                        <th>User</th>
                                        <th>status</th>
                                        <th>Chrono</th>
                                        <th>Calls Today</th>
                                        <th style="display: none">session id</th>
                                        <th>Opérations</th>
                                    </tr>
                                </thead>
                                <tbody id="search_logged_in_agents_tbody">
                                @if( !empty($logged_in) || !is_null($logged_in) || $logged_in != "" )
                                    @foreach($logged_in as $record)
                                        <tr>
                                            <td> {{ $record->full_name }} </td>
                                            <td id="get_user_name">{{ $record->user }}</td>
                                            <td> {{ $record->status }} </td>
                                            <td style="display: none"> {{ $record->session }} </td>
                                            <td> {{ $record->chrono }} </td>
                                            <td> {{ $record->calls_today }} </td>

                                            <td id="get_buttons" style="position: center">
                                                    <a id="selected_server_record_monitoring" class="btn btn-sm btn-outline-primary"> <i class="fa fa-headphones"  title="listen"></i></a>
                                                    <a id="selected_server_record_webphone_hungup" class="btn btn-sm btn-outline-warning"> <i class="fa fa-headphones" title="stop listen" ></i><i class="fa fa-times" ></i></a></a>
                                                    <a id="selected_server_record_resume" class="btn btn-sm btn-outline-success"><i class="fa fa-fast-forward" title="Resume" ></i></a>
                                                    <a id="selected_server_record_pause" class="btn  btn-sm btn-outline-warning"><i class="fa fa-pause" title="Pause" ></i></a>
                                                    <a id="logout_api" class="btn btn-sm btn-outline-secondary"><i class="fa fa-user-times" title="lougout"></i></a>
                                                    <a id="selected_server_record_hungup" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" title="Hungup" ></i></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SIDE-MENU JS -->
    <script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>
    <!-- BOOTSTRAP JS -->
        <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
        <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

        <!-- MOMENT JS -->
        <script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

        <!-- CIRCLE-PROGRESS JS -->
        <script src="{{asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>



<script type="text/javascript">

        /** Disable stop listen and Stop webphone button on initialization **/
        $('#selected_server_record_webphone_hungup').prop('disabled', true);
        $('#selected_server_record_webphone_stop').prop('disabled', true);

        /** Initialize {active, disable} buttons **/
        var stop_webphonephone = true;
        var listen_button = true;

        /** Logout api action **/
        $(document).on('click', '#logout_api', function (e){

            e.preventDefault();
            //let selected_server = $('#logged_in_server').val();
            var row = $(this).closest('tr');
            var selected_user = row.find('td#get_user_name').text();
            $.ajax({
                type: 'GET',
                url: 'logout_api/'+selected_user,

                success: function (response){
                    Swal.fire(
                        'Good job!',
                        response,
                        'success'
                    )
                },

                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! '+error,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            })

        });

        /** Unregistred Webphone **/
        $(document).on('click', '#selected_server_record_webphone_stop', function (e){
            $('#webphone_monitor').empty();
            $('#set_phone').empty();
            $('button#selected_server_record_webphone').prop('disabled', false);
            $(this).prop('disabled', true);
            $('button#selected_server_record_webphone_hungup').prop('disabled', true);
            stop_webphonephone = true;
            listen_button = true;
            Swal.fire(
                'Good job!',
                "Thank You",
                'success'
            )
        });

        /** Hungup webphone action **/
        $(document).on('click', '#selected_server_record_webphone_hungup', function (e){
            let selected_phone = $('#select_phone').val();
            //let get_select_server = $('#logged_in_server').val();
            $.ajax({
                type: 'GET',
                url: 'webphone/'+selected_phone,

                success: function (response){

                    /** Disable this button and activate all agents listening buttons **/
                    $(this).prop('disabled', true);
                    $('button#selected_server_record_webphone').prop('disabled', true);
                    listen_button = false;

                    var webphone_monitor = $('#webphone_monitor');
                    webphone_monitor.empty();
                    var iframe = document.createElement('iframe');
                    iframe.setAttribute('id', 'webphoneiframe');
                    iframe.setAttribute("src", response[1]);
                    iframe.setAttribute('allow', 'microphone *; speakers *;');
                    iframe.width = '100%';
                    iframe.height = '800%';
                    webphone_monitor.append(iframe);
                    Swal.fire(
                        'Good job!',
                        'You are stoped listening',
                        'success'
                    )

                },

                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! '+error,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            });

        });

        /** Hungup action **/
        $(document).on('click', '#selected_server_record_hungup', function (e){
            e.preventDefault();
            //let selected_server = $('#logged_in_server').val();
            var row = $(this).closest('tr');
            var selected_user = row.find('td#get_user_name').text();
            $.ajax({
                type: 'GET',
                url: 'hungup_call/'+selected_user+'/'+'hangup',

                success: function (response){
                    Swal.fire(
                        'Good job!',
                        response,
                        'success'
                    )
                },

                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! '+error,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            })

        });

        /** Pause action **/
        $(document).on('click', '#selected_server_record_pause', function (e){
            e.preventDefault(); console.log('hello');
            //let selected_server = $('#logged_in_server').val();
            var row = $(this).closest('tr');
            var selected_user = row.find('td#get_user_name').text();
            $.ajax({
                type: 'GET',
                url: 'hungup_call/'+selected_user+'/'+'pause',

                success: function (response){
                    Swal.fire(
                        'Good job!',
                        response,
                        'success'
                    )
                },

                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! '+error,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            })

        });

        /** Resume action **/
        $(document).on('click', '#selected_server_record_resume', function (e){
            e.preventDefault();
            //let selected_server = $('#logged_in_server').val();
            var row = $(this).closest('tr');
            var selected_user = row.find('td#get_user_name').text();
            $.ajax({
                type: 'GET',
                url: 'hungup_call/'+selected_user+'/'+'resume',

                success: function (response){
                    Swal.fire(
                        'Good job!',
                        response,
                        'success'
                    )
                },

                error: function (error){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! '+error,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            })

        });

        /** Monitoring action **/
        $(document).on('click', '#selected_server_record_monitoring', function (e){
            e.preventDefault();
            var row = $(this).closest('tr');
            //row.css('backgroundColor', '#fa0505')
            row.css("border-collapse", "collapse");
            var selected_user = row.find('td#get_user_name').text();
            var selected_session = row.find('td#get_session').text();
            var webphone_phone = $('#set_phone').text();
            //let get_select_server = $('#logged_in_server').val();
            let get_type_monitor = $('#monitor_options').val();

            /** Make this tr shadow **/
            /*tr {
                box-shadow: inset 0px -1px 0px rgba(0, 0, 0, 0.1), inset 0px 1px 0px rgba(0, 0, 0, 0.1);
            }*/

            $.ajax({
                type: 'GET',
                url: 'blind_monitor/'+selected_user+'/'+selected_session+'/'+webphone_phone+'/'+get_type_monitor,

                success: function (response){
                    listen_button = true;
                    //alert(response);
                    Swal.fire(
                        'Good job!',
                         response,
                        'success'
                    )

                },

                error: function (error){
                    listen_button = false;
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! '+error,
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            })

        });

        /** Get webphone **/
        $(document).on('click', '#selected_server_record_webphone', function (e){
            let selected_phone = $('#select_phone').val();
            //let get_select_server = $('#logged_in_server').val();
            //alert(selected_phone);
            $.ajax({
                type: 'GET',
                url: 'webphone/'+selected_phone,

                success: function (response){
                    $('#set_phone').text(response[0]);

                    var webphone_monitor = $('#webphone_monitor');
                    webphone_monitor.empty();
                    var iframe = document.createElement('iframe');
                    iframe.setAttribute('id', 'webphoneiframe');
                    iframe.setAttribute("src", response[1]);
                    iframe.setAttribute('allow', 'microphone *; speakers *;');
                    iframe.width = '100%';
                    iframe.height = '800%';
                    webphone_monitor.append(iframe);

                    stop_webphonephone = false;
                    listen_button = false;
                    /** Disable webdphone button and active other webphone buttons **/
                    $('button#selected_server_record_webphone').prop('disabled', true);
                    $('button#selected_server_record_webphone_hungup').prop('disabled', true);
                    $('button#selected_server_record_webphone_stop').prop('disabled', false);

                    Swal.fire(
                        'Good job!',
                        'Web phone connected successfully',
                        'success'
                    )
                },

                error: function (error){
                    alert(error);
                }
            });
        });

        /** Refresh the page of live Agents **/
        setInterval(function () {
            /** Refresh table **/
            $.ajax({
                type: 'GET',
                url: 'agents_logged_in_search_json',

                success: function (response){

                    var table_log = $('#search_logged_in_agents_tbody');
                    table_log.empty();
                    var i_paused = 0;
                    var i_incall = 0;
                    var i_ready = 0;

                    var time_chrono = [];
                    response.forEach(element =>
                    {
                        /** Backgrounds **/
                        var status = String(element.status);
                        let test = false;
                        if(status == 'PAUSED' ){
                            i_paused++;
                            test = true;
                        }else if(status == 'INCALL'){
                            i_incall++;
                        }else if(status == 'READY'){
                            i_ready++;
                        }

                        $create_btn = document.createElement('button');

                        var chrono_color;
                        var chrono_fontColor;

                        if(element.status == 'PAUSED'){
                            chrono_color = '#FDE105FF';
                            chrono_fontColor = '#0a0a0a';
                        }
                        if(element.status == 'READY'){
                            chrono_color = '#5b69bc';
                            chrono_fontColor = '#ececec';
                        }
                        if(element.status == 'INCALL'){
                            chrono_color = '#995b92';
                            chrono_fontColor = '#f3f0f0';
                        }

                        table_log.append(
                            '<tr id="listen_".element.user."" style="background-color: '+chrono_color+'; " >' +
                                '<td id="get_user_name" style="color: '+chrono_fontColor+'" >'+element.user+'</td>' +
                                '<td style="color: '+chrono_fontColor+'">'+element.full_name+'</td>' +
                                '<td style="color: '+chrono_fontColor+'">'+element.status+'</td>' +
                                '<td style="color: '+chrono_fontColor+'">'+element.chrono+'</td>' +
                                '<td style="color: '+chrono_fontColor+'">'+element.calls_today+'</td>' +
                                '<td id="get_session" style="display: none">'+element.session+'</td>' +
                                '<td id="get_buttons" style="position: center">' +
                                    '<a id="selected_server_record_monitoring" class="btn btn-sm btn-outline-primary"> <i class="fa fa-headphones"  title="listen"></i></a>'+
                                    '<a id="selected_server_record_webphone_hungup" class="btn btn-sm btn-outline-warning"> <i class="fa fa-headphones" title="stop listen" ></i><i class="fa fa-times" ></i></a></a>'+
                                    '<a id="selected_server_record_resume" class="btn btn-sm btn-outline-success"><i class="fa fa-fast-forward" title="Resume" ></i></a>'+
                                    '<a id="selected_server_record_pause" class="btn  btn-sm btn-outline-warning"><i class="fa fa-pause" title="Pause" ></i></a>'+
                                    '<a id="logout_api" class="btn btn-sm btn-outline-secondary"><i class="fa fa-user-times" title="lougout"></i></a>'+
                                    '<a id="selected_server_record_hungup" class="btn btn-sm btn-outline-danger"><i class="fa fa-times" title="Hungup" ></i></a>'+
                                '</td>'+
                            '</tr>'
                        );

                        /** Active, disable buttons **/
                        if(stop_webphonephone == true) {
                            $('a#selected_server_record_webphone_hungup').prop('disabled', true);
                            /** Desable all buttons table **/
                            $('td#get_buttons').each(function (index) {
                                $(this).find('a#selected_server_record_monitoring').prop('disabled', true);
                                $(this).find('a#logout_api').prop('disabled', true);
                                $(this).find('a#selected_server_record_hungup').prop('disabled', true);
                                $(this).find('a#selected_server_record_pause').prop('disabled', true);
                                $(this).find('a#selected_server_record_resume').prop('disabled', true);
                            });
                        }

                        if(stop_webphonephone == false){
                            $('a#selected_server_record_webphone_hungup').prop('disabled', true);
                            /** Activate all buttons table **/
                            $('td#get_buttons').each(function (index){
                                $(this).find('a#selected_server_record_monitoring').prop('disabled', false);
                                $(this).find('a#logout_api').prop('disabled', false);
                                $(this).find('a#selected_server_record_hungup').prop('disabled', false);
                                $(this).find('a#selected_server_record_pause').prop('disabled', false);
                                $(this).find('a#selected_server_record_resume').prop('disabled', false);
                            });
                        }

                        /** If listen button pressed **/
                        if(listen_button == true){
                            /** Desactivate all listen buttons table else listen clickable button **/
                            $('a#selected_server_record_webphone_hungup').prop('disabled', false);
                            $('td#get_buttons').each(function (index){
                                $(this).find('a#selected_server_record_monitoring').prop('disabled', true);
                            });
                        }

                        /** If listen button pressed **/
                        if(listen_button == false){
                            /** Activate all listen buttons table else listen clickable button **/
                            $('a#selected_server_record_webphone_hungup').prop('disabled', true);
                            $('td#get_buttons').each(function (index){
                                $(this).find('a#selected_server_record_monitoring').prop('disabled', false);
                            });
                        }

                    });

                    /** Update dashboard **/
                    $('#sum_agent_logged_in').text(response.length);
                    $('#sum_call_incall').text(i_incall);
                    $('#sum_call_ready').text(i_ready);
                    $('#sum_call_paused').text(i_paused);

                },

                error: function (error){
                    console.log(error);
                }
            });

        }, 4000);

        /** Get Call in Queue **/
        setInterval(function (){
            /** Get call in queue sum **/
            var users_array = [];
            $('td#get_user_name').each(function (index){
                users_array.push($(this).text());
            });

            $.ajax({
                type: 'POST',
                url : 'all_call_in_queue',
                data: {
                    users_array: users_array,
                },
                cache: false,

                success: function (response){
                    $('#calls_waitting').text(response);
                },

                error: function (error){
                    console.log(error);
                }
            });
        }, 4000);

        /** Count IVR **/
        setInterval(function (){
            /** Get Count IVR **/

            $.ajax({
                type: 'GET',
                url : 'countivr',

                success: function (response){
                    $('#count_ivr').text(response[0].IVR_COUNT);
                },

                error: function (error){
                    console.log(error);
                }
            });
        }, 4000);

        /** Live Calls Waittinf for agents **/
        setInterval(function (){

            $.ajax({
                type: 'GET',
                url : 'calls_waitting_for_agents_live',

                success: function (response){
                    var liveCallsWFAegnts = 0;
                    liveCallsWFAegnts = response[0].liveCallsWFAegnts;
                    $('#count_liveCallsWFAegnts').text(liveCallsWFAegnts);

                    if( (liveCallsWFAegnts > 0) && (liveCallsWFAegnts < 6) ){
                        $('#count_liveCallsWFAegnts').css('backgroundColor', '#e8b4b4')
                    }

                    if( (liveCallsWFAegnts > 6) && (liveCallsWFAegnts < 14) ){
                        $('#count_liveCallsWFAegnts').css('backgroundColor', '#da4d4d')
                    }

                    if(liveCallsWFAegnts > 13){
                        $('#count_liveCallsWFAegnts').css('backgroundColor', '#f10505')
                    }
                },

                error: function (error){
                    console.log(error);
                }
            });
        }, 4000);

        /** Refresh the page of inbount_outbound_calls **/
        setInterval(function () {
            /** Refresh table **/
            $.ajax({
                type: 'GET',
                url: 'prospect_waittting',

                success: function (response){
                    console.log(response);
                    var get_inboud_outbound_table = $('#table_inbount_outbound_calls');
                    if($.isEmptyObject(response)){
                        get_inboud_outbound_table.css('display', 'none');
                    }else{
                        get_inboud_outbound_table.css('display', 'block');
                    }
                    var table_log = $('#tbody_inbount_outbound_calls');
                    table_log.empty();

                    response.forEach(element =>
                    {
                        var inbout_outbound;

                        if(element.campaign_id == 'inBound'){
                            inbout_outbound = '#f10505';
                        }else{
                            inbout_outbound = 'rgba(255,255,255,0)';
                        }

                        table_log.append(
                            '<tr style="background-color: '+inbout_outbound+'; " >' +
                                '<td>'+element.status+'</td>' +
                                '<td>'+element.campaign_id+'</td>' +
                                '<td>'+element.phone_number+'</td>' +
                                '<td>'+element.server_ip+'</td>' +
                                '<td>'+element.DIALTIME+'</td>' +
                                '<td>'+element.call_type+'</td>' +
                                '<td>'+element.queue_priority+'</td>' +
                            '</tr>'
                        );

                    });

                },

                error: function (error){
                    alert('error : '+error);
                }
            });

        }, 4000);

    </script>


    <script type="text/javascript">

      /*  $(document).ready(function () {

            $('#search_logged_in_agents thead tr')
                .clone(true)
                .addClass('filters_logged')
                .appendTo('#search_logged_in_agents thead');

            var table = $('#search_logged_in_agents').DataTable({
                orderCellsTop: true,
                fixedHeader: true,
                scrollX: '300px',
                scrollCollapse: true,

                initComplete: function () {
                    var api = this.api();

                    // For each column
                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {

                            // Set the header cell to contain the input element
                            var cell = $('.filters_logged th').eq(
                                $(api.column(colIdx).header()).index()
                            );
                            var title = $(cell).text();
                            if(title != "Opérations"){
                                $(cell).html('<input type="text"  class="table table-striped table-bordered display" placeholder="Rechercher avec  ' + title + '" />');
                            }

                            // On every keypress in this input
                            $(
                                'input',
                                $('.filters_logged th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('change', function (e) {
                                    // Get the search value
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                    var cursorPosition = this.selectionStart;
                                    // Search the column for that value
                                    api
                                        .column(colIdx)
                                        .search(
                                            this.value != ''
                                                ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                : '',
                                            this.value != '',
                                            this.value == ''
                                        )
                                        .draw();
                                })
                                .on('keyup', function (e) {
                                    e.stopPropagation();

                                    $(this).trigger('change');
                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
            });
        });  **/

    </script>

@endsection
