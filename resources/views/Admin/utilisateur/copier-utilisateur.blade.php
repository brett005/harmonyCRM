@extends('Admin.layouts.hr-base')
@section('copier')
@section('css')
<style>

.dark-mode .hremp-tabs .tabs-menu1 ul li a {
    background: #fffff;
    margin-top:2px;
}
.dark-mode .hremp-tabs .tabs-menu1 ul li a.active {
    background: #25274a;
    border-bottom: 0;
    color: #60ff9f;
}

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 0.4rem 1.5rem;
    position: relative;
    margin-top: 1px;


}

</style>
@endsection
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="tab-menu-heading hremp-tabs p-0 ">
                <div class="tabs-menu1">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="ms-4"><a href="#tab5" class="active" data-bs-toggle="tab">Copier utilisateur</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="card-body">
                            <form action="{{ route('copyUser') }}" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Nouveau numéro
                                                d'utilisateur</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control mb-md-0 mb-5"
                                                           name="get_agent_user_number"
                                                           placeholder="numéro d'utilisateur">
                                                    <span class="text-muted"></span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-primary">Génerer
                                                        automatiquement
                                                    </button>
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
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="get_agent_pass"
                                                   placeholder="Mot de passe">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Nom et prénom</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="get_agent_full_name"
                                                   placeholder="Nom et prénom">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="form-label mb-0 mt-2">Utilisateur source </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="get_agent_source_id"
                                                    class="form-control custom-select select2"
                                                    data-placeholder="Select">
                                                @foreach($get_users_ids as $get_users_id)
                                                    <option value="{{ $get_users_id['user'] }}"><font
                                                                style="vertical-align: inherit;"><font
                                                                    style="vertical-align: inherit;">{{ $get_users_id['user'] }}
                                                                - {{ $get_users_id['full_name'] }}</font></font>
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-outline-success" value="Enregistrer">Enregistrer<i class="fe fe-plus me-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


