
@extends('Admin.layouts.hr-base')
@section('ajouter')

@section('css3')
<style>
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.5rem 1.5rem;
    position: relative;
    margin-top: 0px;
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
    <!--PAGE HEADER -->
       <!-- <div class="page-header d-xl-flex d-block">
            <div class="page-leftheader">
                <div class="page-title">Add Employee</div>
            </div>
            <div class="page-rightheader ms-md-auto">
                <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                    <div class="btn-list">
                        <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"><i
                                    class="feather feather-mail"></i></button>
                        <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"><i
                                    class="feather feather-phone-call"></i></button>
                        <button class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"><i
                                    class="feather feather-info"></i></button>
                    </div>
                </div>
            </div>
        </div>-->
    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"> <a href="#tab5" class="active" data-bs-toggle="tab"><i class="fa fa-user-plus" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-user-plus" aria-label="fa fa-user-plus"> </i>   Ajouter utilisateur</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold"> </h4>
                            <form action="{{ route('addUser') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Numéro d'utilisateur </label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control mb-md-0 mb-9"
                                                           name="get_agent_user" placeholder="">
                                                    <span class="text-muted"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Mot de passe</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" name="get_agent_pass"
                                                   placeholder="" class="form-control mb-md-0 mb-9">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Nom et prénom</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="get_agent_full_name"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Niveau de l'utilisateur</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="get_agent_level" class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Groupe d'utilisateurs :</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="get_agent_user_group"
                                                    class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                @if($vicidial_user_groups != '')
                                                    @foreach($vicidial_user_groups as $vicidial_user_group)
                                                        <option
                                                                value="{{ $vicidial_user_group['user_group'] }}">{{ $vicidial_user_group['user_group'] }}
                                                            - {{ $vicidial_user_group['group_name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Forfait téléphonique login</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" name="get_agent_phone_login"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Forfait téléphonique pass</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control fc-datepicker"
                                                   name="get_agent_phone_pass" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-outline-success" value="Enregistrer">Enregistrer<i class="fe fe-plus me-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab6">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Nouveau numéro d'utilisateur </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="#ID">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Mot de passe</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Department">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Nom et prénom</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Designation">
                                    </div>
                                </div>
                            </div>

                            <h4 class="mb-5 mt-7 font-weight-bold">Salary</h4>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Utilisateur source</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="projects" class="form-control custom-select select2"
                                                data-placeholder="Select Type">

                                            <option value="003"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">003 - 003</font></font>
                                            </option>
                                            <option value="006"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">006 - 006</font></font>
                                            </option>
                                            <option value="007"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">007 - 007</font></font>
                                            </option>
                                            <option value="010"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">010 - 010</font></font>
                                            </option>
                                            <option value="202030"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">202030 -
                                                        202030</font></font></option>
                                            <option value="001"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">001 - 3001</font></font>
                                            </option>
                                            <option value="005"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">005 - 3005</font></font>
                                            </option>
                                            <option value="009"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">009 - 3009</font></font>
                                            </option>
                                            <option value="3012"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">3012 - 3012</font></font>
                                            </option>
                                            <option value="4002"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4002 - 4002</font></font>
                                            </option>
                                            <option value="4004"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4004 - 4004</font></font>
                                            </option>
                                            <option value="4010"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4010 - 4010</font></font>
                                            </option>
                                            <option value="4050"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4050 - 4050</font></font>
                                            </option>
                                            <option value="6005"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6005 - 6005</font></font>
                                            </option>
                                            <option value="6007"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6007 - 6007</font></font>
                                            </option>
                                            <option value="6008"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6008 - 6008</font></font>
                                            </option>
                                            <option value="6009"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6009 - 6009</font></font>
                                            </option>
                                            <option value="6050"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6050 - 6050</font></font>
                                            </option>
                                            <option value="8001"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8001 - 8001</font></font>
                                            </option>
                                            <option value="8002"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8002 - 8002</font></font>
                                            </option>
                                            <option value="8003"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8003 - 8003</font></font>
                                            </option>
                                            <option value="8004"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8004 - 8004</font></font>
                                            </option>
                                            <option value="8005"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8005 - 8005</font></font>
                                            </option>
                                            <option value="8006"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8006 - 8006</font></font>
                                            </option>
                                            <option value="8007"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8007 - 8007</font></font>
                                            </option>
                                            <option value="8008"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8008 - 8008</font></font>
                                            </option>
                                            <option value="8009"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8009 - 8009</font></font>
                                            </option>
                                            <option value="8010"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8010 - 8010</font></font>
                                            </option>
                                            <option value="8050"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8050 - 8050</font></font>
                                            </option>
                                            <option value="6666"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6666 -
                                                        Administrateur</font></font></option>
                                            <option value="8888"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">8888 - Issam
                                                        administrateur</font></font></option>
                                            <option value="004"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">004 - Amine</font></font>
                                            </option>
                                            <option value="3011"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">3011 - Amine</font></font>
                                            </option>
                                            <option value="6004"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6004 - Anes</font></font>
                                            </option>
                                            <option value="008"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">008 - Houria</font></font>
                                            </option>
                                            <option value="4001"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4001 - Ikhlas</font></font>
                                            </option>
                                            <option value="4007"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4007 - Ikhlas</font></font>
                                            </option>
                                            <option value="4009"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4009 - Iman</font></font>
                                            </option>
                                            <option value="VDCL"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">VDCL - Entrant sans
                                                        agent</font></font></option>
                                            <option value="7777"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">7777 -
                                                        KamelAdmin</font></font></option>
                                            <option value="101010"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">101010 - test
                                                        kameluser</font></font></option>
                                            <option value="6001"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6001 - Manar</font></font>
                                            </option>
                                            <option value="6006"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6006 -
                                                        Mordjane</font></font></option>
                                            <option value="6010"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6010 -
                                                        Mounira</font></font></option>
                                            <option value="202020"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">202020 -
                                                        nasreddinetest</font></font></option>
                                            <option value="VDAD"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">VDAD - Numérotation
                                                        automatique sortante</font></font></option>
                                            <option value="6003"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6003 - Salah</font></font>
                                            </option>
                                            <option value="1000"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">1000 - test
                                                        issam</font></font></option>
                                            <option value="4008"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4008 - Yacine</font></font>
                                            </option>
                                            <option value="6002"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">6002 -
                                                        Yasmine</font></font></option>
                                            <option value="4006"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4006 - Yousra</font></font>
                                            </option>
                                            <option value="002"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">002 - Yousra</font></font>
                                            </option>
                                            <option value="4005"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4005 - Zine</font></font>
                                            </option>
                                            <option value="4003"><font style="vertical-align: inherit;"><font
                                                            style="vertical-align: inherit;">4003 - Zine</font></font>
                                            </option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Salary</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="$Salary">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-7">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Status:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="custom-switch">
                                            <input type="checkbox" name="custom-switch-checkbox"
                                                   class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                            <span class="custom-switch-description">Active/Inactive</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab7">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Account Holder</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Account Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Bank Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Branch Location</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Location">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Bank Code (IFSC)
                                            <span class="form-help" data-bs-toggle="tooltip" data-bs-placement="top"
                                                  title="Bank Identify Number in your Country">?</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Code">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label mb-0 mt-2">Tax Payer ID (PAN)
                                            <span class="form-help" data-bs-toggle="tooltip" data-bs-placement="top"
                                                  title="Taxpayer Identification Number Used in your Country">?</span>
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="ID No">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab8">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-label mb-0 mt-2">Resume</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-label mb-0 mt-2">ID Proof</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-label mb-0 mt-2">Offer Letter</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-label mb-0 mt-2">Joining Letter</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-label mb-0 mt-2">Agreement Letter</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-label mb-0 mt-2">Experience Letter</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label"></label>
                                            <input class="form-control" type="file">
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

@endsection


