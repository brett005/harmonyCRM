@extends('Admin.layouts.hr-base')
@section('admin')

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
            <div class="page-title">  <i class="fa fa-file" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-file" aria-label="fa fa-file"></i> LISTES DE TEMPS D'APPEL </div>
        </div>
        <div class="page-rightheader ms-md-auto">
            <div class="align-items-end flex-wrap my-auto right-content breadcrumb-right">
                <div class="btn-list">
                    <a href="ajouter_temps" class="btn btn-primary me-3">Ajouter un temps d'appel</a>
                     <a href="load_list" class="btn btn-primary me-3">Ajouter heure d'appel</a>
                     <a href="load_list" class="btn btn-primary me-3">Afficher les heures d'appel </a>
               
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER -->


    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="card-title">  <i class="fa fa-file-excel-o" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-file-excel-o" aria-label="fa fa-file-excel-o"></i> LISTE TEMPS</h4>
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
                                <th class="border-bottom-0 w-5">Id d'appel</th>
                                <th class="border-bottom-0">Noms d'appel</th>
                                <th class="border-bottom-0 w-10"> Demarrage par defaut</th>
                                <th class="border-bottom-0 w-10"> Arret par defaut</th>
                                <th class="border-bottom-0 w-10"> Groupe d'administration </th>
                                <th class="border-bottom-0"> Modifier</th>


                            </tr>
                            </thead>
                            <tbody>

                     
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                      
                                            <a href="modifier_call" class="btn btn-danger btn-icon btn-sm"  data-bs-toggle="tooltip"
                                               data-original-title="Delete"><i class="feather feather-edit"></i>
                                            </a>

                                        </td>


                                    </tr>
                     
                                <tr>
                                    <td colspan="9">Aucune liste existe</td>
             

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- PAGE-MAIN END -->

@endsection
