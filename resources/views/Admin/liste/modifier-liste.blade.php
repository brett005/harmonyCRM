@extends('Admin.layouts.hr-base')
@section('modifier')


        <!--END PAGE HEADER -->

        <!-- ROW -->
        <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
             <div class="tab-menu-heading hremp-tabs p-0 ">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab">Ajouter une liste</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab5">
                           <!--     <form action= route('updateListe', ['list_id' => $lists['list_id'] ]) }} method="POST"
                                      enctype="multipart/form-data"> -->

                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label mb-0 mt-2">Identifiant de la liste</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="list_id" type="text" class="form-control" name="list_id" value="{{ $lists['list_id'] }}" placeholder="Numéro" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">

                                            <div class="row">

                                                <div class="col-md-3">
                                                    <label class="form-label mb-0 mt-2">Nom de la liste</label>
                                                </div>
                                                <div class="col-md-6">

                                                    <input id="list_name" type="text" class="form-control mb-md-0 mb-5"
                                                           value="{{ $lists['list_name'] }}" name="list_name"
                                                           placeholder="Nom Liste" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label mb-0 mt-2">Déscription de la liste </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="list_description" type="text" class="form-control"
                                                           value="{{ $lists['list_description'] }}"
                                                           name="list_description" placeholder="Déscription de la liste"
                                                           required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label mb-0 mt-2">Compagne</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="cpm_id" name="cpm_id" required>
                                                        <option value=""> Sélectionner une campaign SVP</option>
                                                        @foreach($cpms as $cpm)
                                                            <option value="{{ $cpm['campaign_id'] }}"
                                                                    selected>{{ $cpm['campaign_id'] }}
                                                                - {{ $cpm['campaign_name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label mb-0 mt-2">Actif </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="active_y_n" class="form-control custom-select select2"
                                                            data-placeholder="Oui" required>
                                                        <option label="Oui"></option>
                                                        <option value="Y">Oui</option>
                                                        <option value="N">Non</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-9">

                                            </div>
                                            <div class="col-md-3">
                                                </BR>
                                                <input type="text" name="Ajouter" id="" onclick="confirmUpdate()" value="Modifier" class="btn btn-primary">
                                                <div class="form-group ">
                                                </div>
                                            </div>
                                        </div>
                                        <div>


                                        </div>
                                    </div>
                              <!--  </form> -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- END ROW -->
            </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            function confirmUpdate() {
                console.log(window.location.origin+window.location.pathname);
                swal({
                    title: "Are you sure?",
                    //text: "Once deleted, you will not be able to recover this imaginary file!",
                    text: "You will update this List!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willUpdate) => {
                        if (willUpdate) {
                            /** AJAX REQUEST **/
                            var url = window.location.origin+window.location.pathname;
                            var url_list = (url).slice(0, url.lastIndexOf('/') )+'/0';
                            /** Get values **/
                            var lists_array = [];

                            var list_id = $("[name='list_id']").val(); lists_array.push(list_id);
                            var list_name = $("[name='list_name']").val(); lists_array.push(list_name);
                            var list_description = $("[name='list_description']").val(); lists_array.push(list_description);
                            var cpm_id = $("[name='cpm_id']").val(); lists_array.push(cpm_id);
                            var active_y_n = $("[name='active_y_n']").val(); lists_array.push(active_y_n);

                            $.ajax({
                                type: 'POST',
                                url: ""+url_list+"",
                                data: {
                                    lists_array:lists_array
                                },
                                cache: false,
                                dataType: "json",

                                success: function (response) {
                                    if (response.status == 200) {
                                        swal("Done!", "It was succesfully updated! " + response.message, "success", {
                                            icon: "success",
                                        });
                                        var url_list = window.location.origin + window.location.pathname;
                                        var url_list1 = (url_list).slice(0, url_list.lastIndexOf('/'));
                                        var url_list2 = (url_list1).slice(0, url_list1.lastIndexOf('/'));
                                        window.location.replace(url_list2+'/afficher-liste');
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
                            swal("Your List is safe!");
                        }
                    });
            }
        </script>
 @endsection
