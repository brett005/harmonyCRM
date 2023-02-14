@extends('Admin.layouts.superadmin-base')
@section('liste')
@section('css-liste')
<style>
.btn-sm, .btn-group-sm>.btn {
    padding: 0.01rem 0.125rem;
    font-size: 0.01rem;
    border-radius: 0.2rem;
}
.table td {
    padding: 0.1rem;
    vertical-align: middle;
    border-top: 0;
}
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.3rem 1rem 0rem  1rem;
    position: relative;
}
</style>
@endsection

    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">  <i class="fa fa-file" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-file" aria-label="fa fa-file"></i> Afficher Liste</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-liste" class="btn btn-primary me-3">Ajouter une liste</a>
                     <a href="load_list" class="btn btn-primary me-3">load liste</a>
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


    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">  <i class="fa fa-file-excel-o" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-file-excel-o" aria-label="fa fa-file-excel-o"></i> LIST LISTINGS</h4>
                </div>

                @if(session()->get('message') != "")
                    @if(session()->get('message')[0] == "SUCCESS")
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success: </strong>{{session()->get('message')[1]}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="lnr-text-align-right">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif

                @if(session()->get('message') != "")
                    @if(session()->get('message')[0] == "ERROR")
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session()->get('message')[1] }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" class="lnr-text-align-right">&times;</span>
                            </button>
                        </div>
                    @endif
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                            <thead>
                            <tr>
                                <th class="border-bottom-0 w-5">LIst id</th>
                                <th class="border-bottom-0"> LISTE DE NOMS</th>
                                <th class="border-bottom-0 w-10"> LA DESCRIPTION</th>
                                <th class="border-bottom-0"> Modifier</th>


                            </tr>
                            </thead>
                            <tbody>

                            @isset($lists)
                                @foreach($lists as $liste)
                                    <tr>
                                        <td>{{ $liste['list_id'] }}</td>
                                        <td>{{ $liste['list_name'] }}</td>
                                        <td>{{ $liste['list_description'] }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-icon btn-sm"
                                               href="{{ route('updateListe', ['list_id' => $liste['list_id'] ]) }}">
                                                <i class="feather feather-edit" data-bs-toggle="tooltip"
                                                   data-original-title="View/Edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-icon btn-sm" onclick="confirmDelete({{ $liste['list_id'] }})" data-bs-toggle="tooltip"
                                               data-original-title="Delete"><i class="feather feather-trash-2"></i>
                                            </a>

                                        </td>


                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="9">Aucune liste existe</td>
                                </tr>
                            @endisset

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- PAGE-MAIN END -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmDelete(list_id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this List!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    /** AJAX REQUEST **/
                    $.ajax({
                        type: 'GET',
                        url: "supprimer-liste/"+list_id,

                        success: function (response) {
                            if (response.status == 200) {
                                if(response.isResponseError == false){
                                    swal("Done!", "It was succesfully deleted! " + response.content, "success", {
                                        icon: "success",
                                    });
                                    var url_list = window.location.origin + window.location.pathname;
                                    var url_list1 = (url_list).slice(0, url_list.lastIndexOf('/'));
                                    //var url_cpm2 = (url_cpm1).slice(0, url_cpm1.lastIndexOf('/'));
                                    window.location.replace(url_list1+'/afficher-liste');
                                }else{
                                    swal("Done!", response.content, "error", {
                                        icon: "error",
                                    });
                                }
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
                    swal("Your list is safe!");
                }
            });
    }
</script>
@endsection
