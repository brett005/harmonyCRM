<?php


namespace App\Repository;
use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
use DB;

class AuthRepository implements AuthRepositoryInterface
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
        
        $campaigns = DB::table('vicidial_campaigns')->where('active','Y')->get();
        $data = [];
        if($campaigns){
            $data['etat'] = 200;
            $data['campaigns'] = $campaigns;
        }else{
            $data['etat'] = 500;
            $data['campaigns'] = [];
        }
            
        return view('Agent.auth.login',$data);
    }

    public function loginAgent(){
        $campaigns = DB::table('vicidial_campaigns')->where('active','Y')->get();
        $data = [];
        if($campaigns){
            $data['etat'] = 200;
            $data['campaigns'] = $campaigns;
        }else{
            $data['etat'] = 500;
            $data['campaigns'] = [];
        }
            
        return view('Agent.auth.login',$data);
    }

    ///function login
    public function login($request)
    {
        //dd($this->server()());
        //dd("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
        //dd($request->campaign);
        $request->validate([
            'user' => 'required',
            'pass' => 'required',
            'campaign' => 'required',
        ]);

       
        $username = $request->user;
        $pass = $request->pass;
        $campaign = $request->campaign;
        $StarTtimE = date("U");
        $user = DB::table('vicidial_users')->where('user',$username)->where('pass',$pass)->first();
        //dd($user);
        //$user = DB::table('vicidial_users')->where('user',$username)->where('pass',$pass)->first();
        if(!empty($user)){
            $http = new \GuzzleHttp\Client(); 
            $response = $http->post($this->server().'/agc/vicidial.php', [
                'form_params' => [
                    'VD_login' => $username,
                    'VD_pass' => $pass,
                    'phone_login' => $user->phone_login,
                    'phone_pass' => $user->phone_pass,
                    'VD_campaign' => $campaign,
                    'DB' => 0,
                    'JS_browser_height'=> 342,
                    'JS_browser_width' => 1366,
                    'LOGINvarONE'      => '',
                    'LOGINvarTWO'      => '',
                    'LOGINvarTHREE'      => '',
                    'LOGINvarFOUR'      => '',
                    'LOGINvarFIVE'      => '',
                    'hide_relogin_fields' => ''
                ],

               /* 'form_params' => [
                    'VD_login' => '3004',
                    'VD_pass' => 'Be5gcz',
                    'phone_login' => '3004',
                    'phone_pass' => 'Be5gcz',
                    'VD_campaign' => '1000101',
                    'DB' => 0,
                    'JS_browser_height'=> 323,
                    'JS_browser_width' => 1366
                ],*/
            ]);
            //dd($response->getBody()->getcontents());
            $response1 = $http->post($this->server().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'user' => $username,
                    'pass' => $pass,
                    'ACTION'     => 'LogiNCamPaigns',
                    'format'     => 'html'
                ],
            ]);
            //dd($response->getBody()->getContents());
            if(str_contains($response->getBody()->getContents(),'<b><font class="skb_text">Sorry, there are no leads in the hopper for this campaign</b>')){
                 //dd('kljkl');
                $data['etat'] = 401;
                $data['msg'] = 'Aucun Lead existe dans cette list, veuillez contactez le support svp !!';
                return redirect()->back()->with('error',$data['msg']);
            }


                        
            if($response->getStatusCode() == 200){
                $phone = DB::table('phones')->where('login',$user->phone_login)->where('pass',$user->phone_pass)->where('active','Y')->first();
                //dd($phone);
                $conference = DB::table('vicidial_conferences')->where('server_ip',$phone->server_ip)
                ->where('extension','SIP/'.$user->phone_login)->first();
                if(!$conference){
                 //dd('kljkl');
                    $data['etat'] = 401;
                    $data['msg'] = 'Votre login est affecter au robot, veuillez contactez le support !!';
                    return redirect()->back()->with('error',$data['msg']);
                }
                
                $session_id = $conference->conf_exten;

                $agent_Log = DB::table('vicidial_agent_log')
                ->where('user',$user->user)->where('server_ip',$phone->server_ip)
                ->where('campaign_id',$campaign)->where('sub_status','LOGIN')
                ->where('pause_sec',0)->orderBy('agent_log_id','DESC')->first();
                if(!$agent_Log){
                 //dd('kljkl');
                    $data['etat'] = 401;
                    $data['msg'] = 'Votre login est affecter au robot, veuillez contactez le support !!';
                    return redirect()->back()->with('error',$data['msg']);
                }
                $session = DB::table('vicidial_session_data')->where('user',$user->user)->where('server_ip',$phone->server_ip)->where('campaign_id',$campaign)->first();
                if(!$session){
                 //dd('kljkl');
                    $data['etat'] = 401;
                    $data['msg'] = 'Votre login est affecter au robot, veuillez contactez le support !!';
                    return redirect()->back()->with('error',$data['msg']);
                }
                //dd($session);
                //return response()->json($phone->server_ip);
                $agent_log_id = $agent_Log->agent_log_id;
                $campaign_id = $agent_Log->campaign_id;
                $protocol = $phone->protocol;
                $extension = $phone->dialplan_number;

                $data['user'] = $user->user;
                $data['pass'] = $user->pass;
                $data['full_name'] = $user->full_name;
                $data['phone_login'] = $user->phone_login;
                $data['phone_pass'] = $user->phone_pass;
                $data['server_ip'] = $phone->server_ip;
                $data['agent_log_id'] = $agent_log_id;
                $data['campaign'] = $campaign_id;
                $data['session_name'] = $session->session_name;
                $data['protocol'] = $protocol;
                $data['extension'] = $extension;
                $data['conf_exten'] = $session_id;
                $data['etat'] = 200;
                $data['msg'] = "connexion avec succees";
                
                    if ( ($protocol == 'EXTERNAL') || ($protocol == 'Local') )
                    {
                         $protodial = 'Local';
                         $extendial = $extension;
                    //      var extendial = extension + "@" + ext_context;
                    }
                    else
                    {
                        $protodial = $protocol;
                        $extendial = $extension;
                    }
                $user_abb = $data['user'].$data['user'].$data['user'].$data['user'];
                $epoch_sec = $StarTtimE;
                $originatevalue = $protodial."/".$extendial;
                $queryCID = "ACagcW".$epoch_sec.$user_abb;
                $system_settings = DB::table('system_settings')->get()[0];


                $ext_context = $phone->ext_context;
                $login_context = $ext_context;
                $meetme_enter_login_filename = $system_settings->meetme_enter_login_filename;
                

                if (strlen($meetme_enter_login_filename) > 0)
                {$login_context = 'meetme-enter-login';}
                $phone_ip = $phone->phone_ip;
                $enable_sipsak_messages = $phone->enable_sipsak_messages;
                $allow_sipsak_messages = $system_settings->allow_sipsak_messages;
                $campaignn = DB::table('vicidial_campaigns')->where('campaign_id',$campaign_id)->first();
                $campaign_cid = $campaignn->campaign_cid;
                /*$response2 = $http->post($this->server().'/agc/manager_send.php', [
                    'form_params' => [
                        'server_ip'    => $data['server_ip'],
                        'session_name' => $data['session_name'],
                        'user' => $data['user'],
                        'pass' => $data['pass'],
                        'channel'  => $originatevalue,
                        'queryCID' => $queryCID,
                        'exten'    => $session_id,
                        'ext_context' => $login_context,
                        'ext_priority'=>1,
                        'extension'   => $extension,
                        'protocol'    => $protocol,
                        'phone_ip'    => $phone_ip,
                        'enable_sipsak_messages' => $enable_sipsak_messages,
                        'allow_sipsak_messages'  => $allow_sipsak_messages,
                        'campaign'               => $campaign_id,
                        'outbound_cid'           => $campaign_cid,
                        'format'     => 'text',
                        'ACTION'     => 'OriginateVDRelogin'
                    ],
                ]);
                $content = $response2->getBody()->getContents();
                */
                // return response()->json($content);
                $http = new \GuzzleHttp\Client();
                $responseWebPhone = $http->post($this->server().'/agc/api.php?source=test&user='.$this->userAdmin.'&pass='.$this->passAdmin.'&agent_user='.$data['user'].'&function=call_agent&value=CALL');
                $dial_method = $campaignn->dial_method;
               if($dial_method == "INBOUND_MAN"){
                $VICIDiaL_closer_blended = 0;
               }else{
                $VICIDiaL_closer_blended = 1;
               }

            $response2 = $http->post($this->server().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'server_ip' => $data['server_ip'],
                    'session_name' => $data['session_name'],
                    'user' => $data['user'],
                    'pass' => $data['pass'],
                    'comments' => 'MGRLOCK',
                    'closer_blended' => $VICIDiaL_closer_blended,
                    'campaign' => $campaign_id,
                    'closer_choice' => 'MGRLOCK-',
                    'qm_extension' => $extension,
                    'qm_phone' => $data['user'].'@agents',
                    'dial_method' => $dial_method,
                    'ACTION'     => 'regCLOSER',
                    'format'     => 'text'
                ],
            ]);
            $response3 = $http->post($this->server().'/agc/vdc_db_query.php', [
                'form_params' => [
                    'server_ip' => $data['server_ip'],
                    'session_name' => $data['session_name'],
                    'user' => $data['user'],
                    'pass' => $data['pass'],
                    'comments' => 'MGRLOCK',
                    'agent_territories' => 'MGRLOCK',
                    'ACTION'     => 'regTERRITORY',
                    'format'     => 'text'
                ],
            ]);
            //return redirect()->back()->with($data);
            
            }
            else{
                $data['etat'] = 401;
                $data['msg'] = "Invalide username or password";
                
                return redirect()->back()->with('error',$data['msg']);

            }
        }
        else{
            $data['etat'] = 401;
            $data['msg'] = "Invalide username or password";
            return redirect()->back()->with('error',$data['msg']);

        }
       
       
        Session::put('user', $data['user']);
        Session::put('campaign', $data['campaign']);
        Session::put('phone_pass', $data['phone_pass']);
        Session::put('pass', $data['pass']);
        Session::put('session_name', $data['session_name']);
        Session::put('server_ip', $data['server_ip']);
        Session::put('phone_login', $data['phone_login']);
        Session::put('agent_log_id', $data['agent_log_id']);
        Session::put('conf_exten',$data['conf_exten']);
        Session::put('extension',$data['extension']);
        Session::put('protocol',$data['protocol']);
        Session::put('full_name',$data['full_name']);
        Session::put('etat', $data['etat']);
        Session::put('msg', $data['msg']);

        return redirect()->route('agent.index');
        
    }

    /// fonction logout///////
    public function logout(){
  
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
            
        //dd($pass);
        $phone = DB::table('phones')->where('login',$phone_login)->where('pass',$phone_pass)->where('active','Y')->first();

        $phone_ip = $phone->phone_ip;
        $ext_context = $phone->ext_context;
        $enable_sipsak_messages = $phone->enable_sipsak_messages;
        $LogouTKicKAlL          = '1';
        $no_delete_sessions     = '1';
        $campaignInfo = DB::table('vicidial_campaigns')->where('campaign_id',$campaign)->first();
        $dial_method = $campaignInfo->dial_method;
        $http = new \GuzzleHttp\Client(); 
        $response = $http->post($this->SERVER().'/agc/vdc_db_query.php', [
            'form_params' => [
                'server_ip' => $server_ip,
                'session_name' => $session_name,
                'user' => $user,
                'pass' => $pass,
                'campaign' => $campaign,
                'conf_exten' => $conf_exten,
                'extension'=> $extension,
                'protocol'      => $protocol,
                'agent_log_id'      => $agent_log_id,
                'enable_sipsak_messages' => $enable_sipsak_messages,
                'no_delete_sessions'      => $no_delete_sessions,
                'phone_ip'      => $phone_ip,
                'LogouTKicKAlL'      => $LogouTKicKAlL,
                'ext_context'      => $ext_context,
                'qm_extension'     => $extension,
                'stage'      => 'NORMAL',
                'pause_trigger'    => 'PAUSE',
                'dial_method'      => $dial_method,
                'pause_max_url_trigger'  => '',
                'format'      => 'text',
                'ACTION'        => 'userLOGout',
            ],
        ]);

        //dd($response->getBody()->getcontents());
        if(str_contains($response->getBody()->getcontents(),'Agent '.$user.' is now in status PAUSED')){
            Session::forget('user');
            Session::forget('campaign');
            Session::forget('phone_pass');
            Session::forget('pass');
            Session::forget('session_name');
            Session::forget('server_ip');
            Session::forget('phone_login');
            Session::forget('agent_log_id');
            Session::forget('conf_exten');
            Session::forget('extension');
            Session::forget('protocol');
            return redirect()->route('agent.login');
        }else{
            $data['msg']  = "Erreur des parametres";
            $data['etat'] = 500;
            return redirect()->route('agent.login');
        }     
    }
}