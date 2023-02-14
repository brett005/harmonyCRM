<div class="col-xl-12 col-md-12 col-lg-12 dispo" style="display:none"> 
   <form id="Update_dispo">
       @csrf
        <input type="hidden" name="uniqueid" id="uniqueid">
        <input type="hidden" name="list_id" id="list_id">
        <input type="hidden" name="called_count" id="called_count">
        <input type="hidden" name="lead_id" id="lead_id1">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card box-widget widget-user">
              <div class="card-body text-center">
                
                @isset($statuses)   
                <div class="card-header  border-0">
                    <div class="row">
                    @foreach($statuses as $key => $status) 
                    <div class="col-md-4 col-sm-6 col-lg-4">
                        <div class="button">
                          <input type="radio"  class="sub_qualif" data-value="{{$status->status}}" name="sub_qualif" value="{{$status->status}}"/>
                          <label class="btn btn-default" for="{{$status->status_name}}">{{$status->status_name}}</label>
                        </div>
                    </div>
                    @endforeach
                    </div> 
                </div> 
                @endisset 
                <div class="col-md-12">
                    <div class="row" style="display:none" id="divCalendar">
                        <div class="form-group col-md-8 col-sm-8 col-lg-8 col-xs-8">
                            <div data-role="calendar" id="calendar"  data-wide-point="sm" data-buttons="false" data-on-day-click="myFunctionDate"></div>
                        
                            <input type="hidden" name="date" id="date" class="form-control">
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-lg-4 col-xs-4">
                            <label for="Hour">Heure :</label>
                            <input type="time" name="hour" id="hour" class="form-control">
                        </div>
                        <div class="form-group col-md-8 col-sm-8 col-lg-8 col-xs-8">
                            <label for="comment">Commentaire :</label>
                            <input name="comments" id="comments" class="form-control">
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-lg-4 col-xs-4">
                            <input type="checkbox" name="CallBackOnlyMe" id="CallBackOnlyMe">  MY CALLBACK ONLY
                        </div>
                    </div>
                </div>
                <div class="col-md-12 container">
                    <div class="text-canter">
                        <input type="checkbox" name="agent_status" id="agent_status" value="1">  Met en pause apres la qualificiation
                    </div>
                </div>
                <div class="row col-md-12 container">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Valider</button>
                </div>
              </div>
            </div>
        </div>
   </form>       
</div>