<?php


namespace App\Repository;
use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
USE DB;

class InfoRepository implements InfoRepositoryInterface
{
    //private $server = 'https://call3.callbk.tk';
    //private $SERVER = 'https://call3.harmoniecrm.com';
    private $userAdmin = '6666';
    private $passAdmin = 'Capital2023';

    private function server(){
        return "https://$_SERVER[HTTP_HOST]";
    }

    //// fonction qui modifier le status de la fiche (Qualification)
    public function UpdateDispo($request)
    {      
        //dd(Session::get('campaign'));
       if(!$request->dispo_choice ||  $request->dispo_choice == null){
            $data['etat'] = 401;
            $data['msg'] = 'stp, veuillez qualifiez votre fiche !!';
            return response()->json($data);
       }
        $dispo_choice = '';
        if($request->dispo_choice == "CALLBK"){
            $dispo_choice1 = "CBHOLD";
        }else{
            $dispo_choice1 = $request->dispo_choice;
        }

        $comments = $request->comments ? $request->comments : '';
        $CallBackrecipient = $request->CallBackrecipient ? $request->CallBackrecipient : '';
        $CallBackLeadStatus = $dispo_choice1;
        //dd($dispo_choice);
        $CallBackDatETimE = $request->date.' '.$request->hour.':00';
        $username = Session::get('user');
        $pass = Session::get('pass');
        $server_ip = Session::get('server_ip');
        $stage = Session::get('campaign');
        $agent_log_id =Session::get('agent_log_id');
        $campaign = Session::get('campaign');
        $session_name = Session::get('session_name');
        $session_id = Session::get('conf_exten');
        $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',$campaign)->first();
        $camp_script = $campaignInfo->campaign_script != '' ? $campaignInfo->campaign_script.'' : '';
        $dial_method = $campaignInfo->dial_method;
        $auto_dial_level = $campaignInfo->auto_dial_level;
        $phone_login  = Session::get('phone_login');
        $phone_pass = Session::get('phone_pass');
        $customer_server_ip = '';
        $exten = Session::get('extension');
        $original_phone_login = Session::get('phone_login');
        $userLogged = DB::table('vicidial_users')->where('user',$username)->where('active','Y')->first();
        $LOGemail = $userLogged->email != '' ? $userLogged->email : '';
        $in_script = '';
        $lead_id = $request->lead_id; 
        $VU_user_group = $userLogged->user_group;
        $dispo_choice = $dispo_choice1; ////// choice qualif
        $list_id = $request->list_id;
        $CallBackDatETimE = $CallBackDatETimE == null ? '' : $CallBackDatETimE;
        //$CallBackrecipient = $CallBackrecipient;
        $use_internal_dnc = $campaignInfo->use_internal_dnc;
        $use_campaign_dnc = $campaignInfo->use_campaign_dnc;
        $LasTCID = '';
        $vtiger_callback_id = 0;
        $phone_number = $request->phone_number;
        $phone_code = $request->phone_code;
        $uniqueid = $request->uniqueid;
        $uniqueid1 = $request->uniqueid1;
        //$CallBackLeadStatus = $CallBackLeadStatus;
        $comments = $comments == null ? '' : $comments;
        $custom_field_names = '';
        $call_notes = '';
        $dispo_comments = '';
        $cbcomment_comments = '';
        $qm_dispo_code = '';
        $system_settings = DB::table('system_settings')->get()[0];
        $email_enabled = $system_settings->allow_emails;
        $recording = DB::table('routing_initiated_recordings')->select('recording_id','filename','launch_time')->where('user',$username)->where('processed',0)->orderBy('launch_time','DESC')->first();
        $VDDCU_recording_id = $recording->recording_id;
        $recording_filename = $recording->filename;
        $callback_gmt_offset = '';
        $callback_timezone = '';
        $customer_sec = '';
        $parked_hangup = '0';
        $MDnextCID = '';
        $called_count = $request->called_count;
        $http = new \GuzzleHttp\Client(); 
        $response3 = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
            'form_params' => [
                'server_ip' => $server_ip,
                'session_name' => $session_name,
                'user' => $username,
                'pass' => $pass,
                'orig_pass' => $pass,
                'lead_id'      => $lead_id,
                'stage'           => $lead_id,
                'phone_number'    => $phone_number, 
                'campaign'        => $campaign,
                'agent_log_id'    => $agent_log_id,
                'conf_exten'        => $session_id,
                'user_group'        => $VU_user_group,
                'ACTION'       => 'LeaDSearcHSelecTUpdatE'
            ],
        ]);
        $response2 = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
            'form_params' => [
                'server_ip' => $server_ip,
                'session_name' => $session_name,
                'user' => $username,
                'pass' => $pass,
                'orig_pass' => $pass,
                'dispo_choice' => $dispo_choice,
                'lead_id'      => $lead_id,
                'campaign' => $campaign,
                'auto_dial_level' => $auto_dial_level,
                'agent_log_id'    => $agent_log_id,
                'CallBackDatETimE'=> $CallBackDatETimE,
                'list_id'         => $list_id,
                'recipient'       => $CallBackrecipient,
                'use_internal_dnc'=> $use_internal_dnc,
                'use_campaign_dnc'=> $use_campaign_dnc,
                'MDnextCID'       => $MDnextCID,
                'stage'           => 'end', 
                'vtiger_callback_id'=> $vtiger_callback_id,
                'phone_number'    => $phone_number,
                'phone_code'      => $phone_code, 
                'dial_method'     => $dial_method,
                'uniqueid'     => $uniqueid == 0 ? $uniqueid1 : $uniqueid , 
                'CallBackLeadStatus' => $CallBackLeadStatus,
                'comments'        => $comments,
                'custom_field_names'=> $custom_field_names,
                'call_notes'      => $call_notes,
                'dispo_comments'  => $dispo_comments,
                'cbcomment_comments'=> $cbcomment_comments,
                'qm_dispo_code'   => $qm_dispo_code,
                'email_enabled'   => $email_enabled,
                'recording_id'    => $VDDCU_recording_id,
                'recording_filename' => $recording_filename,
                'called_count'    => $called_count,
                'parked_hangup'   => $parked_hangup,
                'phone_login'     => $phone_login,///
                'agent_email'     => $LOGemail,
                'conf_exten'        => $session_id,
                'camp_script'       => $camp_script,
                'in_script'         => $in_script,
                'customer_server_ip'=> $customer_server_ip,
                'exten'             => $exten,
                'original_phone_login'=> $phone_login,
                'phone_pass'        => $phone_pass,
                'callback_gmt_offset' => $callback_gmt_offset,
                'callback_timezone'      => $callback_timezone,
                'customer_sec'=> $customer_sec,
                'call_server_ip' => '',
                'format'       =>'text',
                'ACTION'       => 'updateDISPO'
            ],
        ]);
        $content = $response2->getBody()->getContents();
            
        if($request->agent_status == 1){
            $agent_status = 'READY';
            $changeStatus = $this->ChangeStatus($agent_status);
        }else{
            $agent_status = 'PAUSED';
            $changeStatus = $this->ChangeStatus($agent_status);
        }
        $changeStatus = $changeStatus->getContent();
        $changeStatus = json_decode($changeStatus);
        
        if(str_contains($content,'Lead '.$lead_id.' has been changed to '.$dispo_choice.' Status') && $response2->getStatusCode() == 200){
            $data['etat'] = 200;
            $data['changeStatus'] = $changeStatus;
            $data['msg'] = "L'appel est qualifié avec succés";
            $data['dispo_choice'] = $dispo_choice;
            $data['etatAgent'] = $changeStatus->etatAgent;
            return response()->json($data);

        }else{
            $data['etat'] = 500;
            $data['msg'] = "erreur de systeme, veuillez actualisez la page !";
            $data['etatAgent'] = '';
            return response()->json($data);

        }
    }
    public function updateQualifContact($request){

        $dispo_choice = '';
        if($request->qualif == "CALLBK"){
            $dispo_choice1 = "CBHOLD";
        }else{
            $dispo_choice1 = $request->sub_qualif;
        }
        //dd($dispo_choice1);
        $comments = $request->comments ? $request->comments : '';
        $CallBackrecipient = $request->CallBackrecipient ? $request->CallBackrecipient : '';
        $CallBackLeadStatus = $dispo_choice1;
        
        $CallBackDatETimE = $request->date.' '.$request->hour.':00'; 
        $timezone  = +1;
        $now =  gmdate("Y-m-d H:i", time() + 3600*($timezone+date("I")));

        $username = Session::get('user');
        $user = DB::table('vicidial_list')->where('user',$username)->first();
        $list_id = $request->list_id;
        $lead_id = $request->lead_id;
        $campaign = Session::get('campaign');
        $dispo_choice = $dispo_choice1;
        if($dispo_choice1 == 'CBHOLD'){
            $callback = DB::table('vicidial_callback')->insert([
                'lead_id' => $lead_id, 
                'list_id' => $list_id,
                'campaign_id' => $campaign,
                'status' =>  'LIVE',
                'entry_time' =>  $now,
                'callback_time' =>  $CallBackDatETimE,
                'user' =>  $username,
                'recipient' =>  $CallBackrecipient,
                'user_group'=> $user->user_group,
                'lead_status'=> $CallBackLeadStatus,
                'customer_time'=> $CallBackDatETimE,
                'comments' =>  $comments,
            ]);
        }
        $list = DB::table('vicidial_list')->where('lead_id',$lead_id)->where('list_id',$list_id)->where('user',$username)
            ->update([
                'status' => $dispo_choice,
            ]);
        $list = DB::table('vicidial_log')->where('lead_id',$lead_id)->where('list_id',$list_id)->where('user',$username)->where('campaign_id',$campaign)
            ->update([
                'status' => $dispo_choice,
            ]);

        $data = [];
        $data['etat'] = 200;
        $data['msg'] = 'La Fiche a était requalifiée avec succes';
        return redirect()->back()->with(['success'=>$data]);
        
    }
    //// fonction qui récuperer les information d'un fiche a partir de lead_id
    public function getLeadInfo($lead_id){
        if($lead_id && $lead_id>0){
            $data = [];
            $user = Session::get('user');
            $lead_id = $lead_id;
            //dd($user);
            $campaign = Session::get('campaign');
            $liveagent = DB::table('vicidial_live_agents')->where('user',$user)->first();
            if(!empty($liveagent)){
                $list = DB::table('vicidial_list')->where('user',$user)
                                                  ->where('lead_id',$lead_id)->first();
                //dd($list);
                if(!$list){
                    $data['lead'] ='';
                    $data['etat'] = 500;
                    return response()->json($data);
                }else{
                    $list_id = $list->list_id;
                    $vicidial_log = DB::table('vicidial_log')->select('uniqueid')->where('lead_id',$lead_id)->where('list_id',$list_id)->first();

                    $data['lead'] =$list;
                    $data['uniqueid'] = $vicidial_log->uniqueid;
                    $data['etat'] = 200;
                    $data['campaign'] = Session::get('campaign');
                    return response()->json($data);
                }
            }else{
                $data['lead'] ='aucun prospect avec ce lead';
                $data['etat'] = 500;
                return response()->json($data);
            }  

        }
    }
    

    ////modification des informations pour une fiche et inserer les nouvelles informations 
    public function RegisternewInfoContact($request){

        $data = [];
        $lead_id = $request->lead_id;
        $list = DB::table('vicidial_list')->where('lead_id',$lead_id)
                                              ->first();
        if(!empty($list)){
            $list = DB::table('vicidial_list')->where('lead_id',$lead_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'alt_phone' => $request->alt_phone,
                'address1' => $request->adr1,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'alt_phone' => $request->alt_phone,
                'email' => $request->email,
                'comments' => $request->commentaire,
            ]);
            $data['etat'] = 200;
            $data['msg'] = "les informations de contact sont modifiées avec succès";
            return response()->json($data);
        }else{
            $data['etat'] = 500;
            $data['msg'] = "erreur de systeme ! les informations de contact ne sont pas enregistrer ";
            return response()->json($data);
        }

    }
    public function RegisternewInfoContactPost($request){

        $data = [];
        $lead_id = $request->lead_id;
        $list = DB::table('vicidial_list')->where('lead_id',$lead_id)
                                              ->first();
        if(!empty($list)){
            $list = DB::table('vicidial_list')->where('lead_id',$lead_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'alt_phone' => $request->alt_phone,
                'address1' => $request->address1,
                'gender' => $request->gender,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'email' => $request->email,
            ]);
            $data['etat'] = 200;
            $data['msg'] = "les informations de contact sont modifiées avec succès";
            return redirect()->back()->with(['success'=>$data['msg']]);
        }else{
            $data['etat'] = 500;
            $data['msg'] = "erreur de systeme ! les informations de contact ne sont pas enregistrer ";
            return redirect()->back()->with(['error'=>$data['msg']]);
        }
    }
    //// fonction qui change le status de l'agent
    public function ChangeStatus($etatAgent){
  
        $value = '';
        if($etatAgent == 'PAUSED'){
            $VDRP_stage = 'READY';
            $temp_auto = 1;
            $temp_auto_code = 'NXDIAL';
            $VDRP_stage = 'READY';
            $AutoDialReady = 1;
			$AutoDialWaiting = 1;
            $VDRP_stage_seconds = 0;
            $ACTION = 'VDADready';
            $safe_pause_counter = 0;
        }elseif($etatAgent == 'READY'){
            $VDRP_stage = 'PAUSED';
            $temp_auto = 1;
            $temp_auto_code = 'RQUEUE';
            $VDRP_stage = 'PAUSED';
			$AutoDialReady = 0;
			$AutoDialWaiting = 0;
			$pause_code_counter = 0;
            $ACTION = 'VDADpause';
        }else{
            $VDRP_stage = '';
            $temp_auto = '';
            $temp_auto_code = '';
            $VDRP_stage = '';
            $AutoDialReady = '';
			$AutoDialWaiting = '';
            $VDRP_stage_seconds = '';
            $safe_pause_counter = '';
        }
        $stage = $VDRP_stage;
        $comments = '';//$request->comments;
        $VDRP_stage = $VDRP_stage;
        $AutoDialReady = $AutoDialReady;
        $AutoDialWaiting = $AutoDialWaiting;
        $session_name = Session::get('session_name');
        $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',Session::get('campaign'))->first();
        $dial_method = $campaignInfo->dial_method;
        $qm_extension = Session::get('extension');
        $auto_dial_level = $campaignInfo->auto_dial_level;
        if($VDRP_stage == 'PAUSED'){
            $agent_log = '';
        }else{
            $agent_log = 'NEW_ID'; 
        }
        $http = new \GuzzleHttp\Client(); 
        $response = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
            'form_params' => [
                'user' => Session::get('user'),
                'pass' => Session::get('pass'),
                'server_ip' => Session::get('server_ip'),
                'agent_log' => $agent_log,
                'stage' => $stage,
                'agent_log_id' => Session::get('agent_log_id'),
                'session_name' => Session::get('session_name'),
                'dial_method' => $dial_method,
                'comments' => $comments,
                'campaign' => Session::get('campaign'),
                'wrapup'   => 'WRAPUP',
                'VDRP_stage' => $VDRP_stage,
                'AutoDialReady' => $AutoDialReady,
                'AutoDialWaiting' => $AutoDialWaiting,
                'auto_dial_level' => $auto_dial_level,
                'qm_extension' => $qm_extension,
                'ACTION'     => $ACTION,
            ],
        ]);

        $content = $response->getBody()->getcontents();
        //dd($content);

        if(str_contains($content,'READY')){
            $data['etatAgent'] = 'READY'; 
        }elseif(str_contains($content,'Agent '.Session::get('user').' is now in status PAUSED')){
            $data['etatAgent'] = 'PAUSED';
            Session::forget('agent_log_id');
            $j_encoded = json_encode($content);
            //dd($j_encoded,$content);
            //$content = explode(':',$j_encoded);
            //dd($content);
            $content = explode('\n',$j_encoded);
            
            
            $content = explode('\n',$content[2]);
            
            $data['agent_log_id'] = $content[0];
            Session::put('agent_log_id', $data['agent_log_id']);
        }elseif(str_contains($content,'PAUSED')){
            $data['etatAgent'] = 'PAUSED';
            Session::forget('agent_log_id');
            $content = explode(':',$content);
            $content = explode('\n',$content[1]);
            $data['agent_log_id'] = $content[1];
            Session::put('agent_log_id', $data['agent_log_id']);
            

        }else{
            $data['etatAgent'] = $etatAgent;
        }
        //dd(Session::all());
        $data['etat'] = 200;
        return response()->json($data);
    }
}