@extends('Admin.layouts.hr-base')
@section('admin')


                    <div class="side-app main-container">
						<!--PAGE HEADER -->
                        <div class="page-header d-xl-flex d-block">
							<div class="page-leftheader">
								<div class="page-title">AJOUTER UN NOUVEAU DID</div>
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
                                                        <div class="col-md-4">
                                                            <label class="form-label mb-0 mt-2">Extension SDA </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control"  placeholder="Numéro">
                                                        </div>
                                                    </div>
                                                </div>
												<div class="form-group ">

													<div class="row">

														<div class="col-md-4">
															<label class="form-label mb-0 mt-2">Description du SDA </label>
														</div>
														<div class="col-md-6">
															
															<input type="text" class="form-control mb-md-0 mb-5"  placeholder="Nom">
														</div>
													</div>
												</div>
												
												
										     <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="form-label mb-0 mt-2">Groupe d'utilisateurs administrateurs</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select name="projects"  class="form-control custom-select select2" data-placeholder="Oui">
                                                                <option label="Oui"></option>
                                                                <option value="1">Oui</option>
                                                                <option value="2">Non</option>
                                                              
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
												
												
                                          
												
                                               
												

                                                   

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                           
                                                        </div>
                                                        <div class="col-md-4">
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