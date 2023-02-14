<div class="card-body" style="padding-top: 0.2rem;">
    <div class="panel-group1" id="accordion1">
        <div class="panel panel-default mb-4 overflow-hidden br-7">
            <div class="panel-heading1">
                <h4 class="panel-title1" >
                    <a class="accordion-toggle collapsed bg-gradient-light" data-bs-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" style="padding: 10px;">Recherche Avancée</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-expanded="false">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                          <form id="searchCalls">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control" name="searchDate" id="searchDate">
                                            <option value="">Choisir la date</option>
                                            @for($i=-7;$i<1;$i++)
                                            <?php 
                                            $t = strtotime($i." days");
                                            ?>
                                            <option value="{{date('d-m-Y', $t)}}">{{date('D d-m-Y', $t)}}</option>
                                            @endfor
                                        </select>
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control" id="searchStatus" name="searchStatus">
                                            <option value="">Choisir un status</option>
                                            @isset($statuses)
                                            @foreach($statuses as $status)
                                                <option value="{{$status->status}}">{{$status->status_name}}</option>
                                            @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="SearchPhone" id="SearchPhone" class="form-control" placeholder="Télèphone">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="SearchName" id="SearchName" class="form-control" placeholder="Nom, Prénom">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="text" name="SearchCity" id="SearchCity" placeholder="Ville" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                          </form>  
                        </div>
                        <div class="col-md-12">
                            <table id="tableSearchCalls" class="table table-striped" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="width:60px">ID</th>
                                        <th style="width:140px">Date de qualif</th>
                                        <th style="width:70px">sec</th>
                                        <th style="width:150px">Qualification</th>
                                        <th style="width:150px">Télèphone</th>
                                        <th style="width:170px">Nom/Prénom</th>
                                        <th style="width:170px">Ville</th>
                                        <th style="width:150px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="ResulttableSearchCalls">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


