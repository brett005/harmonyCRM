@extends('Admin.layouts.hr-base')
@section('admin')
    <!--PAGE HEADER -->


    <!-- PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">liste des serveurs</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-phone" class="btn btn-primary me-3">Ajouter un nouveaux Serveur</a>
                    <button class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"><i
                            class="feather feather-mail"></i></button>
                    <button class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"><i
                            class="feather feather-phone-call"></i></button>
                    <button class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"><i
                            class="feather feather-info"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">serveurs</span>
                                <h3 class="mb-0 mt-1 text-success"></h3>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="icon1 bg-success-transparent my-auto  float-end"><i class="las la-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">total serveur</span>
                                <h3 class="mb-0 mt-1 text-danger">0</h3></div>
                        </div>
                        <div class="col-5">
                            <div class="icon1 bg-danger-transparent my-auto  float-end"><i
                                    class="las la-user-friends"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">

          
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">server Liste</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">SERVER ID</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0 w-10">Server IP</th>
                                <th class="border-bottom-0">Active</th>
                                <th class="border-bottom-0">Agent</th>
                                <th class="border-bottom-0">Asterisk</th>
                                 <th class="border-bottom-0">Trunks</th>
                                  <th class="border-bottom-0">GMT</th>
                                  <th class="border-bottom-0">Modifier</th>
                            </tr>
                            </thead>
                            <tbody>
                        

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
