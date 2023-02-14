 
@extends('Admin.layouts.hr-base')
 @section('admin')
 @section('css1')
<style>

.btn-sm {
    font-size: 0.1rem;
    min-width: 1.625rem;
    
    padding: 0.1rem 0.1rem;

    border-radius: 0.2rem;
    margin-left:0.2em;
    margin-left:0.2em;
   

}

.table thead th, .text-wrap table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #e9ebfa;
    border-bottom-width: 1px;
    padding-top: 0.1rem;
    padding-bottom: 0.1rem;
}


.app-content .side-app {
    padding: 0.5rem 0.5rem 0.5em 0.5rem;
}
.table td {
    padding: 0.1rem;
    vertical-align: middle;
    border-top: 0;
}

.card-body{
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.1rem 0 0 1.5rem;
    position: relative;
}

.col-xl-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 0.5rem;
}

span {
  font-size: 0.9rem;
}
.th{
    font-size: 0.1rem;
}
.btn i {
    font-size: 0.85rem;
    line-height: 1.1;
}
.jumps-prevent{
	padding-top:30px !important;
}
</style>
@endsection
    

<div class="row" >
    <div class="col-xl-12 col-md-12 col-lg-12 col-xs-12">
        <div class="card">
            <div class="card-header border-0" style="margin-top:-15px">
                <div class="card-title"><span>Agents Time On Calls Campaign/call waiting </span>  </div>
            </div>
            <div class="card-body-table">
                <div class="table-responsive">
                    <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                        <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">full_name</th>
                                <th class="border-bottom-0">User</th>
                                <th class="border-bottom-0 ">statuts</th>
                                <th class="border-bottom-0">Chrono</th>
                                <th class="border-bottom-0">Compagne</th>
                                <th class="border-bottom-0">Calls</th>
                                <th class="border-bottom-0">Opérations</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                <a class="btn btn-sm btn-outline-primary"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a>
                                    <a id="selected_server_record_webphone_hungup" class="btn btn-sm btn-outline-warning"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a></a>
                                    <a   class="btn btn-sm btn-outline-success"><i class="fa fa-fast-forward" ></i></a>
                                    <a   class="btn btn-sm btn-outline-warning"><i class="fa fa-pause" ></i></a>
                                    <a   class="btn btn-sm btn-outline-secondary"><i class="fa fa-user-times"></i></a>
                                    <a   class="btn btn-sm btn-outline-danger"><i class="fa fa-times" ></i></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                    <a class="btn btn-sm btn-outline-primary"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a>
                                    <a id="selected_server_record_webphone_hungup" class="btn btn-sm btn-outline-warning"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a></a>
                                    <a   class="btn btn-sm btn-outline-success"><i class="fa fa-fast-forward" ></i></a>
                                    <a   class="btn btn-sm btn-outline-warning"><i class="fa fa-pause" ></i></a>
                                    <a   class="btn btn-sm btn-outline-secondary"><i class="fa fa-user-times"></i></a>
                                    <a   class="btn btn-sm btn-outline-danger"><i class="fa fa-times" ></i></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                    <a   class="btn btn-sm btn-outline-primary"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a>
                                    <a id="selected_server_record_webphone_hungup" class="btn btn-sm btn-outline-warning"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a></a>
                                    <a   class="btn btn-sm btn-outline-success"><i class="fa fa-fast-forward" ></i></a>
                                    <a   class="btn btn-sm btn-outline-warning"><i class="fa fa-pause" ></i></a>
                                    <a   class="btn btn-sm btn-outline-secondary"><i class="fa fa-user-times"></i></a>
                                    <a   class="btn btn-sm btn-outline-danger"><i class="fa fa-times" ></i></a>
                                </td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                    <a   class="btn btn-sm btn-outline-primary"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a>
                                    <a id="selected_server_record_webphone_hungup" class="btn btn-sm btn-outline-warning"> <i class="fa fa-headphones" ></i><i class="fa fa-times" ></i></a></a>
                                    <a   class="btn btn-sm btn-outline-success"><i class="fa fa-fast-forward" ></i></a>
                                    <a   class="btn btn-sm btn-outline-warning"><i class="fa fa-pause" ></i></a>
                                    <a   class="btn btn-sm btn-outline-secondary"><i class="fa fa-user-times"></i></a>
                                    <a   class="btn btn-sm btn-outline-danger"><i class="fa fa-times" ></i></a>
                                </td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>             
            </div>
        </div>
    </div>
    <!--  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-xs-12">
        <div class="form-group">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label mb-0 mt-2">Mot </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label mb-0 mt-2">Mot </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  placeholder="">
                                </div>
                            </div>
                        </div> 
                        <div class="btn-list"> 
                            <a href="javascript:void(0);" class="btn btn-light">Light</a> 
                            <a href="javascript:void(0);" class="btn btn-primary">Primary</a>
                            <a href="javascript:void(0);" class="btn btn-secondary">Secondary</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div-->
</div>
                               
                                
                                
                      
                       
                                            
                   
                                       
                        
 <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="card">

                       <div class="row">
                            <div class="col-xl-9 col-md-9 col-lg-9">
                                <div class="card-header  border-0" style="margin-top:-15px">
                                <div class="card-title"><span>Agents Time On Calls Campaign:/call waiting</span>  </div> 
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0 w-5">Status</th>
                                                    <th class="border-bottom-0">Compaign</th>
                                                    <th class="border-bottom-0 ">Phone number</th>
                                                    <th class="border-bottom-0">Server Ip</th>
                                                    <th class="border-bottom-5">Dial time </th>
                                                    <th class="border-bottom-5">Call type</th>
                                                    <th class="border-bottom-5">Priority</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>yys</td>
                                        
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td> </td>
                                                        
                                                        
                                                
                                                    
                                                </tr>
                                                <tr>
                                                        <td></td>
                                        
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                        <td></td>
                                        
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                        
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                        <td></td>
                                        
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>  
 </div>

       
    @endsection