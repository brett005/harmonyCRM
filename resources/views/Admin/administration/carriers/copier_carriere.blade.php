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
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"><i class="fa fa-phone" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-phone" aria-label="fa fa-phone"></i> Ajouter une carriere</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold"> <i class="fa fa-phone" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-phone" aria-label="fa fa-phone"></i>  Formulaire carriere</h4>
                            <form action="ajouter-phone" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Carrier ID:	 </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="get_phone_login"
                                                   placeholder="">
                                        </div>
                                         <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Carrier Name:	 </label>
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
                                            <label class="form-label mb-0 mt-2">Server IP:	</label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control fc-datepicker"
                                                   name="get_phone_full_name" placeholder="">
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label mb-0 mt-2">Source Carrier:	</label>
                                        </div>
                                        <div class="col-md-4">
                                            
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


