@extends('Admin.layouts.hr-base')
@section('admin')

                    <div class="side-app main-container">
                        <!--PAGE HEADER -->
                        <div class="page-header d-xl-flex d-block">
                            <div class="page-leftheader">
                                <div class="page-title"> 
                               AJOUTER UNE NOUVELLE CONFÉRENCE</div>
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
                                                            <label class="form-label mb-0 mt-2">Numéro de conférence :</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"  placeholder="Numéro">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label class="form-label mb-0 mt-2">IP du serveur </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            
                                                            <input type="text" class="form-control mb-md-0 mb-5"  placeholder="Nom">
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                                
                                        
                                                
                                              
                                                
                                                
                                                                                                                                                           <div class="form-group">
                                                  
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
