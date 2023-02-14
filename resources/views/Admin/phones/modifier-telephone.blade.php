@extends('Admin.layouts.hr-base')
@section('modifier-telephone')
    <!--PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Modifier Téléphone</div>
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
        <div class="col-xl-9 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab">Modifier téléphone</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold">Basic</h4>
                        <!--    <form action=" route('updatePhone', ['phone_login' => 1]) }}" method="POST" enctype="multipart/form-data"> -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Phone Login</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="number" class="form-control" value="{{ $get_phone_informations->login }}" name="get_phone_login">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Phone Pass</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control fc-datepicker"
                                                   name="get_phone_pass" value="{{ $get_phone_informations->pass }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Phone Full Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control fc-datepicker"
                                                   name="get_phone_full_name" value="{{ $get_phone_informations->fullname }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Phone Extension </label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control mb-md-0 mb-9"
                                                           name="get_phone_extension" value="{{ $get_phone_informations->extension }}">
                                                    <span class="text-muted"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Dial Plan Number</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="get_dialplan_number"
                                                   value="{{ $get_phone_informations->dialplan_number }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Voice Mail Box</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="get_voicemail_id" value="{{ $get_phone_informations->voicemail_id }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Outbound CallerID</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="get_outbound_cid" value="{{ $get_phone_informations->outbound_cid }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Admin user groupe</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="get_admin_user_group" class="form-control custom-select select2" data-placeholder="Select">
                                                <option label="Select"></option>
                                                <option value="---ALL---"  @if($get_phone_informations->user_group == "---ALL---") selected @endif>---ALL---</option>
                                                @if($vicidial_user_groups != '')
                                                    @foreach($vicidial_user_groups as $vicidial_user_group)
                                                        <option value="{{ $vicidial_user_group['user_group'] }}"  @if($get_phone_informations->user_group == $vicidial_user_group['user_group']) selected @endif>{{ $vicidial_user_group['user_group'] }} - {{ $vicidial_user_group['group_name'] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Server IP</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="get_server_ip"
                                                    class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                <option label="Select"></option>
                                                @if($get_the_servers_ip != '')
                                                    @foreach($get_the_servers_ip as $server_ip)
                                                        <option value="{{ $server_ip->server_ip }}" @if($server_ip->server_ip == $get_phone_informations->server_ip) selected @endif> {{ $server_ip->server_ip }}  - {{ $server_ip->server_description }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <input type="text" class="btn btn-primary" onclick="confirmUpdate()" value="Modifier">
                                </div>
                         <!--   </form> -->
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
            //console.log(window.location.origin+window.location.pathname);
            swal({
                title: "Are you sure?",
                //text: "Once deleted, you will not be able to recover this imaginary file!",
                text: "You will update this Phone!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willUpdate) => {
                    if (willUpdate) {
                        /** AJAX REQUEST **/
                        var url = window.location.origin+window.location.pathname;
                        var url_phone = (url).slice(0, url.lastIndexOf('/') )+'/0';
                        /** Get values **/
                        var phones_array = [];

                        var get_phone_login = $("[name='get_phone_login']").val(); phones_array.push(get_phone_login);
                        var get_phone_pass = $("[name='get_phone_pass']").val(); phones_array.push(get_phone_pass);
                        var get_phone_full_name = $("[name='get_phone_full_name']").val(); phones_array.push(get_phone_full_name);
                        var get_phone_extension = $("[name='get_phone_extension']").val(); phones_array.push(get_phone_extension);
                        var get_dialplan_number = $("[name='get_dialplan_number']").val(); phones_array.push(get_dialplan_number);
                        var get_voicemail_id = $("[name='get_voicemail_id']").val(); phones_array.push(get_voicemail_id);
                        var get_outbound_cid = $("[name='get_outbound_cid']").val(); phones_array.push(get_outbound_cid);
                        var get_admin_user_group = $("[name='get_admin_user_group']").val(); phones_array.push(get_admin_user_group);
                        var get_server_ip = $("[name='get_server_ip']").val(); phones_array.push(get_server_ip);

                        $.ajax({
                            type: 'POST',
                            url: ""+url_phone+"",
                            data: {
                                phones_array:phones_array
                            },
                            cache: false,
                            dataType: "json",

                            success: function (response) {
                                if (response.status == 200) {
                                    if(response.isResponseError == false){
                                        swal("Done!", "It was succesfully updated! " + response.message, "success", {
                                            icon: "success",
                                        });
                                        var url_phone = window.location.origin + window.location.pathname;
                                        var url_phone1 = (url_phone).slice(0, url_phone.lastIndexOf('/'));
                                        var url_phone2 = (url_phone1).slice(0, url_phone1.lastIndexOf('/'));
                                        window.location.replace(url_phone2+'/liste-phone');
                                    }else{
                                        swal("Done!", response.message, "error", {
                                            icon: "error",
                                        });
                                    }
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
                        swal("Your Phone is safe!");
                    }
                });
        }
    </script>
@endsection


