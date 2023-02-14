@extends('Admin.layouts.hr-base')
@section('admin')
    <!--PAGE HEADER -->


    <!-- PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Campagnes</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-compagne" class="btn btn-primary me-3">Ajouter une nouvelle campagne</a>
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

    <!-- ROW -->
    <div class="row">
        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Total Campagne</span>
                                <h3 class="mb-0 mt-1 text-success">{{ $countCpm }}</h3>
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
                            <div class="mt-0 text-start"><span class="font-weight-semibold">Total nouveaux Campagne</span>
                                <h3 class="mb-0 mt-1 text-danger">{{ $countNewCpm }}</h3></div>
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
                    <h4 class="card-title">Campagne Liste</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">ID</th>
                                <th class="border-bottom-0">Campagne</th>
                                <th class="border-bottom-0 w-10">Active</th>
                                <th class="border-bottom-0">Groupe</th>
                                <th class="border-bottom-0">Dial Method</th>
                                <th class="border-bottom-0">Level</th>
                                <th class="border-bottom-0">Lead Order</th>
                                <th class="border-bottom-0">Dial Status</th>
                                <th class="border-bottom-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($list_cpm != '')
                              @foreach($list_cpm as $cpms)
                                  <tr>
                                      <td>{{ $cpms['campaign_id'] }}</td>
                                      <td>{{ $cpms['campaign_name'] }}</td>
                                      <td>{{ $cpms['active'] }}</td>
                                      <td>{{ $cpms['user_group'] }}</td>
                                      <td>{{ $cpms['dial_method'] }}</td>
                                      <td>{{ $cpms['dial_level'] }}</td>
                                      <td>{{ $cpms['lead_order'] }}</td>
                                      <td>{{ $cpms['dial_statuses'] }}</td>
                                      <td>
                                          <a class="btn btn-primary btn-icon btn-sm"  href="modifier-compagne/{{$cpms['campaign_id']}}" >
                                              <i class="feather feather-edit" data-bs-toggle="tooltip"
                                                 data-original-title="View/Edit"></i>
                                          </a>

                                          <a class="btn btn-danger btn-icon btn-sm" onclick="confirmDelete({{ $cpms['campaign_id'] }})" data-bs-toggle="tooltip"
                                             data-original-title="Delete"><i class="feather feather-trash-2"></i>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function confirmDelete(cpm_id) {
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this campagn!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            /** AJAX REQUEST **/
                            $.ajax({
                                type: 'GET',
                                url: "supprimer-compagne/"+cpm_id,

                                success: function (response) {
                                    if (response.message == "SUCCESS") {
                                        swal("Done!", "It was succesfully deleted! " + response.content, "success", {
                                            icon: "success",
                                        });
                                        var url_cpm = window.location.origin + window.location.pathname;
                                        var url_cpm1 = (url_cpm).slice(0, url_cpm.lastIndexOf('/'));
                                        //var url_cpm2 = (url_cpm1).slice(0, url_cpm1.lastIndexOf('/'));
                                        window.location.replace(url_cpm1+'/liste-compagne');
                                    }else{
                                        swal("Done!", response.content, "error", {
                                            icon: "error",
                                        });
                                    }

                                },

                                error: function (xhr, ajaxOptions, thrownError) {
                                    swal("Error deletting!", "Please try again ", "error");
                                }
                            })
                            /*swal("Poof! Your imaginary file has been deleted!", {
                                icon: "success",
                            });*/
                        } else {
                            swal("Your campagn is safe!");
                        }
                    });
            }
        </script>
@endsection
