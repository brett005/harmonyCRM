@extends('Admin.layouts.hr-base')
@section('admin')
    <!--PAGE HEADER -->
    @section('css-liste')
<style>
    .app-content .side-app {
    padding:71px 1.5rem 0 1.5rem;
}
 </style>
    <!--END PAGE HEADER -->
@endsection
    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"><i class="fa fa-phone" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-phone" aria-label="fa fa-phone"></i> Ajouter un shift</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold"> <i class="fa fa-phone" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-phone" aria-label="fa fa-phone"></i>  Formulaire Ajouter shift</h4>
                            <form action="ajouter-phone" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">ID d'équipe </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="get_phone_login"
                                                   placeholder="">
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Nom de l'équipe  </label>
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
                                            <label class="form-label mb-0 mt-2">Groupe d'utilisateurs administrateurs :</label>
                                        </div>
                                        <div class="col-md-4">
                                        <select name="user_group" class="form-control custom-select select2" >
                                            <option value="---ALL---"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tous les groupes d'utilisateurs administrateurs</font></font></option>
                                            <option value="ADMIN"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ADMIN - ADMINISTRATEURS VICIDIAUX</font></font></option>
                                            <option value="agents"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">mandataires - mandataires</font></font></option>
                                            <option value="call1_unadev"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call1_unadev - call1 unadev</font></font></option>
                                            <option value="call1unicef"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call1unicef &ZeroWidthSpace;&ZeroWidthSpace;- call1_unicef</font></font></option>
                                            <option value="call2unadev"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call2unadev - call2 unadev</font></font></option>
                                            <option value="call2unicef"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call2unicef &ZeroWidthSpace;&ZeroWidthSpace;- call2 unicef</font></font></option>
                                            <option value="test_group"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">groupe_test - groupe_test</font></font></option>
                                            <option value="Unapie_harmonie"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Unapie_harmonie - Unapie_harmonie</font></font></option>
                                            <option selected="" value="---ALL---"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tous les groupes d'utilisateurs administrateurs</font></font></option>
                                        </select>
                                              
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Quart de semaine 	
                                                </label>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="cpm_hoper_level" class="form-control custom-select select2" >
                                                    <option value="1">samedi</option>
                                                    <option value="5">dimanche</option>
                                                    <option value="10">lundi<option>
                                                    <option value="20">mardi</option>
                                                    <option value="50">mercredi</option>
                                                    <option value="100">jeudi</option>
                                                    <option value="200">vendredi</option>
                                            </select>
                                              
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Heure de début d'équipe  </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="get_phone_login"
                                                   placeholder="">
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">  Heure de fin d'équipe   </label>
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
                                            <label class="form-label mb-0 mt-2">Options de rapport :	</label>
                                        </div>
                                        <div class="col-md-4">
                                        <select name="report_option" class="form-control custom-select select2" >
                                        <option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option>
                                        <option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option>
                                        </select>
                                     
                                              
                                        </div>
                                        <div class="col-md-2">
                                            
                                        </div>
                                        <div class="col-md-4">
                                           
                                              
                                        
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


