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
                <h4 class="card-title">Liste des conferences</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="hr-table">
                        <thead>
                        <tr>
                            <th class="border-bottom-0 w-5">Conferance</th>
                            <th class="border-bottom-0 w-5">IP serveur</th>
                            <th class="border-bottom-0">Extention</th>
                            <th class="border-bottom-0">Modifier</th>

                        </tr>
                        </thead>
                        <tbody>

                        <tbody>

                        @isset($vicidial_users)
                            @if($vicidial_users != '')
                                @foreach($vicidial_users as $user)
                                    <tr>
                                          <td></td>
                                         <td></td>
                                        <td></td>
                                        <td>
                                            <a class="btn btn-primary btn-icon btn-sm"
                                               href="modifier-utilisateur/{{$user['user_id']}}">
                                                <i class="feather feather-edit" data-bs-toggle="tooltip"
                                                   data-original-title="View/Edit"></i>
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

                    <table width="700" cellspacing="3">
<tbody><tr height="250"><td align="center" valign="bottom"><font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">STATUT</font></font></b></font></td>
<td align="center" valign="bottom"><font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DESCRIPTION</font></font></b></font></td>
<td align="center" valign="bottom"><font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CATÉGORIE</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AGENT SÉLECTIONNABLE</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">RÉPONSE HUMAINE</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VENTE</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DNC</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CONTACT CLIENT</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PAS INTÉRESSÉ</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IMPRATICABLE</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">RAPPEL PROGRAMMÉ</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">COMPLÉTÉ</font></font></b></font></td>
<td align="center" valign="top"><font size="2" class="vertical-text"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">RÉPONDEUR AUTOMATIQUE</font></font></b></font></td>
<td align="center" valign="bottom"><font size="1"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MIN SEC</font></font></b></font></td>
<td align="center" valign="bottom"><font size="1"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SEC MAX</font></font></b></font></td>
<td align="center" valign="bottom"><font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MODIFIER/EFFACER</font></font></b></font></td>
</tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="A">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UN</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Answering Machine"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=A&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=A&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="AA">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AA</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Answering Machine Auto"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AA&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AA&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="AB">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UN B</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Busy Auto"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AB&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AB&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="ADC">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ADC</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Disconnected Number Auto"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=ADC&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=ADC&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="ADCT">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ADCT</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Disconnected Number Temporary"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=ADCT&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=ADCT&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="AFAX">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AFAX</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Fax Machine Auto"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AFAX&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AFAX&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="AFTHRS">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">APRÈS</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Inbound After Hours Drop"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AFTHRS&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AFTHRS&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="AL">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">AL</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Answering Machine Msg Played"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AL&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AL&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="AM">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUIS</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Answering Machine SentToMesg"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AM&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=AM&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="B">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">B</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Busy"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="CALLBK">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">APPELBK</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Call Back"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=CALLBK&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=CALLBK&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="CBHOLD">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CBHOLD</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Call Back Hold"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=CBHOLD&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=CBHOLD&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DAIR">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DAIRE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Dead Air"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DAIR&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DAIR&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DC">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CC</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Disconnected Number"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DC&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DC&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DEC">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DÉC</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Declined Sale"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DEC&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DEC&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DNC">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DNC</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="DO NOT CALL"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DNCC">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DNCC</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="DO NOT CALL Hopper Camp Match"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DNCC&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DNCC&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DNCL">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LNNTE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="DO NOT CALL Hopper Sys Match"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DNCL&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=DNCL&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="DROP">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">GOUTTE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Agent Not Available"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="ERI">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IRE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Agent Error"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=ERI&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=ERI&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="INCALL">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">INCALL</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Lead Being Called"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="IQNANQ">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IQNANQ</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="InQueue No-Agent-No-Queue drop"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=IQNANQ&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=IQNANQ&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="IVRXFR">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">IVRXFR</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Outbound drop to Call Menu"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=IVRXFR&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=IVRXFR&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="LRERR">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LRRR</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Outbound Local Channel Res Err"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=LRERR&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=LRERR&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="LSMERG">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">LSMERG</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Agent lead search old lead mrg"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=LSMERG&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=LSMERG&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="MAXCAL">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAXCAL</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Inbound Max Calls Drop"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=MAXCAL&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=MAXCAL&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="MLINAT">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MLINAT</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Multi-Lead auto-alt set inactv"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=MLINAT&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=MLINAT&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="N">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="No Answer"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=N&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=N&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="NA">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N / A</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="No Answer AutoDial"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="NANQUE">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">NANQUE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Inbound No Agent No Queue Drop"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=NANQUE&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=NANQUE&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="NEW">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">NOUVEAU</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="New Lead"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="NI">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">NI</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Not Interested"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=NI&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=NI&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="NP">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">NP</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="No Pitch No Price"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=NP&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=NP&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="PDROP">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PDROP</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Outbound Pre-Routing Drop"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=PDROP&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=PDROP&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="PM">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PM</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Played Message"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=PM&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=PM&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="PU">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PU</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Call Picked Up"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=PU&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=PU&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="QCFAIL">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">QCFAIL</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="QC_FAIL_CALLBK"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="QC"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CQ -</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=QCFAIL&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=QCFAIL&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="QUEUE">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">FILE D'ATTENTE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Lead To Be Called"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER"></font></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<del><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SUPPRIMER</font></font></del>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="QVMAIL">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">QVMAIL</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Queue Abandon Voicemail Left"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=QVMAIL&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=QVMAIL&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="RQXFER">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">RQXFER</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Re-Queue"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=RQXFER&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=RQXFER&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="SALE">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">VENTE</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Sale Made"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SALE&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SALE&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="SVYCLM">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SVYCLM</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Survey sent to Call Menu"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYCLM&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYCLM&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="SVYEXT">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SVYEXT</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Survey sent to Extension"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYEXT&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYEXT&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="SVYHU">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SVYHU</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Survey Hungup"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYHU&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYHU&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="SVYREC">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SVYREC</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Survey sent to Record"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYREC&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYREC&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="SVYVM">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">SVYVM</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Survey sent to Voicemail"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYVM&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=SVYVM&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="TIMEOT">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TIMEOT</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Inbound Queue Timeout Drop"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=TIMEOT&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=TIMEOT&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr ><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="XDROP">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">XDROP</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Agent Not Available IN"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=XDROP&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=XDROP&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
<tr bgcolor="#D9B39F"><td><form action="/vicidial/admin.php" method="POST">
<input type="hidden" name="ADD" value="421111111111111">
<input type="hidden" name="stage" value="modify">
<input type="hidden" name="status" value="XFER">
<font size="2"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">XFER</font></font></b></font></form></td>
<td><input type="text" name="status_name" size="20" maxlength="30" value="Call Transferred"></td>
<td>
<select size="1" name="category" class="cust_form">
<option value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
<option selected="" value="UNDEFINED"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">UNDEFINED - Catégorie par défaut</font></font></option>
</select>

</td><td><select size="1" name="selectable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="human_answered" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="sale" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="dnc" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="customer_contact" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="Y" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option></select>
</td><td><select size="1" name="not_interested" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="unworkable" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="scheduled_callbacks" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="completed" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td><td><select size="1" name="answering_machine" class="cust_form"><option value="Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Oui</font></font></option><option value="N"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option><option value="N" selected=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">N</font></font></option></select>
</td>
<td><input type="text" name="min_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td><input type="text" name="max_sec" size="3" maxlength="5" value="0" class="cust_form"></td>
<td align="center" nowrap=""><font size="1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input style="background-color:#EFEFEF" type="submit" name="submit" value="MODIFIER "></font><a href="/vicidial/admin.php?ADD=421111111111111&amp;status=XFER&amp;stage=delete"><font style="vertical-align: inherit;">SUPPRIMER</font></a></font> &nbsp; &nbsp; &nbsp; &nbsp; 
 &nbsp; 
<a href="/vicidial/admin.php?ADD=421111111111111&amp;status=XFER&amp;stage=delete"><font style="vertical-align: inherit;"></font></a>
</font></td></tr>
</tbody></table>                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END ROW -->

@endsection



