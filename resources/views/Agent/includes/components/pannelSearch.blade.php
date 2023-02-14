<form id="SearchLead">
        @csrf
    <div class="card-body">
        <div class="form-group ">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="Nom" id="toSearch_first_name" name="first_name">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="Prénom" id="toSearch_last_name" name="last_name">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="Télèphone" id="toSearch_phone" name="phone">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="Email" id="toSearch_email" name="email">
                </div>
                <div class="col-md-12">
                    <div class="form-group" style="margin: 5px;float: left;">
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i>  Recherche</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="card-body">

    <div class="form-group ">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" style="margin: 5px;float: right;">
                    <button class="btn btn-info" type="submit" onClick="Effacer()"><i class="fa fa-edit"></i>  Effacer</button>
                </div>
            </div>
            <div class="col-md-2">
                <label class="form-label mb-0 mt-2">NOM</label>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="search_first_name" name="first_name">
                        <span class="text-muted"></span>
                    </div>
                    
                    <div class="col-md-2">
                    <label class="form-label mb-0 mt-2" >Prénom </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search_last_name" name="search_last_name"  placeholder="" >
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">

            <div class="col-md-2">
                <label class="form-label mb-0 mt-2">
                Adresse1</label>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="search_adr1" name="adr1">
                        <span class="text-muted"></span>
                    </div>
                    
                    <div class="col-md-2">
                    <label class="form-label mb-0 mt-2" >Code postal</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control"  placeholder=""id="search_postal_code" name="postal_code">
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">

            <div class="col-md-2">
                <label class="form-label mb-0 mt-2">Ville</label>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="search_city" name="city" >
                        <span class="text-muted"></span>
                    </div>
                    
                    <div class="col-md-2">
                    <label class="form-label mb-0 mt-2" >Alt. Téléphoner</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control"  placeholder="" id="search_alt_phone" name="alt_phone">
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">

            <div class="col-md-2">
                <label class="form-label mb-0 mt-2">Num fixe</label>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="search_phone_number" name="phone_number">
                        <span class="text-muted"></span>
                    </div>
                    
                    <div class="col-md-2">
                    <label class="form-label mb-0 mt-2" >E-mail</label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control"  placeholder=""id="search_email" name="email">
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form-group ">
        <div class="row">
            <div class="col-md-2">
                <label class="form-label mb-0 mt-2">Commentaire</label>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="search_commentaire" name="commentaire">
                        <span class="text-muted"></span>
                    </div>
                    
                    <div class="col-md-2">
                    
                </div>
                
                </div>

            </div>
        </div>
        <input type="hidden" name="phone_code" id="phone_code" >
    </div>
    <div class="col-md-12">
        <div class="form-group" style="margin: 5px;float: left;" id="manDialFile">
        </div>
    </div>
    
</div>