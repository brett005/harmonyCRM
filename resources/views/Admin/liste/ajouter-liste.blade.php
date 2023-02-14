@extends('Admin.layouts.hr-base')
@section('ajouter')
@section('css3')
<style>
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.4rem 1.5rem;
    position: relative;
    margin-top: 0px;
}
.dark-mode .hremp-tabs .tabs-menu1 ul li a {
    background: #fffff;
    margin-top: 5px;
}
.dark-mode .hremp-tabs .tabs-menu1 ul li a.active {
    background: #25274a;
    border-bottom: 0;
    color: #60ff9f;
}
</style>
@endsection
    <!--<div class="side-app main-container">-->
        <!--PAGE HEADER -->
       
        <!--END PAGE HEADER -->

        <!-- ROW -->
        <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="tab-menu-heading hremp-tabs p-0 ">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"> <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M13 4H6v16h12V9h-5V4zm3 14H8v-2h8v2zm0-6v2H8v-2h8z" opacity=".3"></path><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"></path></svg> Ajouter une liste</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                  
                    <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab5">
                                <form action="{{ route('addList') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label mb-0 mt-2">Identifiant de la liste</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input id="list_id" type="text" class="form-control" name="list_id"
                                                           placeholder="Numéro" required>
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
                                                           name="list_name" placeholder="Nom Liste" required>
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
                                                            <option
                                                                value="{{ $cpm['campaign_id'] }}">{{ $cpm['campaign_id'] }}
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

                                  <div class="card-footer text-end">
                                     <button type="submit" class="btn btn-outline-success"name="Ajouter" id="" value="Ajouter"
                                                       class="btn btn-primary">Sauvegarder<i class="fe fe-plus me-2"></i></button>
                                  </div>
                                        


                                        </div>
                                    </div>
                                </form>
                            </div>

            </div>


            @endsection
            