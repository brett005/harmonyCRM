<?php


namespace App\Repository;
use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
USE DB;

class CallRepository implements CallRepositoryInterface
{
    //private $server = 'https://call3.callbk.tk';
    //private $SERVER = 'https://call3.harmoniecrm.com';
    private $userAdmin = '6666';
    private $passAdmin = 'Capital2023';

    private function server(){
        return "https://$_SERVER[HTTP_HOST]";
    }

    //// fonction qui récuperer le status de l'agent
    public function getAgentStatus(){
        $agent = DB::table('vicidial_live_agents')->where('user',Session::get('user'))->first();
        if($agent){
            $data['etatAgent'] = $agent->status;
            $data['etat'] = 200;
            $data['msg'] = "success, Vous etes connectee";
            return response()->json($data);
        }else{
            $data['etat'] = 500;
            $data['etatAgent'] = 'error';
            $data['msg']  = "Erreur, Vous n'etes pas connectee";
            return response()->json($data);
        }
       
        return response()->json($data);
    }

    //// fonction qui refresh le random_id in vicidial_live_agent chaque 1 second
    public function refreshIncall(){
        if(!empty(Session::get('user'))){
            $random = (rand(1000000, 9999999) + 10000000);
            $liveagent = DB::table('vicidial_live_agents')->where('user',Session::get('user'))->where('server_ip',Session::get('server_ip'))->update([
                    'random_id'=>$random
                ]);
            $data['etat'] = 200; 
            return response()->json($data);
        }
    }

    //// fonction qui récuperer channel de l'appel pour un agent
    public function getChannel(){
        
        if(!empty(Session::get('user'))){
            $user = Session::get('user');
            $server_ip = Session::get('server_ip');

            $random = (rand(1000000, 9999999) + 10000000);
            $liveagent = DB::table('vicidial_live_agents')->where('user',$user)->where('server_ip',$server_ip)->update([
                    'random_id'=>$random
                ]);
            $liveagent = DB::table('vicidial_live_agents')->where('user',$user)->where('server_ip',$server_ip)->first();
            if($liveagent->lead_id > 0){
                $data['msg'] = 'lead affecter';
                $data['etat'] = 200; 
                $data['channel'] = $liveagent->channel;
                $data['lead_id'] = $liveagent->lead_id;
                return response()->json($data);

            }else{
                $data['msg'] = 'aucun lead affecter';
                $data['etat'] = 201;
                $data['channel'] = '';
                $data['lead_id'] = 0;

                return response()->json($data);
            }
        }
    }

    //// change status to incall for agent
    public function ChangeIncall($request){
        if(!empty(Session::get('user'))){
            $user = Session::get('user');
            $pass = Session::get('pass');
            $phone_login = Session::get('phone_login');
            $phone_pass = Session::get('phone_pass');
            $agent_log_id = Session::get('agent_log_id');
            $campaign = Session::get('campaign');
            $session_name = Session::get('session_name');
            $conf_exten = Session::get('conf_exten');
            $extension = Session::get('extension');
            $server_ip = Session::get('server_ip');
            $orig_pass = Session::get('pass');
                        
            $userLogged = DB::table('vicidial_users')->where('user',$user)->where('active','Y')->first();
            $LOGemail = $userLogged->email != '' ? $userLogged->email : '';
            $agent_email = $LOGemail;
            $conf_exten = $request->conf_exten;
            $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',$campaign)->first();
            $camp_script = $campaignInfo->campaign_script != '' ? $campaignInfo->campaign_script.'' : '';
            $in_script = '';//$request->CalL_ScripT_id;
            $customer_server_ip = '';//$request->lastcustserverip;
            $exten = $request->extension;
            $original_phone_login = $request->phone_login;
            $VDRP_stage = '';
            $previous_agent_log_id = $request->agent_log_id;
            $action = 'VDADcheckINCOMING';
            $http = new \GuzzleHttp\Client(); 
            $response1 = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'server_ip'         => $server_ip,
                    'session_name'      => $session_name,
                    'user'              => $user,
                    'pass'              => $pass,
                    'orig_pass'         => $orig_pass,
                    'campaign'          => $campaign,
                    'ACTION'            => $action,
                    'agent_log_id'      => $agent_log_id,
                    'phone_login'       => $phone_login,
                    'agent_email'       => $LOGemail,
                    'conf_exten'        => $conf_exten,
                    'camp_script'       => $camp_script,
                    'in_script'         => $in_script,
                    'customer_server_ip'=> $customer_server_ip,
                    'exten'             => $exten,
                    'original_phone_login'=> $original_phone_login,
                    'phone_pass'        => $phone_pass,
                    'VDRP_stage'        => $VDRP_stage,
                    'previous_agent_log_id'=> $previous_agent_log_id
                ],
            ]);
            $liveagent = DB::table('vicidial_live_agents')->where('user',$user)->where('server_ip',$server_ip)->first();

            if($response1->getStatusCode() == 200 && $liveagent->lead_id>0){
                
                $list = DB::table('vicidial_list')->where('lead_id',$liveagent->lead_id)->first();
                $phone = DB::table('phones')->where('login', $phone_login)
                                        ->where('pass', $phone_pass)
                                        ->where('active','Y')->first();
                                       
                $ext_context = $phone->ext_context;
                $conf_silent_prefix = '5';
                $channelrec = "Local/".$conf_silent_prefix.$conf_exten.'@'.$ext_context;
                
                $LiveSipChannel = DB::table('live_sip_channels')->where('server_ip',$server_ip)->where('extension',$conf_exten)->where('channel','LIKE','SIP/'.$user.'%')->first();
                //return $liveagent->channel;
                $data['agentchannel'] = $channelrec = "Local/".$conf_silent_prefix.$conf_exten.'@'.$ext_context;
                //$liveagent->channel;
                $data['uniqueid'] = $liveagent->uniqueid;

                $data['list_id'] = $list->list_id;
                $data['called_count'] = $list->called_count;
                $data['lead_id'] = $list->lead_id;
                $data['first_name'] = $list->first_name;
                $data['last_name'] = $list->last_name;
                $data['address1'] = $list->address1;
                //$data['gender'] = $list->gender;
                $data['postal_code'] = $list->postal_code;
                $data['city'] = $list->city;
                $data['phone_number'] = $list->phone_number;
                $data['alt_phone'] = $list->alt_phone;
                $data['email'] = $list->email;
                $data['comments'] = $list->comments;

                $data['etat'] = 200;
                $data['msg'] = 'success';
                return response()->json($data);
                
            }else{
                $data['etat'] = 401;
                $data['msg']  = "Erreur de serveur, on a pas pu récuperer la fiche de client"; 
                return response()->json($data);
            }
                

        }
    }

    /////// recuperer le temps d'appel de  l'agent (status == Incall)
    public function getTimeIncall($lead_id){
        $user = Session::get('user');
        $lead_id = $lead_id;
        $live_agent = DB::table('vicidial_live_agents')->where('user',$user)->where('lead_id',$lead_id)->first();
        $last_call = $live_agent->last_state_change;
        $date2 = date("H:i:s", strtotime($last_call));

        $timezone  = +1;
        $now =  gmdate("H:i:s", time() + 3600*($timezone+date("I")));
        $lastcall = explode(':',$date2);
        $timeInSec = ($lastcall[0]*3600)+($lastcall[1]*60)+$lastcall[2];

        $nowTime = explode(':',$now);
        $nowInSec = ($nowTime[0]*3600)+($nowTime[1]*60)+$nowTime[2];
        $diff = $nowInSec - $timeInSec;
        $data = [];
        $data['time'] = $diff;
        $data['etatAgent'] = $live_agent->status;
        $data['etat'] = 200;
        return response()->json($data);
    }

    //// fonction qui couper l'appel par l'agent (hangup)
    public function hangup($request){
        //dd(Session::get('user'));
        if(!empty(Session::get('user'))){            
            $data = [];
            $username = Session::get('user');
            $pass = Session::get('pass');
            $server_ip = Session::get('server_ip');
            $lead_id = $request->lead_id;
            $list_id = $request->list_id;
            $agent_log_id = Session::get('agent_log_id');
            $campaign = Session::get('campaign');
            $session_name = Session::get('session_name');
            $session_id = Session::get('conf_exten');
            $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',$campaign)->first();
            $camp_script = $campaignInfo->campaign_script != '' ? $campaignInfo->campaign_script.'' : '';
            $dial_method = $campaignInfo->dial_method;
            $qm_extension = Session::get('extension');
            $auto_dial_level = $campaignInfo->auto_dial_level;
            $user_abb = $username.$username.$username.$username;
            $user_abb = preg_replace("/^\./i","",$user_abb);
            $epoch_sec = date("U");
            $channel = $request->channel;
            //dd($channel);
            $queryCID = 'HLvdcW'.$epoch_sec.$user_abb;
            $phone_login  = Session::get('phone_login');
            $phone_pass = Session::get('phone_pass');
            $customer_server_ip = '';
            $exten = $request->extension;
            $userLogged = DB::table('vicidial_users')->where('user',$username)->where('active','Y')->first();
            $LOGemail = $userLogged->email != '' ? $userLogged->email : '';
            $in_script = '';
            $phone = DB::table('phones')->where('login',$phone_login)
                                    ->where('pass',$phone_pass)
                                    ->where('active','Y')->first();
            $taskMDstage = 'end';
            $conf_silent_prefix = '5';
            $ext_context = $phone->ext_context;
            $recording_exten = $phone->recording_exten;
            $VDstop_rec_after_each_call = $phone->VDstop_rec_after_each_call;
            $protocol = $phone->protocol;
            $LasTCID = '';
            $inOUT = 'OUT';
            $dialed_label = '';
            $agentchannel = $request->agentchannel;
            $conf_dialed = 0;
            $leaving_threeway = 0;
            $hangup_all_non_reserved= '1';
            $blind_transfer = 0;
            $nodeletevdac = '';
            $alt_num_status = 1;
            $leave_3way_start_recording_triggerCALL = 1;
            $leave_3way_start_recording_filename = '';
            $channelrec = "Local/".$conf_silent_prefix.$session_id.'@'.$ext_context;
            $called_count = $request->called_count; 
            $uniqueid = $request->uniqueid;
            $uniqueid1 = $request->uniqueid1;
            $phone_number = $request->phone_number;
            $phone_code = $request->phone_code;
           // dd($agentchannel);
            $http1 = new \GuzzleHttp\Client(); 
            $response1 = $http1->post($this->SERVER().'/agc/manager_send.php', [
                'form_params' => [
                    'user' => $username,
                    'pass' => $pass,
                    'server_ip' => $server_ip,
                    'queryCID' => $queryCID,
                    'session_name' => $session_name,
                    'log_campaign' => $campaign,
                    'qm_extension' => $qm_extension,
                    'channel'      => $channel,
                    'format'       =>'text',
                    'ACTION'       => 'Hangup'
                ],
            ]);

            $LiveSipChannel = DB::table('live_sip_channels')->where('server_ip',$server_ip)->where('extension',$session_id)->where('channel','LIKE','SIP/'.$username.'%')->first();
            //dd($LiveSipChannel);
            $http2 = new \GuzzleHttp\Client(); 
            $response2 = $http2->post($this->SERVER().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'server_ip' => $server_ip,
                    'session_name' => $session_name,
                    'stage'        => $taskMDstage,
                    'uniqueid'     => $uniqueid == 0 ? $uniqueid1 : $uniqueid,
                    'user' => $username,
                    'pass' => $pass,
                    'campaign'    => $campaign,
                    'lead_id'     => $lead_id,
                    'list_id'     => $list_id,
                    'length_in_sec'=> 0,
                    'phone_code'   => $phone_code,
                    'phone_number' => $phone_number,
                    'exten'        => $recording_exten,
                    'channel'      => $LiveSipChannel->channel,/////////
                    'start_epoch'  => 0,
                    'auto_dial_level'=> $auto_dial_level,
                    'VDstop_rec_after_each_call'=> $VDstop_rec_after_each_call,
                    'conf_silent_prefix'=> $conf_silent_prefix,
                    'protocol'   => $protocol,
                    'extension'  => $exten,
                    'ext_context'=> $ext_context,
                    'conf_exten' => $session_id,
                    'user_abb'   => $user_abb,
                    'agent_log_id' => $agent_log_id,
                    'MDnextCID' => $LasTCID,
                    'inOUT' => $inOUT,
                    'alt_dial' => $dialed_label,
                    'DB'       => 0,
                    'agentchannel' => $LiveSipChannel->channel,///////
                    'conf_dialed' => $conf_dialed,
                    'leaving_threeway' => $leaving_threeway,
                    'hangup_all_non_reserved' => $hangup_all_non_reserved,
                    'blind_transfer' => $blind_transfer,
                    'dial_method' => $dial_method,
                    'nodeletevdac' => $nodeletevdac,
                    'alt_num_status' => $alt_num_status,
                    'qm_extension' => $qm_extension,
                    'called_count' => $called_count,
                    'leave_3way_start_recording_trigger' => $leave_3way_start_recording_triggerCALL,
                    'leave_3way_start_recording_filename' => $leave_3way_start_recording_filename,
                    'channelrec' => $channelrec,
                    'format'       =>'text',
                    'ACTION'       => 'manDiaLlogCaLL'
                ],
            ]);
            //dd($response2->getBody()->getContents());
            $recording = DB::table('recording_log')->select('user','start_epoch','filename')->where('user',$username)->orderBy('start_epoch','DESC')->first();
            $channelrec1 = "Local/".$conf_silent_prefix.$session_id."@".$ext_context;

            $response = $http1->post($this->SERVER().'/agc/manager_send.php', [
                'form_params' => [
                    'user' => $username,
                    'pass' => $pass,
                    'server_ip' => $server_ip,
                    'queryCID' => $queryCID,
                    'session_name' => $session_name,
                    'channel'      => $channelrec1,
                    'filename'     => $recording->filename,
                    'lead_id'     => $lead_id,
                    'ext_priority'=> '1',
                    'FROMvdc'     => 'Y',
                    'FROMapi'     => '1',
                    'uniqueid'     => $uniqueid,
                    'ext_context'      => $ext_context,
                    'exten'        => $recording_exten,//$conf_silent_prefix.$session_id,
                    'format'       =>'text',
                    'ACTION'       => 'StopMonitor'
                ],
            ]);
            //dd($response1->getBody()->getContents());   
            $data['contents'] = $response1->getBody()->getContents();

            if(str_contains($data['contents'],'Hangup command sent for Channel')){
                $data['etat'] = 200;
                $data['statuses'] = DB::table('vicidial_campaign_statuses')->select('status','status_name')->distinct()->where('selectable','Y')->orderBy('status','ASC')->get();
            }
            $data['msg'] = 'Hangup with success';
            return response()->json($data);
        }
    }

    //// appel manual
    public function ManualDial($request){ 
        $user = Session::get('user');
        $phone_number = $request->phone_number;
        $phone_code = '33';
        $server_ip = Session::get('server_ip'); ///sesssion
        $session_name = Session::get('session_name'); ///sesssion
        $conf_exten = Session::get('conf_exten'); ///sesssion
        $user = Session::get('user'); ///sesssion
        $pass = Session::get('pass'); ///sesssion
        $phone_login = Session::get('phone_login'); ///sesssion
        $phone_pass = Session::get('phone_pass'); ///sesssion
        $campaign = Session::get('campaign'); //// session
        $phone_code = $phone_code; //// view
        
        $liveagent = DB::table('vicidial_live_agents')->where('user',$user)->first();
        if(!empty($liveagent)){

            $list = DB::table('vicidial_list')->where('phone_number',$phone_number)->orWhere('alt_phone',$phone_number)->first();
           // dd($list);
            if(!$list){
                $data['msg'] =  "Ce Numéro de télèphone n'existe pas dans nos enregistrement, veuillez verifier le numéro svp !!";
                return response()->json($data);
            }
            $vicidial_log = DB::table('vicidial_log')->select('uniqueid')->where('lead_id',$list->lead_id)->where('list_id',$list->list_id)->first();
            //dd($vicidial_log);
            $list_id = $list->list_id;
            $called_count = $list->called_count;
            $data['lead'] = $list;
            //$data['uniqueid'] = $vicidial_log->uniqueid;
            $data['etat'] = 200;            
            $lead_id = $data['lead']->lead_id;///
            $phone = DB::table('phones')->where('login',$phone_login)
                                        ->where('pass',$phone_pass)
                                        ->where('active','Y')->first();
            $recording_exten = $phone->recording_exten;
            $outbound_cid = $phone->outbound_cid;
            $ext_context = $phone->ext_context;
            $protocol = $phone->protocol;
            $VDstop_rec_after_each_call = $phone->VDstop_rec_after_each_call;
            $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',$campaign)->first(); 
            $dial_timeout = $campaignInfo->manual_dial_timeout;
            $manual_dial_prefix = $campaignInfo->manual_dial_prefix;
            $omit_phone_code = $campaignInfo->omit_phone_code;
            $dial_method = $campaignInfo->dial_method;
            $campaign_rec_filename = $campaignInfo->campaign_rec_filename;
            $prefix_choice = '';
            if(strlen($prefix_choice)>0){ $call_prefix = $prefix_choice; }else{ $call_prefix = $manual_dial_prefix; } 
            $dial_prefix = $call_prefix;
            $call_cid = $outbound_cid; 
            $campaign_cid = $call_cid; 
            $omit_phone_code = $request->omit_phone_code; 
            $usegroupalias = 1;
            $active_group_alias = ''; 
            $account = $active_group_alias; 
            $agent_dialed_number = $request->phone_number; /// view
            $dialed_label = 'MANUAL';
            $agent_dialed_type = $dialed_label; 
            $dial_method = $dial_method; 
            $agent_log_id = $request->agent_log_id; /// view
            $security = $data['lead']->security_phrase;  /// view
            $qm_extension = $request->extension;
            $LastCallCID='';
            $old_CID = $LastCallCID; 
            $cid_lock = 1; 
            $temp_rir = 'Y';
            $routing_initiated_recording = $temp_rir; 
            $exten = $recording_exten; 
            $recording_filename = $campaign_rec_filename; 
            //$channel = $request->channelrec;
            $conf_silent_prefix = '5';
            $channel = "Local/".$conf_silent_prefix.$conf_exten."@".$ext_context; 
            $vendor_lead_code = $data['lead']->vendor_lead_code;  /// view
            $state = $data['lead']->state; /// view 
            $postal_code = $data['lead']->postal_code;  /// view
            $ACTION = 'manDiaLonly';

            $http = new \GuzzleHttp\Client(); 
            $response2 = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'server_ip' => $server_ip, 
                    'session_name' => $session_name, 
                    'conf_exten' => $conf_exten, 
                    'user' => $user, 
                    'pass' => $pass, 
                    'lead_id' => $lead_id, ////
                    'phone_number' => $phone_number, 
                    'phone_code' => $phone_code, 
                    'campaign' => $campaign, 
                    'ext_context' => $ext_context, 
                    'dial_timeout' => $dial_timeout, 
                    'dial_prefix' => $dial_prefix, 
                    'campaign_cid' => $campaign_cid, 
                    'omit_phone_code' => $omit_phone_code, 
                    'usegroupalias' => $usegroupalias, 
                    'account' => $account, 
                    'agent_dialed_number' => $agent_dialed_number, 
                    'agent_dialed_type' => $agent_dialed_type, 
                    'dial_method' => $dial_method, 
                    'agent_log_id' => $agent_log_id, 
                    'security' => $security,
                    'qm_extension' => $qm_extension, 
                    'old_CID' => $old_CID, 
                    'cid_lock' => $cid_lock, 
                    'routing_initiated_recording' => $routing_initiated_recording, 
                    'exten' => $exten, 
                    'recording_filename' => $recording_filename, 
                    'channel' => $channel, 
                    'vendor_lead_code' => $vendor_lead_code, 
                    'phone_login' => $phone_login, 
                    'state' => $state, 
                    'postal_code' => $postal_code, 
                    'ACTION' => $ACTION,
                ],
            ]);

            $LiveSipChannel = DB::table('live_sip_channels')->where('server_ip',$server_ip)->where('extension',$conf_exten)->where('channel','LIKE',$channel)->first();
            $auto_dial_level = $campaignInfo->auto_dial_level;
            $inOUT = 'OUT';
            $hangup_all_non_reserved = 1;
            $blind_transfer = 0;
            $user_abb = $user.$user.$user.$user;
            $user_abb = preg_replace("/^\./i","",$user_abb);
            $conf_dialed = 0;
            $nodeletevdac = '';
            $alt_num_status = 1;
            $leave_3way_start_recording_trigger = 1;
            $leave_3way_start_recording_filename = '';
            
            $data['liveagent1'] = DB::table('vicidial_live_agents')->where('user',$user)->first();
            $data['caller_id'] = $data['liveagent1']->callerid;
            sleep(1);
            
            $data['call_log'] = DB::table('call_log')->select('uniqueid')->where('caller_code',$data['caller_id'])->first();
            //dd($data['call_log']);
            $data['uniqueid1'] = $data['call_log']->uniqueid;
            $response3 = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'stage' => 'start',
                    'server_ip' => $server_ip, 
                    'session_name' => $session_name, 
                    'conf_exten' => $conf_exten, 
                    'user' => $user, 
                    'pass' => $pass, 
                    'lead_id' => $lead_id, ////
                    'list_id' => $data['lead']->list_id, ////
                    'uniqueid' => $data['call_log']->uniqueid,
                    'length_in_sec' => 0,
                    'phone_number' => $phone_number, 
                    'phone_code' => $phone_code, 
                    'campaign' => $campaign, 
                    'start_epoch'=> 0,
                    'auto_dial_level'=> $auto_dial_level,
                    'VDstop_rec_after_each_call'=> $VDstop_rec_after_each_call,
                    'conf_silent_prefix'=> $conf_silent_prefix,
                    'protocol'=> $protocol,
                    'extension'=> $qm_extension,
                    'inOUT'=> $inOUT,
                    'DB' => 0,
                    'alt_dial'=> $dialed_label,
                    'hangup_all_non_reserved'=> $hangup_all_non_reserved,
                    'blind_transfer'=> $blind_transfer,
                    'called_count'  => $data['lead']->called_count,
                    'ext_context' => $ext_context,
                    'user_abb'    => $user_abb, 
                    'agentchannel'    => $channel, 
                    'conf_dialed'    => $conf_dialed, 
                    'nodeletevdac'    => $nodeletevdac, 
                    'alt_num_status'    => $alt_num_status, 
                    'leave_3way_start_recording_trigger'    => $leave_3way_start_recording_trigger, 
                    'leave_3way_start_recording_filename'    => $leave_3way_start_recording_filename, 
                    'dial_timeout' => $dial_timeout, 
                    'dial_prefix' => $dial_prefix, 
                    'campaign_cid' => $campaign_cid, 
                    'omit_phone_code' => $omit_phone_code, 
                    'usegroupalias' => $usegroupalias, 
                    'account' => $account, 
                    'agent_dialed_number' => $agent_dialed_number, 
                    'agent_dialed_type' => $agent_dialed_type, 
                    'dial_method' => $dial_method, 
                    'agent_log_id' => $agent_log_id, 
                    'security' => $security,
                    'qm_extension' => $qm_extension, 
                    'old_CID' => $old_CID, 
                    'cid_lock' => $cid_lock, 
                    'routing_initiated_recording' => $routing_initiated_recording, 
                    'exten' => $exten, 
                    'recording_filename' => $recording_filename, 
                    'channel' => $channel, 
                    'vendor_lead_code' => $vendor_lead_code, 
                    'phone_login' => $phone_login, 
                    'state' => $state, 
                    'postal_code' => $postal_code, 
                    'ACTION' => 'manDiaLlogCaLL',
                ],
            ]);

           
            $LiveSipChannel = DB::table('live_sip_channels')->where('server_ip',$server_ip)->where('extension',$conf_exten)->where('channel','LIKE','SIP/'.$user.'%')->first();
            $data['agentchannel'] = $channel;
            $data['channel'] = $channel;
            //$data['contents'] = $response2->getBody()->getContents();
            $data['etat'] = 200;
            //$data['res'] = $response3->getBody()->getcontents();
            
            $data['msg'] =  'lead exist';
            $data['live_agent'] = $data['liveagent1'];
            return response()->json($data);
           
        }else{
            $data['etat'] = 500;
            $data['msg'] = "Vous n'etes pas connectée, s'il vous plait reconnecter avant de faire un appel";
            return response()->json($data);
        }
    }
}