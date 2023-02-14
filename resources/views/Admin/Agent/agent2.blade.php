@extends('layouts.base-agent')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}"> 
<link rel="stylesheet" href="{{asset('css/flipTimer.css')}}">
<link rel="stylesheet" href="{{asset('css/demo.css')}}">
@endsection
@section('agent') 

 
         <!-- APP-CONTENT -->
          
					<!-- PAGE HEADER -->
                        

						
						
<div class="page-header d-xl-flex d-block dashboard_agent" >
							<div class="page-leftheader">
								<div class="page-title">Agent<span class="font-weight-normal text-muted ms-2">Dashboard</span></div>
							</div>
							<div class="page-rightheader ms-md-auto">
								<div class="d-flex align-items-end flex-wrap my-auto end-content breadcrumb-end">
									<div class="btn-list">
										<button  class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="E-mail"> <i class="feather feather-mail"></i> </button>
										<button  class="btn btn-light" data-bs-placement="top" data-bs-toggle="tooltip" title="Contact"> <i class="feather feather-phone-call"></i> </button>
										<button  class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="Info"> <i class="feather feather-info"></i> </button>
									</div>
								</div>
							</div>
						</div>
								<div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable ">
                                      <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mt-0 text-start">
                                                	  <div class="number">
                                                        <span data-counter="" data-value=""><span id="nbrArgumente"></span></span>
                                                    </div>
                                                 <span class="font-weight-semibold">Non Argumenté</span>
                                                    <h3 class="mb-0 mt-1 text-primary mb-2">124</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="icon1 bg-danger my-auto  float-endicon1 bg-danger my-auto  float-end"> <i class="las la-building"></i> </div>
                                            </div>
                                              <span class="more" href="javascript:;">
                                                <span id="prctArgumente"></span>
                                        </div>
                                    </div>
                                </div>
                    </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                                     <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mt-0 text-start">
                                                	  <div class="number">
                                                        <span data-counter="" data-value=""><span id="nbrArgumente"></span></span>
                                                    </div>
                                                 <span class="font-weight-semibold">Non Argumenté</span>
                                                    <h3 class="mb-0 mt-1 text-primary mb-2">124</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="icon1 bg-danger my-auto  float-endicon1 bg-danger my-auto  float-end"> <i class="las la-building"></i> </div>
                                            </div>
                                              <span class="more" href="javascript:;">
                                                <span id="prctArgumente"></span>
                                        </div>
                                    </div>
                                </div>
                    </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                             <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="mt-0 text-start">
                                                	  <div class="number">
                                                        <span data-counter="" data-value=""><span id="nbrArgumente"></span></span>
                                                    </div>
                                                 <span class="font-weight-semibold">Non Argumenté</span>
                                                    <h3 class="mb-0 mt-1 text-primary mb-2">124</h3>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="icon1 bg-danger my-auto  float-endicon1 bg-danger my-auto  float-end"> <i class="las la-building"></i> </div>
                                            </div>
                                              <span class="more" href="javascript:;">
                                                <span id="prctArgumente"></span>
                                        </div>
                                    </div>
                                </div>
                    </div>


                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="" data-value="89"></span><span
                                                id="presenceTime"></span>
                                    </div>
                                    <div class="desc">Heure présence</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                            <div class="dashboard-stat blue portlet portlet-sortable">
                                <div class="visual">
                                    <i class="fa fa-users"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="" data-value=""><span id="debriefTime"></span></span>
                                    </div>
                                    <div class="desc">Debrief</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                            <div class="dashboard-stat red ui-sortable">
                                <div class="visual">
                                    <i class="fa fa-coffee"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                <span data-counter="" data-value=""><span id="cafeTime"></span>
                                </span>
                                    </div>
                                    <div class="desc">Pauses</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 sortable">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-hourglass"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                <span data-counter="counteruppp" data-value="549"><span
                                            id="prodTime"></span></span>
                                    </div>
                                    <div class="desc">Heure production</div>
                                </div>
                                <span class="more" href="javascript:;">
                            &nbsp;<!--  View more <i
                                class="m-icon-swapright m-icon-white"></i>-->
                        </span>
                            </div>
                        </div>
						<div class="col-xl-12 col-lg-12 col-md-12">

								<div class="card">
									<div class="card-header border-bottom-0">
										<h3 class="card-title">Contact Prospect</h3>
									</div>
									<div class="card-body">
										<div class="card-pay">
											<ul class="tabs-menu nav">
												<li class=""><a href="#tab20" class="active" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Chat international</a></li>
												<li><a href="#tab21" data-bs-toggle="tab" class=""><i class="fa fa-paypal"></i> Manuel Dial</a></li>
												<li><a href="#tab22" data-bs-toggle="tab" class=""><i class="fa fa-university"></i> historique </a></li>
												
											</ul>
											<div class="tab-content">
												<div class="tab-pane active show" id="tab20">
													<div class="bg-danger-transparent-2 text-danger px-4 py-2 br-3 mb-4" role="alert"></div>
									<table id="example" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th width="10">ID</th>
                                                    <th width="100">Date/heure</th>
                                                    <th width="10">sec</th>
                                                    <th>Qualification</th>
                                                    <th>Télèphone</th>
                                                    <th>Nom/Prénom</th>
                                                    <th width="50">Compagne</th>
                                                    
                                                    <th width="50">Hangup</th>
                                                    <th style="width: 70px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($calllogs)
                                                @foreach($calllogs as $key => $log)
                                                
                                                    <tr style="padding:2px">
                                                        <td width="10">{{$key+1}}</td>
                                                        <td width="100">{{$log->call_date}}</td>
                                                        <td width="10">{{$log->length_in_sec}}</td>
                                                        <td>{{$log->status}}</td>
                                                        <td>{{$log->phone_number}}</td>
                                                        <td>{{$log->first_name.' '.$log->last_name}}</td>
                                                        <td width="50">{{$log->campaign_id}}</td>
                                                       
                                                        <td width="50">{{$log->term_reason}}</td>
                                                        <td>
                                                            <button onclick="ManualDial('{{$log->phone_number}}')" data-phone="{{$log->phone_number}}" class="btn btn-sm btn-success "><i class="fa fa-phone"></i></button>
                                                            <button onclick="getContactInfo('{{$log->lead_id}}')" data-phone="{{$log->phone_number}}" class="btn btn-sm btn-info "><i class="fa fa-eye"></i></button>
                                                            <!-- <a href="{{route('get_lead_info',$log->lead_id)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> -->
                                                        </td>

                                                    </tr>
                                                @endforeach
                                                @endisset
                                            </tbody>
                                   </table>
													<a  href="javascript:void(0);" class="btn  btn-lg btn-primary">Confirm</a>
											</div>
												<div class="tab-pane" id="tab21">
													
												<div id="calendar"></div>
										    </div>
												
											</div>
										</div>
									</div>
								</div>

                                <div class="container-login100">
                                    <div class="wrap">
                                        <div class="wrap-login100 p-t-50 p-b-90 p-l-50 p-r-50">
                                                        <h2 class="attente_ppp">En Attente d'un appel..</h2>
                                                        <br> 
                                                        <button class="btn btn-default btn-outlined btn-square back-to-menu agentStatusButton"> retour</button>
                                                        <main>
                                                        <article>
                                                        
                                                        <div class="flipTimer" id="timeREADY">
                                                            <div class="hours"></div>
                                                            <div class="minutes"></div>
                                                            <div class="seconds"></div>
                                                        </div> 
                                                        </article>
                                                    </main>
                                                    </div>
                                                
                                                    
                                        </div>
                                                
                                                        <div>
                                                        <img class="fit-picture"
                                                            src="{{asset('images/15.png')}}"
                                                            alt="Grapefruit slice atop a pile of other slices">
                                                    </div>
                                                
                                    </div>
                                </div> 

  

</div>

            <div class="page-header d-xl-flex d-block bloc_incall" id="production_tabs" style="display:none;" >
           
            <div class="page-leftheader">
            <div class="card">
									<div class="card-header border-bottom-0">
										<h3 class="card-title">action</h3>
									</div>
									<div class="card-body">
										<div class="btn-list">
                                            <!-- button pour raccrocher et qualifier a la foi -->
											<a   class="btn btn-outline-danger"  onclick="hangupQualif()">Raccrocher-qual</a>
									 <!-- button pour raccrocher l'appel et rendre l'agent en état DISPO -->
											<a   class="btn btn-outline-secondary" onclick="hangup()">Raccrocher</a>
										</div>
									</div>
			</div>
         
            </div>
           
            </div>

    
            </div>
            <div class="row">
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card box-widget widget-user">
                    <div class="card-body text-center">
                        <div class="card-header  border-0">
                            <div id="timeINCALL1"></div>

                    </div>
                            <div>
                    <button type="button"  class="btn btn-danger btn-circle btn-xl " ><i class="si si-call-end" data-bs-toggle="tooltip" title="" data-bs-original-title="si-call-end" aria-label="si-call-end"></i></button>
                        <div class="row" id="ReClass" style="">
                        <div class="col-md-4">
                            <button class="btn btn-info" onclick="requalifier()"><i class="fa fa-check"></i> Requalifier la fiche</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-warning" onclick="retour()"><i class="fa fa-arrow-left"></i> Retour</button>
                        </div>
                        <div class="col-md-4" id="manDial">
                            
                        </div>
                    </div>

                
                    </div>
                        
                    </div>

                    <div id="content_ecran_conf" style="padding: 10px;">
                        <input type="hidden" name="agent_status" id="agent_status" value="">
                        <input type="hidden" value="" id="etat_agent">
                        <input type="hidden" value="" id="agentchannel">
                        <input type="hidden" id="channel" value=''>
                        <input type="hidden" id="lead_id" value=''>
                        <input type="hidden" name="uniqueid" id="uniqueid1">
                        <div class="form-group" dir="ltr" data-prop="field_expert" data-numfield="2858">
                        
                        <div class="col-xl-12 col-md-12 col-lg-12">
                        <div class="tab-menu-heading hremp-tabs p-0 ">
                    
                                
                            </div>
                        </div>
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
                                                        <label class="form-label mb-0 mt-2" >Prenom </label>
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
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                    </div>
                    </div>
<!-- END ROW -->
   <!-- Modal de qualification de la fiche (appel) -->
   <div class="col-xl-12 col-md-12 col-lg-12">
        
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
                                    @foreach($statuses as $key => $status)
                                  <div class="card-header  border-0">
                         
                                          <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3">
                                   
                                                      <div class="row">
                                                          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12">
                                                   
                                                           <a style="background: #48DF71" class="btn btn-sm mb-1"> {{$status->status_name}}</a>
                                  
                                                          </div> 
                                                      </div>
                                          @endforeach
                                          @endisset
                                          </div>  

                              
                                </div>  
                              </div>
                          <div>
                     </div>
       </form>       
                      
</div>
<audio id="audioNotify" src="{{asset('audio_notification.wav')}}" type="audio/wav" autoplay="true">
     
</audio> 
<!-- affichage de webphone -->
<div class="row">
    <div class="col-md-8" >
        <iframe src=""  id="webphone" name="webphone" width="460px" height="500px" allow="microphone *; speakers *;"> </iframe>
    </div>
    <div class="col-md-4">
        <button class="btn btn-success" id="webphone1"> WebPhone</button>
    </div>
</div>
</div>
<script src="{{asset('assets/admin/js/jquery-2.1.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/agents/metro.min.js')}}"></script>
<script src="https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

<!-- <script type="text/javascript">
    //////////// get All chanel For user connected
    $(document).ready(function(){
        
        channel = setInterval(function(){

            $.ajax({
                url: 'get_channel_live',
                type: "get",
                success:function(response)
                {   
                    
                    channelslive = response.channels;
                    if(response.etat == 200){
                        $('#channelLive').empty();
                        channelslive.forEach(element =>
                                {       
                                        var l = element.channel;
                                        firstlettre = l.slice(0, 5);
                                        console.log(firstlettre);
                                        if(firstlettre == "Local"){
                                            var ll = 'recording';
                                        }else{
                                            var ll = 'HANGUP';
                                        }                          
                                        $('#channelLive').append(`
                                            <tr>
                                                <td>1</td>
                                                <td>${element.channel}</td>
                                                <td>${ll}</td>
                                                <td></td>
                                            </tr>
                                        `); 
                                    
                                });
                        //clearInterval(channel);
                    }

                },
            });
        },3000);
    })
</script> -->

<script type="text/javascript">
    //// change pause code  
    $('.pause_codes').click(function(){
        var pause_code = $(this).attr("data-value");
        //alert(pause_code);
        $.ajax({
            url: 'change_pause_code/'+pause_code,   /// send status in request
            type: "get",
            success:function(response)
            {   
                status = response.etat;
                pauseCode = response.pause_code;
                 if(status == 200){
                    //$("#PauseModal").modal("show");
                    if(pauseCode == "DEJ"){
                        $('#imgForm').css('display','none');
                        $('#imgBrief').css('display','none');
                        $('#imgCaf').css('display','none');
                        $('#imgDej').css('display','block');
                    }else if(pauseCode == 'CAF'){
                        $('#imgForm').css('display','none');
                        $('#imgBrief').css('display','none');
                        $('#imgDej').css('display','none');
                        $('#imgCaf').css('display','block');
                    }
                    else if(pauseCode == 'BRIEF'){
                        $('#imgForm').css('display','none');
                        $('#imgDej').css('display','none');
                        $('#imgCaf').css('display','none');
                        $('#imgBrief').css('display','block');
                    }
                    else if(pauseCode == 'FORM'){
                        $('#imgDej').css('display','none');
                        $('#imgCaf').css('display','none');
                        $('#imgBrief').css('display','none');
                        $('#imgForm').css('display','block');
                    }
                    $("#PauseModal").modal({backdrop: 'static', keyboard: false}, 'show');
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'erreur de systéme, veuillez contacter le support',
                        showConfirmButton: true,
                        timer: 5000
                    });
                }
            },
        });
    });
</script>
<script>
    function myFunctionDate(sel, day, el){
        document.getElementById('date').value = sel;
    }
    /*$('#play').click(function(){
        let sound = document.getElementById("audioNotify");
        sound.play();
    });*/

    ////change status (start production (READY) , stop production (PAUSED)) quand en click sur button 
    /// demmarer la production ou retour au menu principale
    $(".agentStatusButton").click(function(){
        status = $(".agentStatusButton").attr("data-value"); // get user live status
        if(status == 'QUEUE' || status == 'INCALL'){
            status = 'READY';
        }
            $.ajax({
                url: 'change_status/'+status,   /// send status in request
                type: "get",
                success:function(response)
                {
                    if(response.etat == 200){
                        $(".agentStatusButton").attr("data-value",response.etatAgent);                                
                        document.getElementById('etat_agent').value = response.etatAgent;
                        if(response.etatAgent == 'PAUSED'){
                           
                            $(".dashboard_panel").removeClass('darkBackground');
                            $('.bloc_attente').css('display','none');
                            $('.dashboard_agent').css('display','block');
                            $(".agentStatusButton").empty();
                            $(".agentStatusButton").html('Démarrer la production');
                        }
                        if(response.etatAgent == 'READY'){
                            $("#PauseModal").modal("hide");
                            $(".dashboard_panel").addClass('darkBackground');
                            $('.dashboard_agent').css('display','none');
                            $('.bloc_attente').css('display','block');
                            $(".agentStatusButton").empty();
                            $(".agentStatusButton").append(`<i
                            class="fa fa-arrow-circle-o-left"></i> Retour au menu Principal `);
                        }
                    }
                },
            });
    });

    ///// lancer le viciphone

    $("#webphone1").click(function(){        
        $.ajax({
            url: 'activate_webphone',
            type: "get",
            success:function(response)
            {   
                toastr.options = {
                      "progressBar": true,
                      "positionClass": "toast-top-right",
                      "timeOut": "4000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                if(response.etat == 200){
                    toastr.success('webphone is activated');
                }else{
                    toastr.error('webphone Not Activated');
                }
            },
        });
    });
    ////// webphone wille be activated after 6 sec
    $(document).ready(function(){
        incall = setInterval(function(){
            $.ajax({
                url: 'activate_webphone',
                type: "get",
                success:function(response)
                {   
                    if(response.etat == 200){toastr.success('webphone is activated'); clearInterval(incall); }
                    else{ toastr.error('webphone Not Activated'); }
                },
            });
        },6000);
    });
     ///// get channel and leadId for the live call (CONTACT CALL)
    $(document).ready(function(){
        getchannel = setInterval(function(){  
            var etat = $("#etat_agent").val();
            if(etat == 'READY'){
                chan = document.getElementById('channel').value;
                if(chan == null || chan == ''){
                        $.ajax({
                            url: 'get_channel/',
                            type: "GET",
                            success:function(response)
                            {
                                status = response.etat;
                                msg = response.msg;
                                if(status == 200){
                                    //console.log(response);                                    
                                    start();
                                    lead_id = response.lead_id;
                                    channel = response.channel;
                                    document.getElementById('channel').value = channel;
                                    //channel.setAttribute('value', channel);
                                    document.getElementById('lead_id').value = lead_id;
                                    $('.send_msg').attr('href', 'send_msg_contact/'+lead_id); /// add url to button send message or email to contact
                                    $(".dashboard_panel").removeClass('darkBackground');
                                    $('.bloc_incall').css('display','block');
                                    $('.bloc_attente').css('display','none');
                                    $('.dashboard_agent').css('display','none'); 
                                    $('#class').css('display','block'); 
                                    $('#racc').css('display','block'); 
                                    $('#ReClass').css('display','none');
                                    $('#timeINCALL').css('display','block'); 
                                }
                            },
                        });
                    }
                }  
            },1000);
    });

    function start(){
        ChangeToIncallIntervale = setInterval(ChangeToIncall, 1000);
    }

    // Function to stop setInterval call
    function stop(){
        clearInterval(ChangeToIncallIntervale);
    }
    ////change agent stat to incall and get contact information for the live call
    //const ChangeToIncallIntervale = setInterval(ChangeToIncall, 1000);

    function ChangeToIncall()
    {
        phone = document.getElementById('tel1').value;
        if(phone == null || phone == ''){}
        else{
        }
        chan = document.getElementById('channel').value;

        if(chan == null || chan == ''){
        }else{    
            $.ajax({
                url: 'change_to_incall/',
                type: "GET",
                success:function(response)
                {
                    status = response.etat;
                    msg = response.msg;
                    if(status == 200){ 
                        stop();
                        $(".dashboard_panel").removeClass('darkBackground');
                        $('.bloc_incall').css('display','block');
                        $('.bloc_attente').css('display','none');
                        $('.dashboard_agent').css('display','none'); 
                        $('#class').css('display','block'); 
                        $('#racc').css('display','block'); 
                        $('#ReClass').css('display','none');
                        $('#timeINCALL').css('display','block'); 
                        
                        document.getElementById('first_name').value = response.first_name;
                        document.getElementById('last_name').value = response.last_name;
                        document.getElementById('adr1').value = response.address1;
                        document.getElementById('city').value = response.city;
                        document.getElementById('postal_code').value = response.postal_code;
                        document.getElementById('phone_number').value = response.phone_number;
                        document.getElementById('alt_phone').value = response.alt_phone;
                        document.getElementById('email').value = response.email;
                        document.getElementById('commentaire').value = response.comments;

                        document.getElementById('agentchannel').value = response.agentchannel;
                        document.getElementById('uniqueid').value = response.uniqueid;
                        document.getElementById('list_id').value = response.list_id;
                        document.getElementById('lead_id').value = response.lead_id;
                        document.getElementById('lead_id1').value = response.lead_id;
                        document.getElementById('called_count').value = response.called_count;
                        /////////
                        document.getElementById('phone_code').value = '33';
                        /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${response.tel1}</span> / <span><i class="text-success fa fa-fax"></i>${response.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${response.adr4_libelle_voie}</span> / ${response.contact_cp} / ${response.contact_ville} / ${response.adr1_civilite_abrv} / ${response.contact_nom} / ${response.contact_prenom}`);*/
                    }
                },
            });
        
        }
    }
    ///// get Status and start chrono if status == INCALL
    $(document).ready(function(){
        const getStatus = setInterval(function(){ 
            
            lead_id = document.getElementById('lead_id').value;
            if(lead_id == '' || lead_id == null){
                $.ajax({
                    url: 'get_status/',
                    type: "GET",
                    success:function(response)
                    {
                        status = response.etat;                    
                        etatAgent = response.etatAgent;                    
                        if(status == 200){
                            $.ajax({
                                url: 'get_time_agent/',
                                type: "GET",
                                success:function(response)
                                {
                                    if(response.etat == 200){
                                        time = response.time;
                                        if(time < 3600){ 
                                        heures = 0; 
                                        
                                        if(time < 60){minutes = 0;} 
                                        else{minutes = Math.floor(time / 60);} 
                                        
                                        secondes = Math.floor(time % 60); 
                                        } 
                                        else{ 
                                        heures = Math.floor(time / 3600); 
                                        secondes = Math.floor(time % 3600); 
                                        minutes = Math.floor(secondes / 60); 
                                        } 
                                        
                                        secondes2 = Math.floor(secondes % 60); 
                                        if(heures<10){
                                            heures = '0' + heures;
                                        }
                                        if(minutes<10){
                                            minutes = '0' + minutes;
                                        }
                                        if(secondes2<10){
                                            secondes2 = '0' + secondes2;
                                        }
                                        afficher = heures + ":" + minutes + ":" + secondes2 ;
                                        if(etatAgent == 'PAUSED'){
                                            document.getElementById("timePAUSED").innerHTML = afficher;
                                            document.getElementById("timePAUSEDAgent").innerHTML = afficher;
                                            
                                        }
                                        if(etatAgent == 'READY'){

                                            document.getElementById("timeREADY").innerHTML = afficher;
                                        }
                                        
                                    }
                                }
                            }); 
                        }
                    },
                });
            }
            else{
                $.ajax({
                    url: 'get_status/',
                    type: "GET",
                    success:function(response)
                    {
                        status = response.etat;                    
                        if(status == 200){
                            if(response.etatAgent == 'INCALL'){
                                $.ajax({
                                    url: 'refresh_incall/',
                                    type: "GET",
                                    success:function(response)
                                    {},
                                }); 
                                $("time").css('display','none');
                                $.ajax({
                                    url: 'get_time_incall/'+lead_id,
                                    type: "GET",
                                    success:function(response)
                                    {
                                        if(response.etat == 200){
                                            time = response.time;
                                            if(time < 3600){ 
                                            heures = 0; 
                                            
                                            if(time < 60){minutes = 0;} 
                                            else{minutes = Math.floor(time / 60);} 
                                            secondes = Math.floor(time % 60); 
                                            } 
                                            else{ 
                                            heures = Math.floor(time / 3600); 
                                            secondes = Math.floor(time % 3600); 
                                            minutes = Math.floor(secondes / 60); 
                                            } 
                                            secondes2 = Math.floor(secondes % 60); 
                                            if(heures<10){
                                                heures = '0' + heures;
                                            }
                                            if(minutes<10){
                                                minutes = '0' + minutes;
                                            }
                                            if(secondes2<10){
                                                secondes2 = '0' + secondes2;
                                            }
                                            afficher = heures + ":" + minutes + ":" + secondes2 ;
                                            document.getElementById("timeINCALL").innerHTML = afficher;
                                            document.getElementById("timeINCALL1").innerHTML = afficher;
                                        }
                                    }
                                });
                                
                            }
                            

                        }
                    },
                }); 
            } 
        },1000);
    });
    ///// hangup a live call and chanel
    function hangupQualif() {
        $("#myModal2").modal("hide");
        $("#divCalendar").css('display','none');
        $('.sub_qualifDM').css('display','none');
        $('.sub_qualifDL').css('display','none');
        $('.sub_qualifFNM').css('display','none');
        $('.sub_qualifHC').css('display','none');
        $('.sub_qualifPA').css('display','none');
        $('.sub_qualifPL').css('display','none');
        $('.sub_qualifRA').css('display','none');
        $('.sub_qualifRR').css('display','none');
        $('#divCalendar').css('display','none');
        $('.sub_qualifAutre').css('display','none');
        $("input[type='radio'][class='qualif']:checked").prop('checked', false);
        $("input[type='radio'][class='sub_qualif']:checked").prop('checked', false);

        document.getElementById('date').value = '';
        document.getElementById('hour').value = '';
        document.getElementById('CallBackOnlyMe').value = '';
        document.getElementById('comments').value = '';
    
        //e.preventDefault();
        channel = document.getElementById('channel').value;
        agentchannel = document.getElementById('agentchannel').value;
        if(channel == null || channel == ''){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Aucun appel en cours',
                showConfirmButton: true,
                timer: 5000
            });
        }
        else{
            called_count = document.getElementById('called_count').value;
            uniqueid = document.getElementById('uniqueid').value;
            lead_id = document.getElementById('lead_id1').value;
            list_id = document.getElementById('list_id').value;
            phone_number = document.getElementById('tel1').value;
            phone_code = document.getElementById('phone_code').value;
            $.ajax({
                url: 'hangup/',
                data: {
                    called_count:called_count,
                    uniqueid:uniqueid,
                    lead_id:lead_id,
                    list_id:list_id,
                    phone_number:phone_number,
                    phone_code:phone_code,
                    channel:channel,
                    agentchannel:agentchannel
                },
                type: "get",
                success:function(response)
                {
                    $("#myModal2").modal("show");
                    if(response.etat == 200){
                        statuses = response.statuses;
                        document.getElementById('first_name').value = '';
                        document.getElementById('last_name').value = '';
                        document.getElementById('adr1').value = '';
                        document.getElementById('city').value = '';
                        document.getElementById('postal_code').value = '';
                        document.getElementById('phone_number').value = '';
                        document.getElementById('alt_phone').value = '';
                        document.getElementById('email').value = '';
                        document.getElementById('commentaire').value = '';
                    }
                },
            });
        }  
    }
    function hangup() {
        $("#myModal2").modal("hide");
        //e.preventDefault();
        channel = document.getElementById('channel').value;
        agentchannel = document.getElementById('agentchannel').value;
        //// si channel ne s'affiche pas (aucun appel) on affiche un alert 
        if(channel == null || channel == ''){
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Aucun appel en cours',
                showConfirmButton: true,
                timer: 5000
            });
        }
        else{
            called_count = document.getElementById('called_count').value;
            uniqueid = document.getElementById('uniqueid').value;
            uniqueid1 = document.getElementById('uniqueid1').value;
            lead_id = document.getElementById('lead_id1').value;
            list_id = document.getElementById('list_id').value;
            phone_number = document.getElementById('tel1').value;
            phone_code = document.getElementById('phone_code').value;
            $.ajax({
                url: 'hangup/',
                data: {
                    called_count:called_count,
                    uniqueid:uniqueid,
                    uniqueid1:uniqueid1,
                    lead_id:lead_id,
                    list_id:list_id,
                    phone_number:phone_number,
                    phone_code:phone_code,
                    channel:channel,
                    agentchannel:agentchannel
                },
                type: "get",
                success:function(response)
                {
                    if(response.etat == 200){
                        statuses = response.statuses;          
                    }
                },
            });
        }  
    }

    ///// afficher le div pour ajouter les montants des don ou pa
    $('#envoi_courrier').change(function() {
        if(this.value != null || this.value != ''){
            $('#montant_donDiv').css('display','block');
        }else{
            $('#montant_donDiv').css('display','none');
        }
    });
    ///// lancer un appel manuel 
    function ManualDial(phoneNumber){
        document.getElementById('first_name').value = '';
        document.getElementById('last_name').value = '';
        document.getElementById('adr1').value = '';
        document.getElementById('city').value = '';
        document.getElementById('postal_code').value = '';
        document.getElementById('phone_number').value = '';
        document.getElementById('alt_phone').value = '';
        document.getElementById('email').value = '';
        document.getElementById('commentaire').value = '';

        document.getElementById('list_id').value = '';
        document.getElementById('lead_id').value = '';
        document.getElementById('lead_id1').value = '';
        document.getElementById('called_count').value = '';
        document.getElementById('uniqueid1').value = '';
        $('#montant_donDiv').css('display','none');
        $.ajax({
            url: 'manual_dial',
            type: "get",
            data:{
                    "_token":"{{csrf_token()}}",
                    phone_number:phoneNumber,
                },
            success:function(response)
            {   
                
                status = response.etat;
                msg = response.msg;

                if(status == 200){
                    start();
                    lead = response.lead;
                    uniqueid = response.uniqueid;
                    channel = response.channel;
                    agentchannel = response.agentchannel;
                    $(".dashboard_panel").removeClass('darkBackground');
                    $('.bloc_incall').css('display','block');
                    $('.bloc_attente').css('display','none');
                    $('.dashboard_agent').css('display','none');                   
                    document.getElementById('agentchannel').value = agentchannel;
                    document.getElementById('channel').value = channel;
                    document.getElementById('first_name').value = lead.first_name;
                    document.getElementById('last_name').value = lead.last_name;
                    document.getElementById('adr1').value = lead.adr1;
                    document.getElementById('city').value = lead.city;
                    document.getElementById('postal_code').value = lead.postal_code;
                    document.getElementById('phone_number').value = lead.phone_number;
                    document.getElementById('alt_phone').value = lead.alt_phone;
                    document.getElementById('email').value = lead.email;
                    document.getElementById('commentaire').value = lead.comments;
                    ////// new 
                    document.getElementById('uniqueid1').value = uniqueid;
                    document.getElementById('list_id').value = lead.list_id;
                    document.getElementById('lead_id').value = lead.lead_id;
                    document.getElementById('lead_id1').value = lead.lead_id;
                    document.getElementById('called_count').value = lead.called_count;
                    /////////
                    document.getElementById('phone_code').value = '33';
                    /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${lead.tel1}</span> / <span><i class="text-success fa fa-fax"></i>${lead.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${lead.adr4_libelle_voie}</span> / ${lead.contact_cp} / ${lead.contact_ville} / ${lead.adr1_civilite_abrv} / ${lead.contact_nom} / ${lead.contact_prenom}`);*/
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: msg,
                        showConfirmButton: true,
                        timer: 500
                    });
                }
                    
                },
        });
    };
    function getContactInfo(lead_id){
        document.getElementById('first_name').value = '';
        document.getElementById('last_name').value = '';
        document.getElementById('adr1').value = '';
        document.getElementById('city').value = '';
        document.getElementById('postal_code').value = '';
        document.getElementById('phone_number').value = '';
        document.getElementById('alt_phone').value = '';
        document.getElementById('email').value = '';
        document.getElementById('commentaire').value = '';
        /////
        document.getElementById('list_id').value = '';
        document.getElementById('lead_id').value = '';
        document.getElementById('lead_id1').value = '';
        document.getElementById('called_count').value = '';

        $('#montant_donDiv').css('display','none');
        $.ajax({
            url: 'get_lead_info/'+lead_id,
            type: "get",
            data:{
                    "_token":"{{csrf_token()}}",
                },
            success:function(response)
            {   
                status = response.etat;
                msg = response.msg;
                console.log(response.lead);
                if(status == 200){
                    lead = response.lead;
                    $('#manDial').empty()
                    $('#manDial').append(`<button class="btn btn-success" onclick=ManualDial(${lead.contact_tel})><i class="fa fa-phone"></i> Appeler</button>`); /// add url to button send
                    $('.send_msg').attr('href', 'send_msg_contact/'+lead.lead_id);
                    $(".dashboard_panel").removeClass('darkBackground');
                    $('#ReClass').css('display','block');
                    $('#class').css('display','none');
                    $('#timeINCALL').css('display','none');
                    $('#racc').css('display','none');
                    $('.bloc_incall').css('display','block');
                    $('.bloc_attente').css('display','none');
                    $('.dashboard_agent').css('display','none');                   

                    document.getElementById('first_name').value = lead.first_name;
                    document.getElementById('last_name').value = lead.last_name;
                    document.getElementById('adr1').value = lead.address1;
                    document.getElementById('city').value = lead.city;
                    document.getElementById('postal_code').value = lead.postal_code;
                    document.getElementById('phone_number').value = lead.phone_number;
                    document.getElementById('alt_phone').value = lead.alt_phone;
                    document.getElementById('email').value = lead.email;
                    document.getElementById('commentaire').value = lead.comments;
                        /////
                    document.getElementById('list_id').value = lead.list_id;
                    document.getElementById('lead_id').value = lead.lead_id;
                    document.getElementById('lead_id1').value = lead.lead_id;
                    document.getElementById('called_count').value = lead.called_count;
                    /////////
                       
                    
                    document.getElementById('phone_code').value = '33';
                    /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${lead.tel1}</span> / <span><i class="text-success fa fa-fax"></i>${lead.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${lead.adr4_libelle_voie}</span> / ${lead.contact_cp} / ${lead.contact_ville} / ${lead.adr1_civilite_abrv} / ${lead.contact_nom} / ${lead.contact_prenom}`);*/
                    
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: msg,
                        showConfirmButton: true,
                        timer: 500
                    });
                }
                    
                },
        });
    };
    function retour(){
        $(".dashboard_panel").removeClass('darkBackground');
        $('.bloc_incall').css('display','none');
        $('.bloc_attente').css('display','none');
        $('.dashboard_agent').css('display','block');

    }
    function requalifier() {
        $("#myModal2").modal("show"); 
    }
    ///// change qualif for contact and save it
    $(document).on('click', '.qualif', function () {
        var value;
        value = $(this).attr('data-value');
        $(".allsub_qualif").css('display','none');
        $(".sub_qualif"+value).css('display','block');
        if(value == 'CALLBK'){$('#divCalendar').css('display','block');}else{$('#divCalendar').css('display','none');}
        if(value == 'qualifAutre'){$('.sub_qualifAutre').css('display','block');}else{$('.sub_qualifAutre').css('display','none');}
        //alert(value);
    });

    ///// une fonction pour afficher les sous qualif de chaque qualif
    $(document).on('click', '.sub_qualif', function () {
        var value;
        value = $(this).attr('data-value');
        if(value == 'CALLBK'){$('#divCalendar').css('display','block');}else{$('#divCalendar').css('display','none');}
    });
     ////// send a request every 40 sec to get notification for callback (rappel)
    const getCallbackLive = setInterval(getLiveCallBack, 40000);
    function getLiveCallBack(){
        $.ajax({
            url: 'get_live_callback',
            type: "get",
            success:function(response)
            {       
                lead = response.lead;
                //console.log(lead);
                if(response.etat == 200){
                    
                    document.getElementById('callback_notification').innerHTML = 1;
                    $('#callback_info').html(`
                        <li>
                            <a class="" onclick=getContactInfo(${lead.lead_id})>
                                <span class="text-info" style="font-size:15px">${lead.first_name}</span>
                                <span class="text-info" style="font-size:15px">${lead.last_name}</span><br>
                                <span class="text-danger">+${lead.phone_code} ${lead.phone_number}</span>
                            </a>
                        <li>`); /// add url to button send
                    let sound = document.getElementById("audioNotify");
                    sound.play();
                    //document.getElementById("play").addEventListener("click", sound);
                    clearInterval(getCallbackLive);
                }
                else{ 
                    document.getElementById('callback_notification').innerHTML = 0;
                    $('#callback_info').html(``); /// add url to button send 
                }
            },
        });
    }
 
    $('#Update_dispo').on('submit',function(e){
        e.preventDefault();
        var value;    
        value = $("input[type='radio'][class='sub_qualif']:checked").val();
        
        let uniqueid = $('#uniqueid').val();
        let uniqueid1 = $('#uniqueid1').val();
        let list_id = $('#list_id').val();
        let called_count = $('#called_count').val();
        let lead_id1 = $('#lead_id1').val();
        let agent_status = $('#agent_status:checked').val();
        let hour = $('#hour').val();
        let date = $('#date').val();
        let comments = $('#comments').val();
        let CallBackOnlyMe = $('#CallBackOnlyMe').val();        
        if(CallBackOnlyMe == 'on'){
            CallBackrecipient = 'USERONLY';            
        }else{
            CallBackrecipient = 'ANYONE';
        }        
        $.ajax({
            url: 'Update_dispo/',
            type: "get",
            data:{
                "_token":"{{csrf_token()}}",
                uniqueid:uniqueid,
                uniqueid1:uniqueid1,
                list_id:list_id,
                called_count:called_count,
                lead_id:lead_id1,
                agent_status:agent_status,
                dispo_choice:value,
                CallBackrecipient:CallBackrecipient,
                hour:hour,
                date:date,
                comments:comments,
            },
            success:function(response)
            {   
                $("#myModal2").modal("hide");
                status = response.etat;
                msg = response.msg;
                if(status == 200){
                    document.getElementById('channel').value = '';
                    document.getElementById('lead_id').value = '';
                    document.getElementById('uniqueid').value = '';
                    document.getElementById('lead_id1').value = '';
                    document.getElementById('list_id').value = '';
                    document.getElementById('first_name').value = '';
                    document.getElementById('last_name').value = '';
                    document.getElementById('adr1').value = '';
                    document.getElementById('city').value = '';
                    document.getElementById('postal_code').value = '';
                    document.getElementById('phone_number').value = '';
                    document.getElementById('alt_phone').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('commentaire').value = '';
                    document.getElementById('comments').value = '';

                   /////////
                    document.getElementById('phone_code').value = '';          
                    $(".agentStatusButton").attr("data-value",response.etatAgent);                                
                    $(".agentStatusButton").html(response.etatAgent);
                    document.getElementById('etat_agent').value = response.etatAgent;
                    $('.bloc_incall').css('display','none');
                    $('.time1').css('display','none');
                    
                    if(response.etatAgent == 'PAUSED'){
                        $(".dashboard_panel").removeClass('darkBackground');
                        $('.bloc_attente').css('display','none');
                        $('.dashboard_agent').css('display','block');
                        $(".agentStatusButton").empty();
                        $(".agentStatusButton").html('Démarrer la production');

                    }

                    if(response.etatAgent == 'READY'){
                        

                        $(".dashboard_panel").addClass('darkBackground');
                        $('.dashboard_agent').css('display','none');
                        $('.bloc_attente').css('display','block');
                        $(".agentStatusButton").empty();
                        $(".agentStatusButton").append(`<i
                        class="fa fa-arrow-circle-o-left"></i> Retour au menu Principal `);

                    }
                    //const ChangeToIncallIntervale = setInterval(ChangeToIncall, 1000);
                    //setInterval(ChangeToIncall, 1000);
                    //setInterval(getLiveCallBack, 40000);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: msg + ' ' +response.dispo_choice,
                        showConfirmButton: true,
                        timer: 500
                    });

                    ////// a refaiore la requete//////////////////
                    /*$.ajax({
                        url: 'get_live_statistic_agent/',
                        type: "GET",
                        success:function(response)
                        {    
                            if(response.etat == 200){
                            //// send request to controller to get live statistic agent CU, CU+, called_acount....
                                var prctArgumente = Math.round((response.qualifArg /response.fiches)*100,2);
                                var prctPositif = Math.round((response.qualifPos /response.fiches)*100,2);
                                //var prctArgumente = (response.qualifArg /response.fiches)*100;
                                document.getElementById("nbrArgumente").innerHTML = response.qualifArg;
                                document.getElementById("prctArgumente").innerHTML = prctArgumente;
                                document.getElementById("nbrPositif").innerHTML = response.qualifPos;
                                document.getElementById("prctPositif").innerHTML = prctPositif;
                                document.getElementById("nbrNoArgumente").innerHTML = response.nonArgumenter;
                                document.getElementById("nbrRDV").innerHTML = response.fiches;
                                document.getElementById("presenceTime").innerHTML = response.heure_presence;
                                document.getElementById("debriefTime").innerHTML = response.debrief;
                                document.getElementById("cafeTime").innerHTML = response.pause;
                                document.getElementById("prodTime").innerHTML = response.heure_prod;
                                document.getElementById("non_argumenter").innerHTML = response.nonArgumenter;
                                document.getElementById("argumenter").innerHTML = response.qualifArg;
                                document.getElementById("pourc_argumenter").innerHTML = prctArgumente;
                                document.getElementById("positive").innerHTML = response.qualifPos;
                                document.getElementById("pourc_positive").innerHTML = prctPositif;
                                document.getElementById("fiches").innerHTML = response.fiches;
                            }
                        },
                    });*/

                }else if(status == 401){
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: msg,
                        showConfirmButton: true,
                        timer: 1000
                    });
                }
                else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: msg,
                        showConfirmButton: true,
                        timer: 500
                    });
                }
                    
                },
        });
    });

    //// get Agent statictics
    $(document).ready(function(){
       /*setInterval(function(){
            $.ajax({
                url: 'get_live_statistic_agent/',
                type: "GET",
                success:function(response)
                {
                    
                    if(response.etat == 200){
                        var prctArgumente = Math.round((response.qualifArg /response.fiches)*100,2);
                        var prctPositif = Math.round((response.qualifPos /response.fiches)*100,2);
                        //var prctArgumente = (response.qualifArg /response.fiches)*100;
                        document.getElementById("nbrArgumente").innerHTML = response.qualifArg;
                        document.getElementById("prctArgumente").innerHTML = prctArgumente;
                        document.getElementById("nbrPositif").innerHTML = response.qualifPos;
                        document.getElementById("prctPositif").innerHTML = prctPositif;
                        document.getElementById("nbrNoArgumente").innerHTML = response.nonArgumenter;
                        document.getElementById("nbrRDV").innerHTML = response.fiches;
                        document.getElementById("presenceTime").innerHTML = response.heure_presence;
                        document.getElementById("debriefTime").innerHTML = response.debrief;
                        document.getElementById("cafeTime").innerHTML = response.pause;
                        document.getElementById("prodTime").innerHTML = response.heure_prod;
                        document.getElementById("non_argumenter").innerHTML = response.nonArgumenter;
                        document.getElementById("argumenter").innerHTML = response.qualifArg;
                        document.getElementById("pourc_argumenter").innerHTML = prctArgumente;
                        document.getElementById("positive").innerHTML = response.qualifPos;
                        document.getElementById("pourc_positive").innerHTML = prctPositif;
                        document.getElementById("fiches").innerHTML = response.fiches;

                    }
                },
            });
        },1000); */
    });

    ////Send new contact info
    $('#RegisternewInfoContact').on('submit',function(e){
        e.preventDefault();

        let first_name = $('#first_name').val();
        let last_name = $('#last_name').val();
        let adr1 = $('#adr1').val();
        let city = $('#city').val();
        let postal_code = $('#postal_code').val();
        let phone_number = $('#phone_number').val();
        let alt_phone = $('#alt_phone').val();
        let email = $('#email').val();
        let commentaire = $('#commentaire').val();
        let lead_id1 = $('#lead_id1').val();
        
        //// send contact info to controller
        $.ajax({
            url: 'register_new_contact_info/',
            type: "post",
            data:{
                    "_token":"{{csrf_token()}}",
                    first_name : first_name,
                    last_name : last_name,
                    adr1 : adr1,
                    city : city,
                    postal_code : postal_code,
                    phone_number : phone_number,
                    alt_phone : alt_phone,
                    email : email,
                    commentaire : commentaire,
                    lead_id : lead_id1,
        
                },
            success:function(response)
            {   
                /// return response
                status = response.etat;
                msg = response.msg;
                if(status == 200){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: msg,
                        showConfirmButton: true,
                        timer: 5000
                    });
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: msg,
                        showConfirmButton: true,
                        timer: 5000
                    });
                }
               
            },
        });
    });
</script>


<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection


