@extends('Admin.layouts.hr-base')
@section('ajouter')
    <!--PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Modifier un utilisateur <i class="fa fa-pencil-square-o" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-pencil-square-o" aria-label="fa fa-pencil-square-o"></i></div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
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
    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"> <i class="fa fa-pencil-square-o" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-pencil-square-o" aria-label="fa fa-pencil-square-o"></i> Modifier utilisateur</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold">Basic</h4>
                         <!--   <form action=" route('updateUser', ['user_id' => $update_user['user_id'] ]) }}"
                                  method="POST" enctype="multipart/form-data">  -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Numéro d'utilisateur </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control mb-md-0 mb-9"
                                                           name="get_agent_user" value="{{ $update_user['user'] }}"
                                                           placeholder="" disabled>
                                                    <span class="text-muted"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Mot de passe</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="get_agent_pass"
                                                   value="{{ $update_user['pass'] }}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Nom et prénom</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="get_agent_full_name"
                                                   value="{{ $update_user['full_name'] }}" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Niveau de l'utilisateur</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="get_agent_level" class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                <option value="1"
                                                        @if( $update_user['user_level'] == '1') selected @endif>1
                                                </option>
                                                <option value="2"
                                                        @if( $update_user['user_level'] == '2') selected @endif>2
                                                </option>
                                                <option value="3"
                                                        @if( $update_user['user_level'] == '3') selected @endif>3
                                                </option>
                                                <option value="4"
                                                        @if( $update_user['user_level'] == '4') selected @endif>4
                                                </option>
                                                <option value="5"
                                                        @if( $update_user['user_level'] == '5') selected @endif>5
                                                </option>
                                                <option value="6"
                                                        @if( $update_user['user_level'] == '6') selected @endif>6
                                                </option>
                                                <option value="7"
                                                        @if( $update_user['user_level'] == '7') selected @endif>7
                                                </option>
                                                <option value="8"
                                                        @if( $update_user['user_level'] == '8') selected @endif>8
                                                </option>
                                                <option value="9"
                                                        @if( $update_user['user_level'] == '9') selected @endif>9
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Active</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="get_agent_active" class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                <option value="Y" @if($update_user['active'] == 'Y') selected @endif>Y
                                                </option>
                                                <option value="N" @if($update_user['active'] == 'N') selected @endif>N
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Groupe d'utilisateurs :</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="get_agent_user_group"
                                                    class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                @if($vicidial_user_groups != '')
                                                    @foreach($vicidial_user_groups as $vicidial_user_group)
                                                        <option value="{{ $vicidial_user_group['user_group'] }}"
                                                                @if($update_user['user_group'] == $vicidial_user_group['user_group']) selected @endif>{{ $vicidial_user_group['user_group'] }}
                                                            - {{ $vicidial_user_group['group_name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Forfait téléphonique login</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="get_agent_phone_login"
                                                   value="{{ $update_user['phone_login'] }}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Forfait téléphonique pass</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control fc-datepicker"
                                                   name="get_agent_phone_pass" value="{{ $update_user['phone_pass'] }}"
                                                   placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-end">
                                    <input type="input" class="btn btn-primary" onclick="confirmUpdate()" value="Modifier">
                                </div>
                          <!--  </form> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END ROW -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function confirmUpdate() {
            console.log(window.location.origin+window.location.pathname);
            swal({
                title: "Are you sure?",
                //text: "Once deleted, you will not be able to recover this imaginary file!",
                text: "You will update this User!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willUpdate) => {
                    if (willUpdate) {
                        /** AJAX REQUEST **/
                        var url = window.location.origin+window.location.pathname;
                        var url_user = (url).slice(0, url.lastIndexOf('/') )+'/0';
                        /** Get values **/
                        var users_array = [];

                        var get_agent_user = $("[name='get_agent_user']").val(); users_array.push(get_agent_user);
                        var get_agent_pass = $("[name='get_agent_pass']").val(); users_array.push(get_agent_pass);
                        var get_agent_full_name = $("[name='get_agent_full_name']").val(); users_array.push(get_agent_full_name);
                        var get_agent_level = $("[name='get_agent_level']").val(); users_array.push(get_agent_level);
                        var get_agent_active = $("[name='get_agent_active']").val(); users_array.push(get_agent_active);
                        var get_agent_user_group = $("[name='get_agent_user_group']").val(); users_array.push(get_agent_user_group);
                        var get_agent_phone_login = $("[name='get_agent_phone_login']").val(); users_array.push(get_agent_phone_login);
                        var get_agent_phone_pass = $("[name='get_agent_phone_pass']").val(); users_array.push(get_agent_phone_pass);
                        console.log(url_user);
                        $.ajax({
                            type: 'POST',
                            url: ""+url_user+"",
                            data: {
                                users_array:users_array
                            },
                            cache: false,
                            dataType: "json",

                            success: function (response) {
                                if (response.status == 200) {
                                    swal("Done!", "It was succesfully updated! " + response.message, "success", {
                                        icon: "success",
                                    });
                                    var url_user = window.location.origin + window.location.pathname;
                                    var url_user1 = (url_user).slice(0, url_user.lastIndexOf('/'));
                                    var url_user2 = (url_user1).slice(0, url_user1.lastIndexOf('/'));
                                    window.location.replace(url_user2+'/afficher-utilisateur');
                                }else{
                                    swal("Done!", response.message, "error", {
                                        icon: "error",
                                    });
                                }

                            },

                            error: function (xhr, ajaxOptions, thrownError) {
                                swal("Error updatting!", "Please try again ", "error");
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


