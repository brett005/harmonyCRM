@extends('Admin.layouts.hr-base')
@section('admin')

                    <div class="side-app main-container">
                        <!--PAGE HEADER -->
                        <div class="page-header d-xl-flex d-block">
                            <div class="page-leftheader">
                                <div class="page-title"> ENREGISTRER UN ENREGISTREMENT TRANSPORTEUR</div>
                            </div>
                            <div class="page-rightheader ms-md-auto">
                                <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                                    <div class="btn-list">
                                        <button  class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"> <i class="feather feather-mail"></i> </button>
                                        <button  class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"> <i class="feather feather-phone-call"></i> </button>
                                        <button  class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"> <i class="feather feather-info"></i> </button>
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
                                                            <label class="form-label mb-0 mt-2">Identifiant du transporteur :</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"  placeholder="Num??ro">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Nom du transporteur</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                            <input type="text" class="form-control mb-md-0 mb-5"  placeholder="Nom">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Description du transporteur  </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"  placeholder="D??scription de la liste">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Groupe d'utilisateurs administrateurs  </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="user_group"  class="form-control custom-select select2" data-placeholder="Oui">
                                                             
                                                            <option value="---ALL---"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tous les groupes d'utilisateurs administrateurs</font></font></option>
                                                            <option value="ADMIN"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ADMIN - ADMINISTRATEURS VICIDIAUX</font></font></option>
                                                            <option value="agents"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">mandataires - mandataires</font></font></option>
                                                            <option value="call1_unadev"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call1_unadev - call1 unadev</font></font></option>
                                                            <option value="call1unicef"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call1unicef &ZeroWidthSpace;&ZeroWidthSpace;- call1_unicef</font></font></option>
                                                            <option value="call2unadev"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call2unadev - call2 unadev</font></font></option>
                                                            <option value="call2unicef"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">call2unicef &ZeroWidthSpace;&ZeroWidthSpace;- call2 unicef</font></font></option>
                                                            <option value="test_group"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">groupe_test - groupe_test</font></font></option>
                                                            <option value="Unapie_harmonie"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Unapie_harmonie - Unapie_harmonie</font></font></option>
                                                            <option selected="" value="---ALL---"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">---TOUS---</font></font></option>
                
                                                              
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Cha??ne d'enregistrement</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"  placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Identifiant du mod??le</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="template_id"  class="form-control custom-select select2" data-placeholder="Oui">
                                                             
                                                              <option value="--NONE--" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--AUCUN--</font></font></option><option value="IAX_generic"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IAX_generic - G??n??rique du t??l??phone IAX</font></font></option>
                                                              <option value="SIP_generic"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SIP_generic - T??l??phone SIP g??n??rique</font></font></option>
                                                              <option value="webRTC"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">webRTC - VICIphone</font></font></option>
                                                              <option selected="" value="SIP_generic"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SIP_g??n??rique</font></font></option>
                                                              </select>
                                                                                                                      </div>
                                                    </div>
                                                </div>
                                                   <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Saisie de compte</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                                 <input type="text" class="form-control"  placeholder="">                                                
                                                       </div>
                                                </div>
                                                </div>
                                                
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Protocole</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <select name="protocol"  class="form-control custom-select select2" data-placeholder="Oui">
                                                          <option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">siroter</font></font></option><option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Zap</font></font></option><option><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IAX2</font></font></option><option value="EXTERNAL"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">EXTERNE</font></font></option><option selected="" value="SIP"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">siroter</font></font></option></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                                                                                                                           <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Cha??ne globale :  </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                                 <input type="text" class="form-control"  placeholder="">                                                   
                                                       </div>
                                                </div>

                                                 <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Entr??e du plan de num??rotation :</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"  placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">IP du serveur</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <select name="protocol"  class="form-control custom-select select2" data-placeholder="Oui">
                                                          <option> oui</option>
                                                          <option> Non</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">Actif</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <select name="protocol"  class="form-control custom-select select2" data-placeholder="Oui">
                                                          <option> oui</option>
                                                          <option> Non</option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                           
                                                        </div>
                                                        <div class="col-md-3">
                                                           </BR>
                                                      <a  href="javascript:void(0);" class="btn btn-primary">Envoyer</a>
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
               
                
            

      
 @endsection
