@extends('Admin.layouts.hr-base')
@section('import_leads')

    <!-- APP-CONTENT -->

    <!--PAGE HEADER -->
    <div class="page-header d-xl-flex d-block">
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
    </div>
    <!--END PAGE HEADER -->

    <!-- ROW -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card box-widget widget-user">
                <div class="card-body text-center">

                </div>


                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="tab-menu-heading hremp-tabs p-0 ">
                        <h4>Votre fichier sélectionner est <strong>@if($filename != '')
                                    {{ $filename }}
                                @else
                                    Vide
                                @endif</strong> de Format : {{ $file_extension }} </h4>
                        <h4>Votre List sélectionner est du numéro <strong>@if($list_id != '')
                                    {{ $list_id }}
                                @else
                                    Vide
                                @endif</strong></h4>
                        <h4>Votre Indicatif sélectionner est <strong>@if($phone_code != '')
                                    {{ $phone_code }}
                                @else
                                    Vide
                                @endif</strong></h4>
                        <br>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body hremp-tabs1 p-0">
                    <div class="tab-content">
                        <form action="{{ route('import_thisLeads') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="list_id" value="{{ $list_id }}" hidden>
                            <input type="text" name="phone_code" value="{{ $phone_code }}" hidden>
                            <input type="text" name="file_path" value="{{ $file_path }}" hidden>
                            <input type="text" name="file_name" value="{{ $filename }}" hidden>
                            
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">CODE PRINCIPAL DU VENDEUR : </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="CODE_PRINCIPAL_DU_VENDEUR_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select" selected>Seléctionner CODE
                                                        PRINCIPAL DU VENDEUR SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">ID SOURCE :</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="ID_SOURCE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner ID SOURCE SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">TITRE: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="TITRE_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un titre SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">PRÉNOM: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="PRENOM_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner Prénon SVP</option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">INITIALE: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="INITIALE_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner Initiale SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">NOM DE FAMILLE:</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="NOM_DE_FAMILLE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner Un Nom du famille
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">NUMÉRO DE TÉLÉPHONE: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="NUMERO_DE_TELEPHONE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner Initiale SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">TÉLÉPHONE SUPPLÉMENTAIRE:</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="TELEPHONE_SUPPLEMENTAIRE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner Un Nom du famille
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">ADRESSE 1: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="ADRESSE_1_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une addresse 1
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">ADRESSE 2: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="ADRESSE_2_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une addresse 2
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">ADRESSE 3: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="ADRESSE_3_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une addresse 3
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">VILLE</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="VILLE_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une ville SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">ETAT: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="ETAT_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une etat SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">PROVINCE: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="PROVINCE_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une province SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">CODE POSTAL: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="CODE_POSTAL_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un code postale
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">CODE PAYS: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="CODE_PAYS_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un code pays SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">LE GENRE: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="LE_GENRE_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner le genre SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">DATE DE NAISSANCE: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="DATE_DE_NAISSANCE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une date de
                                                        naissance SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">E-MAIL: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="E_MAIL_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un E-mail SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">MENTION DE SÉCURITÉ :</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="MENTION_DE_SECURITE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner une mention de
                                                        sécurité SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">COMMENTAIRES: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="COMMENTAIRES_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un commentaire
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">RANG: </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="RANG_INDEX" class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un rang SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-2">
                                        <label class="form-label mb-0 mt-2">PROPRIÉTAIRE: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select name="PROPRIETAIRE_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un propriétaire
                                                        SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="form-label mb-0 mt-2">CHAMPSTEST : </label>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="CHAMPSTEST_INDEX"
                                                        class="form-control custom-select select2"
                                                        data-placeholder="test">
                                                    <option value="null" label="Select">Seléctionner un CHAMPSTEST SVP
                                                    </option>
                                                    @foreach($header as $firstRow)
                                                        <option
                                                            value="{{ array_search($firstRow, $header) }}">{{ $firstRow }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-success btn-lg mb-1" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END ROW -->

            <!-- APP-CONTENT END -->

            <!-- PAGE-MAIN END -->
@endsection
