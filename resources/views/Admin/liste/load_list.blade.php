@extends('Admin.layouts.hr-base')
@section('load_list')
@section('css3')
<style>
.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 1.5rem 1.5rem;
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
    <!-- APP-CONTENT -->

    <!--PAGE HEADER -->
   <!-- <div class="page-header d-xl-flex d-block">
        <div class="page-leftheader">
            <div class="page-title">Charger de nouveaux prospects</div>
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
    </div>-->
    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
               <div class="tab-menu-heading hremp-tabs p-0 ">
                        <div class="tabs-menu1">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs">
                                <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab"> Load new liste</a>
                                </li>
                            </ul>
                        </div>
                 </div>
                <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                    <div class="tab-content">
                        <form action="{{ route('import_leads') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-pane active" id="tab5">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Charger les prospects à partir de ce
                                                    fichier : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="file" name="upload_file"
                                                           id="upload_file" required>
                                                    @if ($errors->has('upload_file'))
                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('upload_file') }}</strong>
                                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Remplacement de l'ID de liste
                                                    : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="get_list_selected"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="Oui" required>

                                                    <option value="in_file" selected="yes"><font
                                                            style="vertical-align: inherit;"><font
                                                                style="vertical-align: inherit;">Charger à partir du
                                                                fichier de prospect</font></font></option>
                                                    @foreach($lists as $list)
                                                        <option value="{{ $list['list_id'] }}"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">{{ $list['list_id'] }}
                                                                    - {{ $list['list_name'] }}</font></font></option>
                                                    @endforeach

                                                </select>

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Remplacement du code téléphonique
                                                    : </label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="phone_code_override"
                                                        class="form-control custom-select select2"
                                                        data-placeholder=" - NONE - ">

                                                    <option value="in_file" selected="yes"><font
                                                            style="vertical-align: inherit;"><font
                                                                style="vertical-align: inherit;">Charger à partir du
                                                                fichier de prospect</font></font></option>
                                                    @foreach($vicidial_codes as $phone_code)
                                                        <option value="{{ $phone_code['country_code'] }}"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">{{ $phone_code['country_code'] }}
                                                                    - {{ $phone_code['country'] }}</font></font>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label mb-0 mt-2">Format de fichier à utiliser
                                                    :</label>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="text-wrap">

                                                    <div class="example">
                                                        <div class="btn-list radiobtns mt-2">
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic radio toggle button group">
                                                                <input type="radio" class="btn-check" name="btnradio"
                                                                       id="btnradio111" checked="">
                                                                <label class="btn btn-outline-primary"
                                                                       for="btnradio111">Format standard </label>
                                                                <input type="radio" class="btn-check" name="btnradio"
                                                                       id="btnradio222">
                                                                <label class="btn btn-outline-primary"
                                                                       for="btnradio222">Mise en page
                                                                    personnalisée </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                 <div class="card-footer text-end">
                                <button type="submit" class="btn btn-outline-success"name="Ajouter" id="" value="Ajouter"
                                                       class="btn btn-primary">Sauvegarder<i class="fe fe-plus me-2"></i></button>
                                  </div>
                                <div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
         
            <!-- END ROW -->

            <!-- APP-CONTENT END -->

            <!-- PAGE-MAIN END -->
@endsection




