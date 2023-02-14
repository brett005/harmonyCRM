<?php


namespace App\Repository;

use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
USE DB;
class DashboardRepository implements DashboardRepositoryInterface
{

     //private $server = 'https://call3.callbk.tk';
    //private $SERVER = 'https://call3.harmoniecrm.com';
    private $userAdmin = '6666';
    private $passAdmin = 'Capital2023';

    private function server(){
        return "https://$_SERVER[HTTP_HOST]";
    }

    public function index(){
        $data = [];       
       //// envoyer une requete a l'api pour obtenir le status de l'agent
        $user = Session::get('user');
        $agents = DB::table('vicidial_live_agents')->where('user',$user)->get();
        if($agents->count()>1){
            $this->logout();
            $data['etat'] = 500;
            $data['msg'] = "Vous n'etes pas connecter correctement, veuillez ressayer stp !!";
            return redirect()->route('agent.login')->with(['error'=>$data['msg']]);
        }
        $agent = DB::table('vicidial_live_agents')->where('user',$user)->first();
        
        if(!$agent){
           
            
            return redirect()->route('agent.login');
        }else{
            if(!empty(Session::get('user'))){ //// verifier si la session contient des données
                $data['user'] = Session::get('user');
                $data['campaign'] = Session::get('campaign');
                $data['server_ip'] = Session::get('server_ip');
                $data['conf_exten'] = Session::get('conf_exten');
                $data['extension'] = Session::get('extension');
                $data['session_name'] = Session::get('session_name');
                $data['protocol'] = Session::get('protocol');
                $data['full_name'] = Session::get('full_name');
                $data['etat'] = Session::get('etat');
                $data['msg'] = Session::get('msg');
                 //// envoyer une requete a l'api pour obtenir le status de l'agent
                $data['etatAgent'] = $agent->status;
                /////get list of campaigns status
                $camp_statuses = DB::table('vicidial_campaign_statuses')->select('status','status_name')->distinct()->where('selectable','Y')->where('campaign_id',Session::get('campaign'))->orderBy('status','ASC')->get();
                if(count($camp_statuses) <1){
                    $data['camp_statuses'] = ['z'];
                }else{
                    $data['camp_statuses'] = $camp_statuses;
                }
                //dd($data['camp_statuses']);
                $data['statuses'] = DB::table('vicidial_statuses')->select('status','status_name')->distinct()->where('selectable','Y')->orderBy('status','ASC')->get();
                ////// call logs


                ///// get all pauses code
                $pauses = DB::table('vicidial_pause_codes')->where('campaign_id',Session::get('campaign'))->get();
                if(count($pauses)>0){
                    $data['pauses'] = $pauses;
                }else{
                    $data['pauses'] = '';  
                }

                // if($contents->etat == 200){
                    /// si l'etat == 200, envoyer une requete a l'api agent pour obtenir l'url de webphone
                    $http = new \GuzzleHttp\Client();
                    $responseWebPhone = $http->get($this->SERVER().'/agc/api.php?source=call3&user='.$this->userAdmin.'&pass='.$this->passAdmin.'&agent_user='.Session::get('user').'&function=webphone_url&value=DISPLAY');
                    
                    $data['WebPhonEurl'] = $responseWebPhone->getBody()->getcontents(); /// webphone url (viciphone)
                    ///// envoyer une requete a l'api pour connecter au webphone
                    //$responseCallAgent = $http->get($this->SERVER().'/agc/api.php?source=call3&user='.$this->userAdmin.'&pass='.$this->passAdmin.'&agent_user='.Session::get('user').'&function=call_agent&value=CALL');
                    //dd($responseCallAgent->getBody()->getContents());
                    
                   
                
                //dd($data);
            }else{
                return redirect()->route('agent.login');
            }
        }
        ///// envoyer une requete pour récuperer les rappele (callback) de l'agent et les afficher sur le calendrier
        $liveagent = DB::table('vicidial_live_agents')->where('user',Session::get('user'))->where('server_ip',Session::get('server_ip'))->first();
        if(!empty($liveagent)){
            $data['callbacks'] = DB::table('vicidial_callbacks')->where('vicidial_callbacks.user',Session::get('user'))->where('vicidial_callbacks.campaign_id',Session::get('campaign'))->where('vicidial_callbacks.lead_status','CBHOLD')
            ->join('vicidial_list','vicidial_callbacks.lead_id','=','vicidial_list.lead_id')
            ->select('vicidial_list.*','vicidial_callbacks.callback_id','vicidial_callbacks.callback_time')
             ->get();            
        }else{
            $data['callbacks'] ='';
            
        }
        //dd($data);
        //dd(Session::all());
        return view('Agent.index',$data);
    }
    public function getCallLogs(){
        $data = [];
        try {
            
            $calllogs = DB::table('vicidial_log')->where('vicidial_log.campaign_id',Session::get('campaign'))
            ->join('vicidial_list','vicidial_log.lead_id','=','vicidial_list.lead_id')
            ->where('vicidial_list.user',Session::get('user'))
            ->select('vicidial_list.first_name','vicidial_list.last_name','vicidial_list.status','vicidial_log.call_date','vicidial_log.phone_number','vicidial_log.term_reason','vicidial_log.campaign_id','vicidial_list.lead_id')->orderBy('vicidial_log.call_date','DESC')->distinct()->limit(150)->get();

            $status = 200;

            $info['status'] = $status;
            $info['calllogs'] = $calllogs;
            return response()->json($info);
        } catch (Exception $e) {
            $data['status'] = 500;
            return response()->json($data);
        }
        
    }
    public function getLastCallLogs(){
        try {
            $calllogs = DB::table('vicidial_list')
                        //->where('campaign_id',Session::get('campaign'))
                        ->where('user',Session::get('user'))
                        ->limit(1)->orderBy('modify_date','DESC')->get();
            
            $status = 200;
            $info['status'] = $status;
            $info['calllogs'] = $calllogs;
            return response()->json($info);
        } catch (Exception $e) {
            $data['status'] = 500;
            return response()->json($data);
        }
    }
    public function getLenghtSec($lead_id){
        $data = [];
        $record = DB::table('recording_log')->where('lead_id',$lead_id)
                                            ->where('user',Session::get('user'))->orderBy('recording_id','DESC')->first();
        if(!$record){
            $data['status'] = 500;
            return response()->json($data);
        }
        $data['status'] = 200;
        $data['length_in_sec'] = $record->length_in_sec;
        return response()->json($data);
    }

    public function getChannelLive(){

        $channels = DB::table('live_sip_channels')->where('server_ip',Session::get('server_ip'))->where('extension',Session::get('conf_exten'))->get();

        $data = [];
        if($channels->count()<1){
            $data['etat'] = 500;
            return response()->json($data);
        }else{
            $data['etat'] = 200;
            $data['channels'] = $channels;
            return response()->json($data);
        }
           
    }
    public function activateWebphone(){

        $http = new \GuzzleHttp\Client();
        $responseWebPhone = $http->post($this->SERVER().'/agc/api.php?source=call3&user='.$this->userAdmin.'&pass='.$this->passAdmin.'&agent_user='.Session::get('user').'&function=call_agent&value=CALL');
        $content = $responseWebPhone->getBody()->getcontents();
        if(str_contains($content,"SUCCESS: call_agent function sent - ".Session::get('user'))){
            $data['etat'] = 200;
        }else{
            $data['etat'] = 500;
        }
        return response()->json($data);
    }
    public function getTimeAgent(){
        $user = Session::get('user');
        $live_agent = DB::table('vicidial_live_agents')->where('user',$user)->first();
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

    ///// fonction qui permet d'activer un code pause
    public function ChangePauseCode($pause_code){

        $user = Session::get('user');
        $pass = Session::get('pass');
        $phone_login = Session::get('phone_login');
        $phone_pass = Session::get('phone_pass');
        $campaign = Session::get('campaign');
        $server_ip = Session::get('server_ip');
        $conf_exten = Session::get('conf_exten');
        $extension = Session::get('extension');
        $session_name = Session::get('session_name');
        $protocol = Session::get('protocol');
        $agent_log_id = Session::get('agent_log_id');
        $pause_code = $pause_code;

        $userLogged = DB::table('vicidial_users')->where('user',$user)->where('active','Y')->first();
        $VU_user_group = $userLogged->user_group;
        $http = new \GuzzleHttp\Client();
        $response = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
            'form_params' => [
                'server_ip' => $server_ip,
                'session_name' => $session_name,
                'user' => $user,
                'pass' => $pass,
                'MgrApr_user' => $user,
                'MgrApr_pass'      => $pass,
                'status'           => $pause_code,
                'campaign'        => $campaign,
                'agent_log_id'    => $agent_log_id,
                'user_group'        => $VU_user_group,
                'format'       => 'text',
                'ACTION'       => 'PauseCodeMgrApr'
            ],
        ]);

        $phone = DB::table('phones')->where('login',$phone_login)->where('pass',$phone_pass)->where('active','Y')->first();
        $phone_ip = $phone->phone_ip;
        $enable_sipsak_messages = $phone->enable_sipsak_messages;
        $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',$campaign)->first();
        //$dial_method = $campaignInfo->dial_method;
        $starting_dial_level  = $campaignInfo->auto_dial_level;
        $response2 = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
            'form_params' => [
                'server_ip' => $server_ip,
                'session_name' => $session_name,
                'user' => $user,
                'pass' => $pass,
                'MgrApr_user' => $user,
                'MgrApr_pass'      => $pass,
                'status'           => $pause_code,
                'campaign'        => $campaign,
                'agent_log_id'    => $agent_log_id,
                'user_group'        => $VU_user_group,
                'extension'  => $extension,
                'protocol'  => $protocol,
                'phone_ip'  => $phone_ip,
                'enable_sipsak_messages'  => $enable_sipsak_messages,
                'stage'  => '1',
                'campaign_cid'  => '',
                'auto_dial_level'  => $starting_dial_level,
                'MDnextCID'  => '',
                'format'       => 'text',
                'ACTION'       => 'PauseCodeSubmit'
            ],
        ]);
        $content = $response2->getBody()->getcontents();
        $contents = json_decode($content);
        $data['contents'] = $response2->getBody()->getContents();
        $data['pause_code'] = $pause_code;
        if(str_contains($data['contents'],'Pause Code '.$data['pause_code'].' has been recorded')){
            $data['etat'] = 200;
            $data['pause_code'] = $contents->pause_code;
            return response()->json($data);
        }
        else{
            $data['etat'] = 500;
            return response()->json($data);
        }
    }
}