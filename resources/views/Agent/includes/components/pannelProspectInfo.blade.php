<input type="hidden" name="agent_status" id="agent_status" value="">
<input type="hidden" value="" id="etat_agent">
<input type="hidden" value="" id="agentchannel">
<input type="hidden" id="channel" value=''>
<input type="hidden" id="lead_id" value=''>
<input type="hidden" name="uniqueid" id="uniqueid1">
<div class="panel-body tabs-menu-body hremp-tabs1 p-0">
    <div class="tab-content">
        <div class="tab-pane active" id="tab5" >
        <form id="RegisternewInfoContact" method="post">
                @csrf
            <div class="card-body">
                <div class="form-group ">
                    <div class="row">

                        <div class="col-md-2">
                            <label class="form-label mb-0 mt-2">NOM</label>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="first_name" name="first_name">
                                    <span class="text-muted"></span>
                                </div>
                                
                                <div class="col-md-2">
                                <label class="form-label mb-0 mt-2" >Prénom </label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"id="last_name" name="last_name"  placeholder="" >
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
                                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="adr1" name="adr1">
                                    <span class="text-muted"></span>
                                </div>
                                
                                <div class="col-md-2">
                                <label class="form-label mb-0 mt-2" >Code postal</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  placeholder=""id="postal_code" name="postal_code">
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
                                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="city" name="city" >
                                    <span class="text-muted"></span>
                                </div>
                                
                                <div class="col-md-2">
                                <label class="form-label mb-0 mt-2" >Alt. Téléphoner</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  placeholder="" id="alt_phone" name="alt_phone">
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
                                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="phone_number" name="phone_number">
                                    <span class="text-muted"></span>
                                </div>
                                
                                <div class="col-md-2">
                                <label class="form-label mb-0 mt-2" >E-mail</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control"  placeholder=""id="email" name="email">
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
                                    <input type="text" class="form-control mb-md-0 mb-5"  placeholder="" id="commentaire" name="commentaire">
                                    <span class="text-muted"></span>
                                </div>
                                
                                <div class="col-md-2">
                                
                            </div>
                            
                            </div>

                        </div>
                    </div>
                    <input type="hidden" name="phone_code" id="phone_code" >
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit"><i class="fa fa-save"></i>  Valider</button>
                </div>
            </div>
        </form>
        </div>
    </div> 
</div>