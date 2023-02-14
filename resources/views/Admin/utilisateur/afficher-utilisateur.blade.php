@extends('Admin.layouts.superadmin-base')
@section('afficher_utilisateur')
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
            <div class="page-title">Liste des employes</div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter-utilisateur" class="btn btn-primary me-3">Ajouter un employe </a>
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
                <h4 class="card-title">Liste des Employees</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                        <thead>
                        <tr>
                            <th class="border-bottom-0 w-5">ID</th>
                            <th class="border-bottom-0 w-5">User</th>
                            <th class="border-bottom-0">Nom et prénom</th>
                            <th class="border-bottom-0 w-10">Niveau</th>
                            <th class="border-bottom-0">Groupe</th>
                            <th class="border-bottom-0">Activité</th>
                            <th class="border-bottom-0">Modifier</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tbody>

                        @isset($vicidial_users)
                            @if($vicidial_users != '')
                                @foreach($vicidial_users as $user)
                                    <tr>
                                        <td>{{$user['user_id']}}</td>
                                        <td>{{$user['user']}}</td>
                                        <td>{{$user['full_name']}}</td>
                                        <td>{{$user['user_level']}}</td>
                                        <td>{{$user['user_group']}}</td>
                                        <td>{{$user['active']}}</td>
                                        <td>
                                            <a class="btn btn-primary btn-icon btn-sm"
                                               href="modifier-utilisateur/{{$user['user_id']}}">
                                                <i class="feather feather-edit" data-bs-toggle="tooltip"
                                                   data-original-title="View/Edit"></i>
                                            </a>

                                            <a class="btn btn-danger btn-icon btn-sm" onclick="confirmDelete({{$user['user']}})" data-bs-toggle="tooltip"
                                               data-original-title="Delete"><i class="feather feather-trash-2"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        @else
                            <tr>
                                <td colspan="9">Aucune user existe</td>
                            </tr>
                        @endisset

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END ROW -->
<!-- END ROW -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function confirmDelete(user_id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this user!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    /** AJAX REQUEST **/
                    $.ajax({
                        type: 'GET',
                        url: "supprimer-utilisateur/"+user_id,

                        success: function (response) {
                            if(response.status == 200){
                                if (response.isResponseError == false) {
                                    swal("Done!", "It was succesfully deleted! " + response.content, "success", {
                                        icon: "success",
                                    });
                                    var url_user = window.location.origin + window.location.pathname;
                                    var url_user1 = (url_user).slice(0, url_user.lastIndexOf('/'));
                                    window.location.replace(url_user1+'/afficher-utilisateur');
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
                    swal("Your User is safe!");
                }
            });
    }
</script>

@endsection
