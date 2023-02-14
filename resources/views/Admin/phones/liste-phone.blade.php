@extends('Admin.layouts.superadmin-base')
@section('liste_phone')
    <!--PAGE HEADER -->


    <!-- PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Phones</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-phone" class="btn btn-primary me-3">Ajouter un nouveaux téléphone</a>
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
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Total Téléphone</span>
                                <h3 class="mb-0 mt-1 text-success">{{ $countPhones }}</h3>
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
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Total nouveaux Téléphone</span>
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

            @if(session()->get('message') != "")
                @if(session()->get('message')[0] == "SUCCESS")
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success: </strong>{{session()->get('message')[1]}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            @endif

            @if(session()->get('message') != "")
                @if(session()->get('message')[0] == "ERROR")
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('message')[1] }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            @endif

            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">Phones Liste</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">extension</th>
                                <th class="border-bottom-0">protocol</th>
                                <th class="border-bottom-0 w-10">liste_phone</th>
                                <th class="border-bottom-0">dialplan_number</th>
                                <th class="border-bottom-0">status</th>
                                <th class="border-bottom-0">fullname</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($phone_list != '')
                              @foreach($phone_list as $phone)
                                  <tr>
                                      <td>{{ $phone->extension }}</td>
                                      <td>{{ $phone->protocol }}</td>
                                      <td>{{ $phone->server_ip }}</td>
                                      <td>{{ $phone->dialplan_number }}</td>
                                      <td>{{ $phone->status }}</td>
                                      <td>{{ $phone->fullname }}</td>
                                      <td>
                                          <a class="btn btn-primary btn-icon btn-sm" href="modifier-telephone/{{ $phone->login }}">
                                              <i class="feather feather-edit" data-bs-toggle="tooltip"
                                                 data-original-title="View/Edit"></i>
                                          </a>
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
        @endsection
        @section('script')
            <!-- STAR RATING JS -->
            <script src="{{asset('assets/plugins/rating/jquery-rate-picker.js')}}"></script>
            <script src="{{asset('assets/plugins/rating/rating-picker.js')}}"></script>

            <!-- INTERNAL  DATEPICKER JS -->
            <script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>

            <!-- INTERNAL INDEX JS -->
            <script src="{{asset('assets/js/hr/compagne3.js')}}"></script>

            <!-- THEME COLOR JS -->
            <script src="{{asset('assets/js/themeColors.js')}}"></script>
@endsection
