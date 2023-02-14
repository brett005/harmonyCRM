@extends('Admin.layouts.hr-base')
@section('admin')
    <!--PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Modifier compagne</div>
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
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab">Modifier compagne</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <h4 class="mb-4 font-weight-bold">Basic</h4>

                       <!--     <form action="route('updateCampagn', ['cpm_id' => $cpm_infos->campaign_id ]) }}" method="POST" enctype="multipart/form-data"> -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Campaign ID</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="cpm_number" class="form-control" value="{{ $cpm_infos->campaign_id }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <div class="row">

                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Campaign Name</label>
                                        </div>
                                        <div class="col-md-6">

                                            <input type="text" name="cpm_name" class="form-control mb-md-0 mb-5" value="{{ $cpm_infos->campaign_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Actif </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_actif" class="form-control custom-select select2">
                                                <option value="Y" @if( $cpm_infos->active == 'Y' ) selected @endif>Oui</option>
                                                <option value="N" @if( $cpm_infos->active == 'N' ) selected @endif>Non</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Minimum Hopper Level </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_hoper_level" class="form-control custom-select select2" >
                                                <option value="1" @if($cpm_infos->hopper_level == '1') selected @endif>1</option>
                                                <option value="5" @if($cpm_infos->hopper_level == '5') selected @endif>5</option>
                                                <option value="10" @if($cpm_infos->hopper_level == '10') selected @endif>10<option>
                                                <option value="20" @if($cpm_infos->hopper_level == '20') selected @endif>20</option>
                                                <option value="50" @if($cpm_infos->hopper_level == '50') selected @endif>50</option>
                                                <option value="100" @if($cpm_infos->hopper_level == '100') selected @endif>100</option>
                                                <option value="200" @if($cpm_infos->hopper_level == '200') selected @endif>200</option>
                                                <option value="700" @if($cpm_infos->hopper_level == '700') selected @endif>700</option>
                                                <option value="1000" @if($cpm_infos->hopper_level == '1000') selected @endif>1000</option>
                                                <option value="2000" @if($cpm_infos->hopper_level == '2000') selected @endif>2000</option>
                                                <option value="3000" @if($cpm_infos->hopper_level == '3000') selected @endif>3000</option>
                                                <option value="4000" @if($cpm_infos->hopper_level == '4000') selected @endif>4000</option>
                                                <option value="5000" @if($cpm_infos->hopper_level == '5000') selected @endif>5000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Force Reset of Hopper</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_reset_hopper" class="form-control custom-select select2">
                                                <option value='Y'>Y</option>
                                                <option value='N'>N</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Dial Method</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="cpm_dial_method" class="form-control custom-select select2">
                                                <option value='MANUAL' @if($cpm_infos->dial_method == 'MANUAL') selected @endif>MANUAL</option>
                                                <option value='RATIO' @if($cpm_infos->dial_method == 'RATIO') selected @endif>RATIO</option>
                                                <option value='INBOUND_MAN' @if($cpm_infos->dial_method == 'INBOUND_MAN') selected @endif>INBOUND_MAN</option>
                                                <option value='ADAPT_AVERAGE' @if($cpm_infos->dial_method == 'ADAPT_AVERAGE') selected @endif>ADAPT_AVERAGE</option>
                                                <option value='ADAPT_HARD_LIMIT' @if($cpm_infos->dial_method == 'ADAPT_HARD_LIMIT') selected @endif>ADAPT_HARD_LIMIT</option>
                                                <option value='ADAPT_TAPERED' @if($cpm_infos->dial_method == 'ADAPT_TAPERED') selected @endif>ADAPT_TAPERED</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="text" class="btn btn-default" onclick="confirmUpdate()" value="Modifier cette Campaigne">
                           <!-- </form> -->
                        </div>
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
                text: "You will update this Campagn!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willUpdate) => {
                    if (willUpdate) {
                        /** AJAX REQUEST **/
                        var url = window.location.origin+window.location.pathname;
                        var url_cpm = (url).slice(0, url.lastIndexOf('/') )+'/0'; console.log(url_cpm);
                        /** Get values **/
                        var cpms_array = [];

                        var cpm_number = $("[name='cpm_number']").val(); cpms_array.push(cpm_number);
                        var cpm_name = $("[name='cpm_name']").val(); cpms_array.push(cpm_name);
                        var cpm_actif = $("[name='cpm_actif']").val(); cpms_array.push(cpm_actif);
                        var cpm_hoper_level = $("[name='cpm_hoper_level']").val(); cpms_array.push(cpm_hoper_level);
                        var cpm_reset_hopper = $("[name='cpm_reset_hopper']").val(); cpms_array.push(cpm_reset_hopper);
                        var cpm_dial_method = $("[name='cpm_dial_method']").val(); cpms_array.push(cpm_dial_method);

                        $.ajax({
                            type: 'POST',
                            url: ""+url_cpm+"",
                            data: {
                                cpms_array:cpms_array
                            },
                            cache: false,
                            dataType: "json",

                            success: function (response) {
                                if (response.status == 200) {
                                    if(response.isResponseError == false){
                                        swal("Done!", "It was succesfully updated! " + response.message, "success", {
                                            icon: "success",
                                        });
                                        var url_cpm = window.location.origin + window.location.pathname;
                                        var url_cpm1 = (url_cpm).slice(0, url_cpm.lastIndexOf('/'));
                                        var url_cpm2 = (url_cpm1).slice(0, url_cpm1.lastIndexOf('/'));
                                        window.location.replace(url_cpm2+'/liste-compagne');
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
                        swal("Your Campagn is safe!");
                    }
                });
        }
    </script>
@endsection
