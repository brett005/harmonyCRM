<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repository\DashboardRepositoryInterface;
use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
USE DB;
class DashboardAgentController extends Controller
{

    private $userAdmin = '6666';
    private $passAdmin = '0551797726';

    private function server(){
        return "https://$_SERVER[HTTP_HOST]";
    }

    protected $dashboard;

    public function __construct(DashboardRepositoryInterface $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    public function index()
    {
        return $this->dashboard->index();
    }
    public function getCallLogs()
    {
        return $this->dashboard->getCallLogs();
    }
    public function getLastCallLogs()
    {
        return $this->dashboard->getLastCallLogs();
    }
    public function getLenghtSec($lead_id)
    {

        return $this->dashboard->getLenghtSec($lead_id);
    }
    //// fonction qui récuperer la liste des channel live pour un agent 
    public function getChannelLive()
    {
        return $this->dashboard->getChannelLive();
    }
    //// fonction qui activer le webphone apres 5 sec de l'actualisation de la page ou lors de clique sur button webphone
    public function activateWebphone()
    {
        return $this->dashboard->activateWebphone();
    }
    /////// recuperer le chrono de l'agent (n'import quel status)
    public function getTimeAgent()
    {
        return $this->dashboard->getTimeAgent();
    }

    public function ChangePauseCode($pause_code)
    {
        return $this->dashboard->ChangePauseCode($pause_code);
    }

    //// fonction qui récuperer les information d'un fiche a partir de lead_id
    public function get_contact_informations()
    {

        if(!empty(Session::get('user'))){
            $user = Session::get('user');
            $http = new \GuzzleHttp\Client();
            $response = $http->post($this->SERVER2.'/vicidial/non_agent_api.php?source=call3&user='.$this->userAdmin.'&pass='.$this->passAdmin.'&function=agent_status&agent_user='.$user.'&stage=csv&header=YES');
            $content = $response->getBody()->getContents();            
            $j_encoded = json_encode(utf8_encode($content));
            $content_encoded = explode('"',$j_encoded);
            try {
                $content_encoded = explode('\n',$content_encoded[1]);
                $content_encoded = explode(',',$content_encoded[1]);
                $lead_id = $content_encoded[2];
                return response()->json($lead_id);
                if($lead_id != 0){
                    $http = new \GuzzleHttp\Client();
                    $response = $http->post($this->SERVER2.'/vicidial/non_agent_api.php?source=call3&user='.$this->userAdmin.'&pass='.$this->passAdmin.'&function=lead_all_info&lead_id='.$lead_id.'&header=YES&custom_fields=Y');
                    //$contentType = $response->getHeaders()['content-type'][0];
                    $content = $response->getBody()->getContents();
                  
                    $contact = [];
                    $j_encoded = json_encode(utf8_encode($content));
                    $content_encoded = explode('"',$j_encoded);
                    $content_encoded = explode('\n',$content_encoded[1]);
                    //dd($content_encoded[1]);
                    $content_encoded = explode('|',$content_encoded[1]);
                    $contact['status'] = $content_encoded[0];
                    $contact['user'] = $content_encoded[1];
                    $contact['vendor_lead_code'] = $content_encoded[2];
                    $contact['source_id'] = $content_encoded[3];
                    $contact['list_id'] = $content_encoded[4];
                    $contact['gmt_offset_now'] = $content_encoded[5];
                    $contact['phone_code'] = $content_encoded[6];
                    $contact['phone_number'] = $content_encoded[7];
                    $contact['title'] = $content_encoded[8];
                    $contact['first_name'] = $content_encoded[9];
                    $contact['middle_initial'] = $content_encoded[10];
                    $contact['last_name'] = $content_encoded[11];
                    $contact['address1'] = $content_encoded[12];
                    $contact['address2'] = $content_encoded[13];
                    $contact['address3'] = $content_encoded[14];
                    $contact['city'] = $content_encoded[15];
                    $contact['state'] = $content_encoded[16];
                    $contact['province'] = $content_encoded[17];
                    $contact['postal_code'] = $content_encoded[18];
                    $contact['country_code'] = $content_encoded[19];
                    $contact['gender'] = $content_encoded[20];
                    $contact['date_of_birth'] = $content_encoded[21];
                    $contact['alt_phone'] = $content_encoded[22];
                    $contact['email'] = $content_encoded[23];
                    $contact['security_phrase'] = $content_encoded[24];
                    $contact['comments'] = $content_encoded[25];
                    $contact['called_count'] = $content_encoded[26];
                    $contact['last_local_call_time'] = $content_encoded[27];
                    $contact['rank'] = $content_encoded[28];
                    $contact['owner'] = $content_encoded[29];
                    $contact['entry_list_id'] = $content_encoded[30];
                    $contact['lead_id'] = $content_encoded[31];
                    $contact['etat'] = 200;
                    return response()->json($contact);
                }else{
                    $contact['etat'] = 403;
                    $contact['msg'] = "L'agent est en pause";
                    return response()->json($contact);
                }



            } catch (\Throwable $th) {
                $contact['etat'] = 403;
                $contact['msg'] = "L'agent n'est pas connecter";
                return response()->json($contact);
            }
        }else{
            $contact['msg'] = 'Aucun session existe';
            $contact['etat'] = 401;
            return response()->json($contact);
        }       
    }
    

    ///// recupere les lives statistiques de l'agent 
    public function getLiveStatisticAgent(){
        if(!empty(Session::get('user'))){
            $http = new \GuzzleHttp\Client(); 
            $response = $http->post($this->SERVER().'/harmony/index.php/get_live_statistic_agent', [
                'form_params' => [
                    'user' => Session::get('user'),
                    'server_ip' => Session::get('server_ip'),
                    'campaign' => Session::get('campaign'),
                ],
            ]);
            $data = [];
            $content = $response->getBody()->getcontents();
            $content = json_decode($content);
            //dd($content);
            return response()->json($content);

        }
    }

    public function getLiveCallback(){
        $data = [];
        $data['callbacks'] = DB::table('vicidial_callbacks')->where('vicidial_callbacks.user',Session::get('user'))->where('vicidial_callbacks.campaign_id',Session::get('campaign'))->where('vicidial_callbacks.lead_status','CBHOLD')
            ->join('vicidial_list','vicidial_callbacks.lead_id','=','vicidial_list.lead_id')
            ->select('vicidial_list.*','vicidial_callbacks.callback_id','vicidial_callbacks.callback_time')
             ->get(); 
        //dd($content);
        $data['etat'] = 200;
        return response()->json($data);
    }


    public function recording(Request $request){
        $status = $request->status;
        $lead_id = $request->lead_id == null ? '':$request->lead_id;
        $uniqueid = $request->uniqueid == null ? '':$request->uniqueid;
        $data = [];
        if($status == 'STOP'){
            $ACTION = 'MonitorConf';
        }else{
            $ACTION = 'StopMonitorConf';
        }
        $username = Session::get('user');
        $pass = Session::get('pass');
        $server_ip = Session::get('server_ip');
        $session_name = Session::get('session_name');
        $session_id = Session::get('conf_exten');
        $conf_silent_prefix = '5';
        $phone_login  = Session::get('phone_login');
        $phone_pass = Session::get('phone_pass');
        $phone = DB::table('phones')->where('login',$phone_login)
                                ->where('pass',$phone_pass)
                                ->where('active','Y')->first();
        $ext_context = $phone->ext_context;
        $channelrec1 = "Local/".$conf_silent_prefix.$session_id."@".$ext_context;
        $recording_exten = $phone->recording_exten;
        $recording = DB::table('recording_log')->select('user','start_epoch','filename')->where('user',$username)->orderBy('start_epoch','DESC')->first();
        $http = new \GuzzleHttp\Client(); 
        $response = $http->post($this->server().'/agc/manager_send.php', [
            'form_params' => [
                'user' => $username,
                'pass' => $pass,
                'server_ip' => $server_ip,
                //'queryCID' => $queryCID,
                'session_name' => $session_name,
                'channel'      => $channelrec1,
                'filename'     => $recording->filename,
                'lead_id'      => $lead_id,
                'query_recording_exten' => $session_id,
                'ext_priority' => '1',
                'FROMvdc'      => 'Y',
                'FROMapi'      => '1',
                'uniqueid'     => $uniqueid,
                'ext_context'  => $ext_context,
                'exten'        => $recording_exten,//$conf_silent_prefix.$session_id,
                'format'       =>'text',
                'ACTION'       => $ACTION
            ],
        ]);
        $data['contents'] = $response->getBody()->getContents();
        if(str_contains($data['contents'],'StopMonitorConf command sent for Channel')){
            $data['status'] = 'StopMonitorConf';
            $data['etat'] = 200;
        }else{
            $data['status'] = 'MonitorConf';
            $data['etat'] = 200; 
        }
        
        return response()->json($data);
    }

    public function MuteRecording(Request $request){
        $status = $request->status;
        $lead_id = $request->lead_id == null ? '':$request->lead_id;
        $uniqueid = $request->uniqueid == null ? '':$request->uniqueid;
        $data = [];
        $username = Session::get('user');
        $pass = Session::get('pass');
        $server_ip = Session::get('server_ip');
        $session_name = Session::get('session_name');
        $session_id = Session::get('conf_exten');
        $conf_silent_prefix = '5';
        $phone_login  = Session::get('phone_login');
        $phone_pass = Session::get('phone_pass');
        $campaign = Session::get('campaign');
        $active_rec_channel = $request->channel;
        
        $stage = $request->status; // on or off
        if($stage == 'off'){
            $stage1 = 'MUTING';
        }else{
            $stage1 = 'UP';
        }
        
        $phone = DB::table('phones')->where('login',$phone_login)
                                ->where('pass',$phone_pass)
                                ->where('active','Y')->first();
        $ext_context = $phone->ext_context;
        $user_abb = $username.$username.$username.$username;
        $user_abb = preg_replace("/^\./i","",$user_abb);
        $epoch_sec = date("U");
        $queryCID = 'AM'.$epoch_sec.'W'.$user_abb.'W';
        $channelrec1 = "Local/".$conf_silent_prefix.$session_id."@".$ext_context;
        $recording_exten = $phone->recording_exten;
        $live_agent = DB::table('vicidial_live_agents')->select('agent_log_id')->where('user',$username)->first();
        $agent_log_id = $live_agent->agent_log_id;
        $vicidial_users = DB::table('vicidial_users')->where('user',$username)->where('active','Y')->where('api_only_user','<>','1')->first();
        $VU_user_group = $vicidial_users->user_group;
        $recording = DB::table('recording_log')->select('user','start_epoch','filename')->where('user',$username)->orderBy('start_epoch','DESC')->first();
        $http = new \GuzzleHttp\Client(); 
        $queryCID1 = "VCagcW".$epoch_sec.$user_abb;

       /* $VolumeControlResponse = $http->post($this->server().'/agc/manager_send.php', [
            'form_params' => [
                'user' => $username,
                'pass' => $pass,
                'server_ip' => $server_ip,
                'queryCID' => $queryCID1,
                'stage'    => $stage1,
                'channel'  => $active_rec_channel,
                'session_name' => $session_name,
                'exten'      => $session_id,
                'ext_context'     => $ext_context,
                'format'       =>'text',
                'ACTION'       => 'VolumeControl'
            ],
        ]);*/
         
        $MuteRecordingResponse = $http->post($this->server().'/agc/manager_send.php', [
            'form_params' => [
                'user' => $username,
                'pass' => $pass,
                'server_ip' => $server_ip,
                'queryCID' => $queryCID,
                'stage'    => $stage,
                'channel'  => $active_rec_channel,
                'session_name' => $session_name,
                'exten'      => $session_id,
                'ext_context'     => $ext_context,
                'lead_id'      => $lead_id,
                'campaign' => $campaign,
                'user_group' => $VU_user_group,
                'uniqueid'     => $uniqueid,
                'agent_log_id' => $agent_log_id,
                'format'       =>'text',
                'ACTION'       => 'MuteRecording'
            ],
        ]);
        //$data['VolumeControl'] = $VolumeControlResponse->getBody()->getContents();
        $data['MuteRecording'] = $MuteRecordingResponse->getBody()->getContents();
        if(str_contains($data['MuteRecording'],'Mute command sent for Recording') && $request->status == 'off'){
        //if($request->status =='off'){
            $data['status'] = 'off';
            $data['etat'] = 200;
        }else{
            $data['status'] = 'on';
            $data['etat'] = 200; 
        }
        
        
        return response()->json($data);
    }

}