@extends('Admin.layouts.hr-base')
@section('ajouter-telephone')
    <!--PAGE HEADER -->
    @section('css3')
<style>
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 3rem 1rem 1.5rem;
    position: relative;
    margin-top: 1px;
}
.dark-mode .hremp-tabs .tabs-menu1 ul li a {
    background: #fffff;
    margin-top: 5px;
}
.dark-mode .hremp-tabs .tabs-menu1 ul li a.active {
    background: #25274a;
    border-bottom: 0;
    color: #60ff9f;
}
</style>
@endsection
 
    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"><i class="fa fa-phone" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-phone" aria-label="fa fa-phone"></i> Ajouter un  téléphone</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold"> <i class="fa fa-phone" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-phone" aria-label="fa fa-phone"></i>  Formulaire Téléphone</h4>
                            <form action="ajouter-phone" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Phone Login</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="get_phone_login"
                                                   placeholder="">
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Phone Pass</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control fc-datepicker"
                                                   name="get_phone_pass" placeholder="">
                                        </div>
                                 
                                    </div>
                                </div>
                               
                                   
                             
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Phone Full Name</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control fc-datepicker"
                                                   name="get_phone_full_name" placeholder="">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Phone Extension </label>
                                        </div>
                                        <div class="col-md-4">
                                           
                                                    <input type="text" class="form-control mb-md-0 mb-9"
                                                           name="get_phone_extension" placeholder="">
                                                    <span class="text-muted"></span>
                                              
                                        
                                        </div>
                                    </div>
                                </div>

                              
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Dial Plan Number</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="get_dialplan_number"
                                                   placeholder="">
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Voice Mail Box</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="get_voicemail_id"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Voice Mail Box</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="get_voicemail_id"
                                                   placeholder="">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Outbound CallerID</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="get_outbound_cid"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Admiçn user groupe</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="get_admin_user_group" class="form-control custom-select select2" data-placeholder="Select">
                                                <option label="Select"></option>
                                                <option value="---ALL---">---ALL---</option>
                                                @if($vicidial_user_groups != '')
                                                    @foreach($vicidial_user_groups as $vicidial_user_group)
                                                        <option
                                                            value="{{ $vicidial_user_group['user_group'] }}">{{ $vicidial_user_group['user_group'] }}
                                                            - {{ $vicidial_user_group['group_name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Server IP</label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="get_server_ip"
                                                    class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                @if($get_the_servers_ip != '')
                                                    @foreach($get_the_servers_ip as $server_ip)
                                                        <option
                                                            value="{{ $server_ip->server_ip }}">{{ $server_ip->server_ip }}
                                                            - {{ $server_ip->server_description }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-outline-success" value="Enregistrer">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

@endsection


