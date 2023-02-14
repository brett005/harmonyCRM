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
                    }else if(response.etat == 500){
                        
                        clearInterval(channel);
                        //$("#delogguer").modal({backdrop: 'static', keyboard: false}, 'show');
                        $('#delogguer').show();
                    }

                },
            });
        },5000);
    })


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
        },3000);
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
                                    //start();
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
                                    ChangeToIncall(); 
                                }
                            },
                        });
                    }
                }  
            },1000);
    });

    ////change agent stat to incall and get contact information for the live call
    //const ChangeToIncallIntervale = setInterval(ChangeToIncall, 1000);

    function ChangeToIncall()
    {
        phone = document.getElementById('phone_number').value;
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
                        //stop();
                        $('.btn_mute').css('display','block');
                        $(".Mute").removeClass('btn-warning');
                        $(".Mute").addClass('btn-danger');
                        $(".Mute").html('Audio Off');
                        $(".Mute").attr("data-value",'off');

                        
                        $(".dashboard_panel").removeClass('darkBackground');
                        $('.bloc_incall').css('display','block');
                        $('.bloc_attente').css('display','none');
                        $('.dashboard_agent').css('display','none'); 
                        
                        $('#class').css('display','block'); 
                        $('#racc').css('display','block'); 
                        $('#ReClass').css('display','none');
                        $('#timeINCALL').css('display','block'); 
                        //stop();
                        document.getElementById('first_name').value = response.first_name;
                        document.getElementById('last_name').value = response.last_name;
                        document.getElementById('adr1').value = response.address1;
                        document.getElementById('city').value = response.city;
                        document.getElementById('postal_code').value = response.postal_code;
                        document.getElementById('phone_number').value = response.phone_number;
                        document.getElementById('alt_phone').value = response.alt_phone;
                        document.getElementById('email').value = response.email;
                        document.getElementById('commentaire').value = response.comments;
                        //stop();

                        document.getElementById('agentchannel').value = response.agentchannel;
                        document.getElementById('uniqueid').value = response.uniqueid;
                        document.getElementById('list_id').value = response.list_id;
                        document.getElementById('lead_id').value = response.lead_id;
                        document.getElementById('lead_id1').value = response.lead_id;
                        document.getElementById('called_count').value = response.called_count;
                        /////////
                        document.getElementById('phone_code').value = '33';
                        //stop();
                        
                        /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${response.phone_number}</span> / <span><i class="text-success fa fa-fax"></i>${response.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${response.adr4_libelle_voie}</span> / ${response.contact_cp} / ${response.contact_ville} / ${response.adr1_civilite_abrv} / ${response.contact_nom} / ${response.contact_prenom}`);*/
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
                                            //document.getElementById("timePAUSED").innerHTML = afficher;
                                            //document.getElementById("timePAUSEDAgent").innerHTML = afficher;
                                            
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
                                            //document.getElementById("timeINCALL1").innerHTML = afficher;
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
            phone_number = document.getElementById('phone_number').value;
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
                        $('.dispo').css('display','block'); 
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
            phone_number = document.getElementById('phone_number').value;
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
                        $('.dispo').css('display','block');          
                    }
                },
            });
        }  
    }


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
                    //start();
                    ChangeToIncall();
                    lead = response.lead;
                    uniqueid = response.uniqueid1;
                    channel = response.channel;
                    agentchannel = response.agentchannel;
                    $(".dashboard_panel").removeClass('darkBackground');
                    $('.bloc_incall').css('display','block');
                    $('.bloc_attente').css('display','none');
                    $('.dashboard_agent').css('display','none');
                    $('.btn_mute').css('display','block');
                    $('#class').css('display','block'); 
                    $('#ReClass').css('display','none');                   
                    document.getElementById('agentchannel').value = agentchannel;
                    document.getElementById('channel').value = channel;
                    document.getElementById('first_name').value = lead.first_name;
                    document.getElementById('last_name').value = lead.last_name;
                    document.getElementById('adr1').value = lead.address1;
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
                    /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${lead.phone_number}</span> / <span><i class="text-success fa fa-fax"></i>${lead.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${lead.adr4_libelle_voie}</span> / ${lead.contact_cp} / ${lead.contact_ville} / ${lead.adr1_civilite_abrv} / ${lead.contact_nom} / ${lead.contact_prenom}`);*/
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
                    $('#manDial').append(`<button class="btn btn-success" onclick=ManualDial(${lead.phone_number})><i class="fa fa-phone"></i> Appeler</button>`); /// add url to button send
                    $('.send_msg').attr('href', 'send_msg_contact/'+lead.lead_id);
                    $(".dashboard_panel").removeClass('darkBackground');
                    $('#ReClass').css('display','block');
                    $('#class').css('display','none');
                    $('#timeINCALL').css('display','none');
                    $('#racc').css('display','none');
                    $('.bloc_incall').css('display','block');
                    $('.bloc_attente').css('display','none');
                    $('.dashboard_agent').css('display','none');                   
                    //$('.dispo').css('display','block'); 
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
                    /*$("#info-ctc-name").html(`<span><i class="text-success fa fa-phone"></i>${lead.phone_number}</span> / <span><i class="text-success fa fa-fax"></i>${lead.contact_tel}</span> / <span><i class="text-success fa fa-map"></i>${lead.adr4_libelle_voie}</span> / ${lead.contact_cp} / ${lead.contact_ville} / ${lead.adr1_civilite_abrv} / ${lead.contact_nom} / ${lead.contact_prenom}`);*/
                    
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
        $('.dispo').css('display','block'); 
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


////// get calls logs and last call log
    $(document).ready(function(){
        $.ajax({
            url: 'get_call_logs',
            type: 'post',
            success:function(response){
                console.log(response);
                status = response.status;
                calllogs = response.calllogs;
                $("#AllCallLogs").empty();
                calllogs.forEach(shoCallLogs);
            },
            complete: function(){
                $('#loader').hide();
                $('.result').show();
            }
        })
    })
    function shoCallLogs(element, index, array) {
        $('#AllCallLogs').append(`
            <tr>
                <td>${index + 1}</td>
                <td>${element.call_date}</td>
                <td class="sec${element.lead_id}">`+ GetSecLength(element.lead_id) +`</td>
                <td>${element.status}</td>
                <td>${element.phone_number}</td>
                <td>${element.first_name}  ${element.last_name}</td>
                <td>${element.campaign_id}</td>
                <td>${element.term_reason}</td>
                <td>
                    <button onclick="ManualDial(${element.phone_number})" data-phone="${element.phone_number}" class="btn btn-sm btn-success "><i class="fa fa-phone"></i></button>
                    <button onclick="getContactInfo(${element.lead_id})" data-phone="${element.phone_number}" class="btn btn-sm btn-info "><i class="fa fa-eye"></i></button>
                </td>    
            </tr>
        `);        
    }
    function GetSecLength(lead_id) {
        $.ajax({
            url: 'get_lenght_sec/'+lead_id,
            type: 'get',
            success:function(response){
                status = response.status;
                if(status = 200){
                   $(".sec"+lead_id).html(response.length_in_sec);
                }else{
                   $(".sec"+lead_id).html('/');
                }
            }
        })
    }
    $(document).ready(function(){
        $.ajax({
            url: 'get_last_call_logs',
            type: 'post',
            success:function(response){
                console.log(response);
                status = response.status;
                calllogs = response.calllogs;
                $("#LastCallLogs").empty();
                calllogs.forEach(showlastCallLogs);
            },
            complete: function(){
                $('#loader').hide();
                $('.result').show();
            }
        })
    });

    function showlastCallLogs(element, index, array) {
        $('#LastCallLogs').append(`
            <tr>
                <td>${index + 1}</td>
                <td>${element.modify_date}</td>
                <td class="sec${element.lead_id}">`+ GetSecLength(element.lead_id) +`</td>
                <td>${element.status}</td>
                <td>${element.phone_number}</td>
                <td>${element.first_name}  ${element.last_name}</td>
               
                <td>
                    <button onclick="ManualDial(${element.phone_number})" data-phone="${element.phone_number}" class="btn btn-sm btn-success "><i class="fa fa-phone"></i></button>
                    <button onclick="getContactInfo(${element.lead_id})" data-phone="${element.phone_number}" class="btn btn-sm btn-info "><i class="fa fa-eye"></i></button>
                </td>    
            </tr>
        `);        
    }


function myFunctionDate(sel, day, el){
    document.getElementById('date').value = sel;
}
///// update dispo (qualification de la fiche)
    $('#Update_dispo').on('submit',function(e){
        $("#LastCallLogs").empty();
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
                    
                   /////////
                    document.getElementById('phone_code').value = '';          
                    $(".agentStatusButton").attr("data-value",response.etatAgent);                                
                    $(".agentStatusButton").html(response.etatAgent);
                    document.getElementById('etat_agent').value = response.etatAgent;
                    $('.bloc_incall').css('display','none');
                    $('.bloc_attente').css('display','none');
                    $('.dashboard_agent').css('display','block');
                    $('.dashboard_agent').css('display','block');
                    $('.time1').css('display','none');
                    $('.dispo').css('display','none');
                    $("input[type='radio'][class='sub_qualif']:checked").prop('checked', false);
                    $("input[type='checkbox'][name='agent_status']:checked").prop('checked', false);
                        
                    $.ajax({
                        url: 'get_last_call_logs',
                        type: 'post',
                        success:function(response){
                            console.log(response);
                            status = response.status;
                            calllogs = response.calllogs;
                            $("#LastCallLogs").empty();
                            calllogs.forEach(showlastCallLogs);
                        },
                        complete: function(){
                            $('#loader').hide();
                            $('.result').show();
                        }
                    });
                    $('.btn_mute').css('display','block');
                    $(".Mute").removeClass('btn-warning');
                    $(".Mute").addClass('btn-danger');
                    $(".Mute").html('Audio Off');
                    $(".Mute").attr("data-value",'off');
                    
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

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: msg + ' ' +response.dispo_choice,
                        showConfirmButton: true,
                        timer: 500
                    });

                   
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



////Edit contact info
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

/// write a phone number for a manualdail
    $("#writePhoneNumber").on('keyup',function(){
        //alert(this.value);
        $(".ManualDialPhone").attr('onclick','ManualDial('+this.value+')');
    });




////// send a request every 40 sec to get notification for callback (rappel)
    /*const getCallbackLive = setInterval(getLiveCallBack, 40000);
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
                    $('.callback_info').append(`
                        <a class="dropdown-item border-bottom" onclick=getContactInfo(${lead.lead_id}) >
                            <div class="d-flex align-items-center">
                                <div class="d-flex">
                                    <div class="ps-3 text-wrap text-break">
                                        <h6 class="mb-1"><span>${lead.first_name}</span> <span>${lead.last_name}</span></h6>
                                        <p class="fs-13 mb-1">${lead.phone_code} ${lead.phone_number}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        `); /// add url to button send
                    let sound = document.getElementById("audioNotify");
                    sound.play();
                    //document.getElementById("play").addEventListener("click", sound);
                    clearInterval(getCallbackLive);
                }
                else{ 
                    document.getElementById('callback_notification').innerHTML = 0;
                    $('.callback_info').html(``); /// add url to button send 
                }
            },
        });
    }*/
 