@extends('Agent.layouts.base-agent')
@section('title')
Agent
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}"> 
<link rel="stylesheet" href="{{asset('css/flipTimer.css')}}">
<link rel="stylesheet" href="{{asset('css/demo.css')}}">


<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
<link rel='stylesheet' href='https://unpkg.com/@fullcalendar/core@4.3.1/main.min.css'/>
<link rel='stylesheet' href='https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.css' />
<link rel='stylesheet' href='https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.css' />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('Agent/css/home.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Agent/css/index.css')}}">
<style type="text/css">

.card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    margin: 0;
    padding: 1.5rem 0.5rem;
    position: relative;
}
.panel-heading1 a.collapsed:before {

    top: 5px;
}
a{
    color:black;
}
#timeREADY {
    width: 300px;
    height: 80px;
    line-height: 70px;
    border: 1px dotted #333;
    text-align: center;
    margin-bottom: 20px;
    font-size: 37px;
    font-weight: bold;
    margin-top: 50px;
    
}
</style>
@endsection

@section('agent') 

 
         <!-- APP-CONTENT -->
          
					<!-- PAGE HEADER -->
                        
<div class="dashboard_agent">	
    <div class="page-header d-xl-flex d-block dashboard_agent" style="margin:0rem">
		<div class="page-leftheader">
			<div class="page-title">Agent<span class="font-weight-normal text-muted ms-2">Dashboard</span></div>
		</div>
	</div>
    <div class="row">
	    <div class="col-xl-12 col-lg-12 col-md-12">
			<div class="card">
				<div class="card-header border-bottom-0">
					<h3 class="card-title">List des contacts</h3>
				</div>
				<div class="card-body">
					<div class="card-pay">
						<ul class="tabs-menu nav">
							<li class=""><a href="#tab20" class="active" data-bs-toggle="tab"><i class="fa fa-list"></i> Journal D'appels</a></li>
							<li><a href="#tab21" data-bs-toggle="tab" class=""><i class="fa fa-calendar"></i> Rappels</a></li>
                            <li><a href="#tab22" data-bs-toggle="tab" class=""><i class="fa fa-phone-square"></i> Appel Manuel </a></li>
							<li><a href="#tab23" data-bs-toggle="tab" class=""><i class="fa fa-search"></i> Recherche </a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active show" id="tab20">
								
                                    @include('Agent.includes.components.searchleadsCall')
                                    @include('Agent.includes.components.pannelLastCall')
                                    
                                    @include('Agent.includes.components.pannelHistoryCalls')
                                    
						    </div>
							<div class="tab-pane" id="tab21">
								
							    <div id="calendar"></div>
					        </div>
                            <div class="tab-pane" id="tab22">
                                @include('Agent.includes.components.pannelManDial')
                            </div>
                            <div class="tab-pane" id="tab23">
                                @include('Agent.includes.components.pannelSearch')
                            </div>
							
						</div>
					</div>
				</div>
			</div>
            
        </div> 
    </div>
</div>
<div class="bloc_attente" style="display:none;margin-top:40px">
    @include('Agent.includes.components.pannelAttente')
</div>
<div class="row bloc_incall" style="display:none">
    <div class="" >
        <div class="card box-widget widget-user">
            <div class="card-body text-center">
                <div class="card-header  border-0">
                    <div id="timeINCALL"></div>
                </div>
                <div class="row" >
                    @include('Agent.includes.components.pannelReClassFile')
                    @include('Agent.includes.components.pannelClassFile')
                </div>
            </div>
            <div id="content_ecran_conf" style="padding: 10px;">
                <!-- Modal de qualification de la fiche (appel) -->
                @include('Agent.includes.components.pannelDispo')
                @include('Agent.includes.components.pannelProspectInfo')
            </div>    
        </div>
    </div>
</div>
<!-- END ROW -->
   <!-- Modal for bad connecte -->
   @include('Agent.includes.modals.delogguer')

<!-- 
<audio id="audioNotify" src="{{asset('audio_notification.wav')}}" type="audio/wav" autoplay="true">
     
</audio>  -->
<!-- affichage de webphone -->
   @include('Agent.includes.components.webphone')

</div>
@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/agents/metro.min.js')}}"></script>
<script src="{{asset('Agent/js/searchLead.js')}}"></script>
<script src="{{asset('Agent/js/searchCalls.js')}}"></script>
<script src="{{asset('Agent/js/agent.js')}}"></script>
<script src="https://unpkg.com/@fullcalendar/core@4.3.1/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/interaction@4.3.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/daygrid@4.3.0/main.min.js"></script>
<script src="https://unpkg.com/@fullcalendar/timegrid@4.3.0/main.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $('.rrecording').click(function(){
        //alert("ded");
        status = $(".recording").attr("data-value"); // get user live status
        uniqueid = document.getElementById('uniqueid1').value;
        lead_id = document.getElementById('lead_id1').value;
        //alert(status);
        $.ajax({
                url: 'recording/',   /// send status in request
                type: "post",
                data:{
                    status:status,
                    lead_id:lead_id,
                    uniqueid:uniqueid
                },
                success:function(response)
                {

                    if(response.etat == 200){
                                                        
                        if(response.status == 'StopMonitorConf'){
                            $(".recording").html('Start Recording');
                            $(".recording").attr("data-value",'STOP');
                        }else{
                            $(".recording").html('Stop Recording');
                            $(".recording").attr("data-value",'START');
                        }
                    }
                },
            });
    });

    $('.Mute').click(function(){
        //alert("ded");
        status = $(".Mute").attr("data-value"); // get user live status
        uniqueid = document.getElementById('uniqueid1').value;
        lead_id = document.getElementById('lead_id1').value;
        channel = document.getElementById('channel').value;
        //alert(status);
        $.ajax({
            url: 'mute_recording/',   /// send status in request
            type: "post",
            data:{
                status:status,
                lead_id:lead_id,
                uniqueid:uniqueid,
                channel:channel,
            },
            success:function(response)
            {
                if(response.etat == 200){
                                                    
                    if(response.status == 'off'){
                        $(".Mute").removeClass('btn-danger');
                        $(".Mute").addClass('btn-warning');
                        $(".Mute").html('Audio On');
                        $(".Mute").attr("data-value",'on');
                    }else if(response.status == 'on'){
                        $(".Mute").removeClass('btn-warning');
                        $(".Mute").addClass('btn-danger');
                        $(".Mute").html('Audio Off');
                        $(".Mute").attr("data-value",'off');
                    }
                }
            },
        });
    });
</script>
<script>
    
    /*$('#play').click(function(){
        let sound = document.getElementById("audioNotify");
        sound.play();
    });*/

    
     
   
    
   
</script>

<script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'timeGrid' ],
                defaultView: 'timeGridWeek',
                selectable: true,
                customButtons: {
                    periode: {
                        text: 'TEMPO',
                        click: function() {
                            //
                        }
                    },
                },
                header: {
                    left: 'prev,next hours cp recup',
                    center: 'title',
                },
                droppable: true,
                eventLimit: true,
                locale: 'fr',
                weekNumbers: true,
                firstDay: 1,
                events : [
                    @foreach($callbacks as $callback)
                        {
                            id : '{{$callback->lead_id}}',
                            title : '{{$callback->first_name . ' ' . $callback->last_name}}',
                            start : '{{ \Carbon\Carbon::parse($callback->callback_time)->format('Y-m-d') . 'T'.\Carbon\Carbon::parse($callback->callback_time)->format('H:i') }}',
                            //url : '{{route('get_lead_info', $callback->lead_id)}}',
                            
                            color: '#BADA55',
                        },
                    @endforeach
                ],
                
                eventClick: function(info) {
                    document.getElementById('first_name').innerHTML = '';
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
                    lead_id = info.event.id;
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
                                $('#manDial').empty();
                                //$('#manDial').attr('onclick', ManualDial(lead.contact_tel)); /// add url to button send 
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
                                $('.btn_mute').css('display','block');                  
                                document.getElementById('first_name').innerHTML = lead.first_name;
                                document.getElementById('last_name').value = lead.last_name;
                                document.getElementById('adr1').value = lead.address1;
                                document.getElementById('city').value = lead.city;
                                document.getElementById('postal_code').value = lead.postal_code;
                                document.getElementById('phone_number').value = lead.phone_number;
                                document.getElementById('alt_phone').value = lead.alt_phone;
                                document.getElementById('email').value = lead.email;
                                document.getElementById('commentaire').value = lead.comments;
                               
                                document.getElementById('list_id').value = lead.list_id;
                                document.getElementById('lead_id').value = lead.lead_id;
                                document.getElementById('lead_id1').value = lead.lead_id;
                                document.getElementById('called_count').value = lead.called_count;
                                /////////
                                document.getElementById('phone_code').value = '33';
                                /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${lead.phone_number}</span> / <span><i class="text-success fa fa-fax"></i>${lead.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${lead.adr4_libelle_voie}</span> / ${lead.contact_cp} / ${lead.contact_ville} / ${lead.adr1_civilite_abrv} / ${lead.contact_nom} / ${lead.contact_prenom} <span class="bg-red" style="color:white"> RAPPEL</span>`);*/
                            }else{
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'erreur de systeme, veuillez contactez le support !',
                                    showConfirmButton: true,
                                    timer: 1500
                                });
                            }
                                
                            },
                    });
                },
                
                
        });
        
        calendar.render();
        $('.fc-today-button').text("Aujourd'hui");
        //Configuration de locale momentjs
        moment.locale('fr', {
            months : 'janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre'.split('_'),
            monthsShort : 'janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.'.split('_'),
            monthsParseExact : true,
            weekdays : 'dimanche_lundi_mardi_mercredi_jeudi_vendredi_samedi'.split('_'),
            weekdaysShort : 'dim._lun._mar._mer._jeu._ven._sam.'.split('_'),
            weekdaysMin : 'Di_Lu_Ma_Me_Je_Ve_Sa'.split('_'),
            weekdaysParseExact : true,
            longDateFormat : {
                LT : 'HH:mm',
                LTS : 'HH:mm:ss',
                L : 'DD/MM/YYYY',
                LL : 'D MMMM YYYY',
                LLL : 'D MMMM YYYY HH:mm',
                LLLL : 'dddd D MMMM YYYY HH:mm'
            },
            calendar : {
                sameDay : '[Aujourd’hui à] LT',
                nextDay : '[Demain à] LT',
                nextWeek : 'dddd [à] LT',
                lastDay : '[Hier à] LT',
                lastWeek : 'dddd [dernier à] LT',
                sameElse : 'L'
            },
            relativeTime : {
                future : 'dans %s',
                past : 'il y a %s',
                s : 'quelques secondes',
                m : 'une minute',
                mm : '%d minutes',
                h : 'une heure',
                hh : '%d heures',
                d : 'un jour',
                dd : '%d jours',
                M : 'un mois',
                MM : '%d mois',
                y : 'un an',
                yy : '%d ans'
            },
            dayOfMonthOrdinalParse : /\d{1,2}(er|e)/,
            ordinal : function (number) {
                return number + (number === 1 ? 'er' : 'e');
            },
            meridiemParse : /PD|MD/,
            isPM : function (input) {
                return input.charAt(0) === 'M';
            },
            // In case the meridiem units are not separated around 12, then implement
            // this function (look at locale/id.js for an example).
            // meridiemHour : function (hour, meridiem) {
            //     return /* 0-23 hour, given meridiem token and hour 1-12 */ ;
            // },
            meridiem : function (hours, minutes, isLower) {
                return hours < 12 ? 'PD' : 'MD';
            },
            week : {
                dow : 1, // Monday is the first day of the week.
                doy : 4  // Used to determine first week of the year.
            }
        });
        moment.locale("fr");
        var html = "<div><select id=\"select\">";
        for (let i = 0; i <= 3; i++) {
            var debut = moment().add(i, "w").startOf('isoWeek').format('D|MM|YYYY') + "-" + moment().add(i, "w").endOf('isoWeek').format('D|MM|YYYY');
            html = html.concat("<option value=\""+debut+"\">"+debut+"</option>")
        }
        html = html.concat('</div>');
        var datetime = moment().add(0, "w").startOf('isoWeek').format('YYYY-MM-D');
        $('.date').val(datetime + 'T08:00');
        $('.date_end').val(datetime + 'T12:30');
        $('.fc-periode-button').html(html);
        $('#submit').click(function() {
            var form = $('#addEmployee');
            $.ajax({
                method: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                dataType: "json"
            })
            .done(function(data) {
                location.reload();
            })
            .fail(function(data) {
                console.log(data);
            });
        });
        
    });
</script>

<script>
$(document).ready(function () {
    $('#example').DataTable();
});

</script>
@endsection

