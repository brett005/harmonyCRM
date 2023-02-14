<?php

namespace App\Http\Controllers\Admin;

use App\Imports\ListImport;
use App\Models\addSite;
use App\Models\Campaigns;
use App\Models\EkoolaSetting;
use App\Models\OwnServers;
use App\Models\ReviewRating;
use App\Models\Vicidial_User;
use App\Models\Vicidial_User_Groups;
use App\Models\VicidialLists;
use App\Models\VicidialPhoneCodes;
use DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use function Faker\Provider\DateTime;

//use Spatie\MediaLibrary\MediaCollections\Models\Media;
//use App\Mail\Notification;

class recordController extends Controller
{
    public $selected = "Call1";
    public $start_stop_global = false;

    /** Login function **/
    public function authenticate(Request $request)
    {
        if ($request->isMethod('GET')){
            if (!Auth::check()) {
                /*$users = DB::select("select user, pass from vicidial_users ");
                dd($users);*/
                return view('Admin.login/index');
            }
            redirect('cpanel');
        }

        $request->validate([
            'user'=>'required',
            'password'=>'required|string'
        ]);
        $credentials = $request->only('user', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('afficher-liste');
        }

        return back()->with([
            'loginError' => 'email atau Password salah',
        ]);
    }

    /** Logout **/
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    /** Logout api */
    public function logout_api($user){

        /** Get server working on **/
        $get_selected_server = $_SERVER['SERVER_NAME'];

        /** Logout api **/
        $url = 'https://'.$get_selected_server.'/agc/api.php?source=test&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&agent_user='.$user.'&function=logout&value=LOGOUT';

        /** Logout */
        $logout = $this->getcurl($url);

        return $logout[0];
    }

    /** Get Campains selected **/
    public function getSelectedCpms(Request $request, $selectd_server){
        $response_cpm = null;
        if ($request->isXmlHttpRequest() == true) {
            if ($selectd_server == 'All'){
                $value_campaigns = [];
                $arr_servers = ['Call1', 'Call2', 'Harmonie test'];
                foreach ($arr_servers as $server){
                    $c_arr = $this->getServer($server);
                    /** Get all campaigns **/
                    $response_cpm = $this->getcampaign($c_arr[0]);
                    array_push($response_cpm, $server);
                    array_push($value_campaigns, $response_cpm);
                }
                return response()->json($value_campaigns);
            }else {
                $c_arr = $this->getServer($selectd_server);
                if (!is_null($c_arr[0])) {
                    /** Get all campaigns **/
                    $response_cpm = $this->getcampaign($c_arr[0]);
                    array_push($response_cpm, $selectd_server);
                }
            }
        }
        return response()->json($response_cpm);
    }

    /** Get the server to workig woth **/
    public function getServer($selectd_server){

        $url_cpm = null;
        $url_record = null;
        if (!is_null($selectd_server)){
            if($selectd_server == 'Call1'){
                $url_cpm = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getcompaign";
                $url_record = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/search_record";
            }elseif($selectd_server == 'Call2'){
                $url_cpm = "https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getcompaign";
                $url_record = "https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/search_record";

            }if($selectd_server == 'Harmonie test'){
                $url_cpm = "https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getcompaign";
                $url_record =  "https://test.harmoniecrm.com//agc/vicidial_laravel/public/index.php/api/search_record";
            }if($selectd_server == 'Call3'){
                $url_cpm = "https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getcompaign";
                $url_record =  "https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/search_record";
            }
        }

        $arr_server[0] = $url_cpm;
        $arr_server[1] = $url_record;
        return $arr_server;
    }

    /** Dashboard **/
    public function dashboard(){
        //dd(Auth::check(), Auth::user()->full_name);
        //if(Auth::check()) {

        /** Get local date in different countries in the world */
        $timestamp = time() + date("Z");
        $local_date = gmdate("Y-m-d", $timestamp); //dd($local_date);
        /** Get Yesterday date */
        $yesterday_date = date('Y-m-d', strtotime("-1 days"));
        //$domaine_name = $_SERVER['SERVER_NAME'];
        /** url record **/
        //$url_record = "https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/search_record";
        $url_record = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/search_record";
        /** url cpm **/
        //$url_cpm = "https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getcompaign";
        $url_cpm = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getcompaign";
        $response_cpm = $this->getcampaign($url_cpm); //dd($response_cpm);
        $cpms = "All";
        $response_records = $this->getrecords($url_record, $cpms, $local_date, $local_date); //dd($response_records);


        return view('Admin.recording_log/index',
            ['records' => $response_records, 'cpms' => $response_cpm,
                'selected_server' => 'selectd_server', 'cpm_s' => $cpms,
                'd_from' => $local_date, 'd_to' => $local_date]);
        // }
        //return redirect('/login');
    }

    /** Search recording **/
    public function recording_search(Request $request)
    {
        //if ($request->isXmlHttpRequest()) {

        /* $d_from = $request->get('d_from');
         $d_to = $request->get('d_to');
         $cpm_s = $request->get('cpm_s'); */

        //echo "hgello".$d_from;
        $selectd_server = $request->get('s_server');//dd($selectd_server);
        $d_from = $request->get('from');
        $d_to = $request->get('to');
        $cpm_s = $request->get('cpms_v');

        $arr_server = $this->getServer($selectd_server); //dd($arr_server);
        if (!is_null($arr_server[0]) || !is_null($arr_server[1])  ) {
            /** Get all campaigns **/
            $response_cpm = $this->getcampaign($arr_server[0]);

            /** Get all records **/
            $response_records = $this->getrecords($arr_server[1], $cpm_s, $d_from, $d_to);
            //dd($response_records);
        }else{
            $response_records = null;
            $response_cpm = null;
        }

        //}
        //dd($response_records);
        return view('Admin.recording_log/index',
            ['records' => $response_records, 'cpms' => $response_cpm,
                'selected_server' => $selectd_server, 'cpm_s' => $cpm_s,
                'd_from' => $d_from, 'd_to' =>  $d_to ]);
    }

    /**  getcurl function fetch data from an api url **/
    public function getcurl($url):array
    {
        $return_data[] = "";
        $curl_cpm = curl_init();
        curl_setopt_array($curl_cpm, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $rawResponse_cpm = curl_exec($curl_cpm);
        $info_cpm = curl_getinfo($curl_cpm);
        curl_close($curl_cpm);

        $return_data[0] = $rawResponse_cpm;
        $return_data[1] = $info_cpm;

        return $return_data;
    }

    public function getcurl_webphone($url):array
    {
        $rr = file_get_contents($url);
        dd($rr);
        /*$return_data[] = "";
        $curl_cpm = curl_init();
        curl_setopt_array($curl_cpm, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $rawResponse_cpm = curl_exec($curl_cpm);
        dd($rawResponse_cpm);
        $info_cpm = curl_getinfo($curl_cpm);
        //dd($info_cpm);
        curl_close($curl_cpm);

        $return_data[0] = $rawResponse_cpm;
        $return_data[1] = $info_cpm;

        return $return_data;*/
    }

    /** Get campaigns list using api campaign **/
    public function getcampaign($url_cpm){
        //$url_cpm = "https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getcompaign";
        //$url_cpm = "http://localhost/nasreddine/vicidial_laravel/public/api/getcompaign";


        /** Compaign **/
        $cmp_array = [];
        $cmp_array = $this->getcurl($url_cpm);
        $info_cpm = $cmp_array[1];

        $response_cpm = "";
        if ($info_cpm['http_code'] === 200 ) {
            $response_cpm = json_decode($cmp_array[0], true);
        }

        return $response_cpm;
    }

    /** Get phone information **/
    public function getphoneinfos($url_phone){

        /** Phone **/
        $phone_array = [];
        $phone_array = $this->getcurl($url_phone);
        $info_phone = $phone_array[1];

        $response_phone = "";
        if ($info_phone['http_code'] === 200 ) {
            $response_phone = json_decode($phone_array[0], true);
        }

        return $response_phone;
    }

    /** Get records list using api records **/
    public function getrecords($url_record_server, $cpms, $local_date, $yesterday_date){
        //$url_record = "https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/search_record/$cpms/$local_date/$yesterday_date";
        //dd("qdfv");
        $url_record = "$url_record_server/$cpms/$local_date/$yesterday_date";

        /** records **/
        $records_array = [];
        $records_array = $this->getcurl($url_record);
        $info_records = $records_array[1];

        $response_records = "";
        if ($info_records['http_code'] === 200 ) {
            $response_records = json_decode($records_array[0], true);
        }
        //dd($response_records)
        return $response_records;
    }

    /** Get campaign list and display it to user **/
    public function get_campaign()
    {
        /*$response_cpm = $this->getcampaign();*/

        return view('Admin.campaigns/harmonie_campaign');
    }

    /** Explode get parameters */
    public function explode_param($param){
        $result = explode(':', $param);
        if (sizeof($result) > 2){
            return explode('"', $result[1].":".$result[2].":".$result[3])[1];
        }

        return explode('"', $result[1])[1];
    }

    /** split agents_logged_in with non api **/
    public function split_agents_logged_in_witn_non_api($response_logged_in){
        $split_arr = explode('},{', explode('}]', explode('[{', $response_logged_in)[1])[0]);
        //dd(sizeof($split_arr));
        //dd($split_arr);
        $object_all = ((array) new \stdClass());
        for ($i=0; $i < sizeof($split_arr); $i++){
            $ss_arr = explode(',', $split_arr[$i]);
            $object = new \stdClass();

            /** Get properties from object **/
            $object->full_name = $this->explode_param($ss_arr[0]);
            $object->user = $this->explode_param($ss_arr[1]);
            $object->status = $this->explode_param($ss_arr[2]);

            $last_update_time = new \DateTimeImmutable($this->explode_param($ss_arr[3]));
            $last_state_change = new \DateTimeImmutable($this->explode_param($ss_arr[4]));
            $interval = ($last_state_change->diff($last_update_time))->format("%H:%I:%S");

            $object->chrono = $interval;

            array_push($object_all , ((array) $object));
        }

        return ($object_all);

    }

    /** if null */
    public function ifNUll($param){
        if ($param == ''){
            return 'null';
        }elseif ($param != 'null'){
            return explode('"', $param)[1];
        }
        return 'null';
    }

    /** split campaigns  list infos **/
    public function split_campaigns_infos($response_logged_in){
        $split_arr = explode('},{', explode('}]', explode('[{', $response_logged_in)[1])[0]);
        //dd(sizeof($split_arr));
        //dd($split_arr);
        $object_all = ((array) new \stdClass());
        for ($i=0; $i < sizeof($split_arr); $i++){
            $ss_arr = explode(',', $split_arr[$i]);
            $object = new \stdClass();

            /** Get properties from object **/
            $object->campaign_id = $this->ifNUll(explode(':', $ss_arr[0])[1]);
            $object->campaign_name =  $this->ifNUll(explode(':', $ss_arr[1])[1]);
            $object->active = $this->ifNUll(explode(':', $ss_arr[2])[1]);
            $object->lead_order = $this->ifNUll(explode(':', $ss_arr[3])[1]);
            $object->hopper_level = explode(':', $ss_arr[4])[1];
            $object->auto_dial_level = $this->ifNUll(explode(':', $ss_arr[5])[1]);
            $object->next_agent_call = $this->ifNUll(explode(':', $ss_arr[6])[1]);
            $object->dial_prefix = $this->ifNUll(explode(':', $ss_arr[7])[1]);
            $object->dial_method = $this->ifNUll(explode(':', $ss_arr[8])[1]);
            $object->manual_dial_prefix = $this->ifNUll(explode(':', $ss_arr[9])[1]);

            array_push($object_all , ((array) $object));
        }

        return ($object_all);

    }

    /** split lists  list **/
    public function split_lists($response_logged_in){
        $split_arr = explode('},{', explode('}]', explode('[{', $response_logged_in)[1])[0]);
        //dd(sizeof($split_arr));
        //dd($split_arr);
        $object_all = ((array) new \stdClass());
        for ($i=0; $i < sizeof($split_arr); $i++){
            $ss_arr = explode(',', $split_arr[$i]);
            $object = new \stdClass();

            /** Get properties from object **/
            $object->list_id = explode(':', $ss_arr[0])[1];
            $object->list_name = explode('"', explode(':', $ss_arr[1])[1])[1] ;

            array_push($object_all , ((array) $object));
        }

        return ($object_all);

    }

    /** split agents_logged_in **/
    public function split_agents_logged_in($response_logged_in){
        $split_arr = explode("\n", $response_logged_in);
        $object_all = ((array) new \stdClass());
        for ($i=1; $i < sizeof($split_arr) - 1; $i++){
            $ss_arr = explode(',', $split_arr[$i]);
            $object = new \stdClass();

            /** Get properties from object **/
            $object->user = $ss_arr[0];
            $object->session_id = $ss_arr[2];
            $object->status = $ss_arr[3];
            $object->lead_id = $ss_arr[4];
            $object->full_name = $ss_arr[7];

            array_push($object_all , ((array) $object));
        }

        return ($object_all);

    }

    /** select server to use in agents logged in **/
    public function getServerLoggedIn($selectd_server){

        $url = null;
        if (!is_null($selectd_server)){
            //dd($selectd_server);
            if ($selectd_server == 'TEST HARMONIE'){
                $url = "https://test.harmoniecrm.com/";
            }

            if($selectd_server == 'Call1'){
                $url = "https://call1.capitalcontactcrm.tk/";
            }

            if($selectd_server == 'Call2'){
                $url = "https://call2.capitalcontactcrm.tk/";
            }

            if($selectd_server == 'CallBk'){
                $url = "https://call1.callbk.tk/";
            }

            if($selectd_server == 'Call3'){
                $url = "https://call3.harmoniecrm.com/";
            }


        }

        return $url;
    }

    /** Agents logged In **/
    public function agents_logged_in(){
        $getServer = $_SERVER['SERVER_NAME'];
        $live_agents = DB::table('vicidial_live_agents')
            ->join('vicidial_users', 'vicidial_users.user', '=', 'vicidial_live_agents.user' )
            ->select('vicidial_users.full_name', 'vicidial_live_agents.user', 'vicidial_live_agents.status', 'conf_exten AS session',
                DB::raw("SEC_TO_TIME(TIMESTAMPDIFF(second, vicidial_live_agents.last_state_change, CURRENT_TIMESTAMP() )) AS chrono"), 'calls_today')
            ->get();

        return view('Admin.cpanel.cpanel',
            ['logged_in' => $live_agents]);
    }

    public function getcurlPOST($url, $data):array
    {
        $return_data[] = "";
        $curl_cpm = curl_init();
        curl_setopt_array($curl_cpm, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                // Set here requred headers
                "accept: */*",
                "accept-language: en-US,en;q=0.8",
                "content-type: application/json",
            ),
        ]);
        $rawResponse_cpm = curl_exec($curl_cpm);
        $info_cpm = curl_getinfo($curl_cpm);
        curl_close($curl_cpm);

        $return_data[0] = $rawResponse_cpm;
        $return_data[1] = $info_cpm;

        return $return_data;
    }

    /** get update campaign page **/
    public function updatecampaign($campaign_id, $prefix, $selected_server, $getprefix_manual){

        /** Variable inititalisation **/
        $admin_user = '';
        $admin_pass = '';
        $url = '';

        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'TEST HARMONIE'){
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else{
            $selected_server = "TEST HARMONIE";
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }

        $function = 'updatecampaign';
        if (is_null($selected_server)){
            $admin_user = Auth::user()->user;
            $admin_pass = Auth::user()->pass;
            $url = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/updatecampaigns";
        }else{
            $url = $this->getServerLoggedIn($selected_server)."agc/vicidial_laravel/public/index.php/api/updatecampaigns";
        }

        $data = [
            'user' => $admin_user,
            'pass' => $admin_pass,
            'campaign_id' => $campaign_id,
            'prefix' => $prefix,
            'selected_server' => $selected_server,
            'getprefix_manual' => $getprefix_manual,
        ];

        $returned_data = $this->getcurlPOST($url, $data);

        if ($returned_data[1]['http_code'] == 200){
            return response()->json('SUCCESS');
        }
        return response()->json('ERROR');

    }

    /** Get campaigns list **/
    public function getcampaigns_list(Request $request){
        /** Variable inititalisation **/
        $admin_user = '';
        $admin_pass = '';

        $selected_server = $request->get('campaign_server');
        $object_all_cpms = [];
        if($selected_server == 'All'){
            $getservers = ['Call1', 'Call2', 'TEST HARMONIE', 'Call3'];
            foreach($getservers as $servers){
                $url_admin = $this->getServerLoggedIn($servers).'/agc/vicidial_laravel/public/index.php/api/getadmin';
                $admin_infos = $this->getadmin($url_admin);
                $i = 0;
                if($servers == 'Call2'){
                    $i = 1;
                }
                $admin_user = $admin_infos[$i]['user'];
                $admin_pass = $admin_infos[$i]['pass'];

                $url = $this->getServerLoggedIn($servers)."agc/vicidial_laravel/public/index.php/api/getcampaigns/".$admin_user."/".$admin_pass."";
                $agent_logged_in = [];
                $agent_logged_in = $this->getcurl($url);
                $info_logged_in = $agent_logged_in[1];

                $response_logged_in = "";
                if ($agent_logged_in[0] != "0"){
                    if ($info_logged_in['http_code'] === 200 ) {
                        $object_all = $this->split_campaigns_infos($agent_logged_in[0]);
                        array_push($object_all, (array)$servers);
                        array_push($object_all_cpms, $object_all);
                    }
                }
            }
            //dd($object_all_cpms);
            return view('campaigns/update_campaign_index',
                ['update_campaignss' => $object_all_cpms,
                    'selected_server' => $selected_server]);

        }




        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'TEST HARMONIE'){
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else{
            $selected_server = 'TEST HARMONIE';
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }

        if (is_null($selected_server)){
            $url = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getcampaigns/".Auth::user()->user."/".Auth::user()->pass."";
        }else{
            $url = $this->getServerLoggedIn($selected_server)."agc/vicidial_laravel/public/index.php/api/getcampaigns/".$admin_user."/".$admin_pass."";
        }

        $agent_logged_in = [];
        $agent_logged_in = $this->getcurl($url);
        $info_logged_in = $agent_logged_in[1];

        $response_logged_in = "";
        if ($agent_logged_in[0] != "0"){
            if ($info_logged_in['http_code'] === 200 ) {
                $object_all = $this->split_campaigns_infos($agent_logged_in[0]);

                return view('campaigns/update_campaign_index',
                    ['update_campaigns' => $object_all,
                        'selected_server' => $selected_server]);
            }
        }
        return view('campaigns/update_campaign_index',
            ['update_campaigns' => [], 'selected_server' => $selected_server ]);
    }

    /** Agents logged In search **/
    public function agents_logged_in_search(Request $request){
        /** Variable inititalisation **/
        $admin_user = '';
        $admin_pass = '';

        $selected_server = $request->get('logged_in_server');

        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }


        if (is_null($selected_server)){
            $url = "https://call1.capitalcontactcrm.tk/vicidial/non_agent_api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&function=logged_in_agents&stage=csv&header=YES";
        }else{
            $url = $this->getServerLoggedIn($selected_server)."vicidial/non_agent_api.php?source=test&user=".$admin_user."&pass=".$admin_pass."&function=logged_in_agents&stage=csv&header=YES";
        }

        $agent_logged_in = [];
        $agent_logged_in = $this->getcurl($url);
        $info_logged_in = $agent_logged_in[1];

        $response_logged_in = "";
        if ($agent_logged_in[0] != "0"){
            if ($info_logged_in['http_code'] === 200 ) {
                $object_all = $this->split_agents_logged_in($agent_logged_in[0]);
                return view('agents_logged_in/index',
                    ['logged_in' => $object_all, 'selected_server' => $selected_server, 'agent_users' => 'agent_users' ]);
            }
        }
        return view('agents_logged_in/index',
            ['logged_in' => [], 'selected_server' => $selected_server, 'agent_users' => 'agent_users' ]);
    }

    /** Agent logged in JSON **/
    public function agents_logged_in_search_json2(){
        /** Variable inititalisation **/
        $admin_user = '';
        $admin_pass = '';
        $getServer = $_SERVER['SERVER_NAME'];
        $url = "https://$getServer/vicidial/non_agent_api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&function=logged_in_agents&stage=csv&header=YES";

        $agent_logged_in = [];
        $agent_logged_in = $this->getcurl($url);
        $info_logged_in = $agent_logged_in[1];

        $object_all = "";
        if ($agent_logged_in[0] != "0") {
            if ($info_logged_in['http_code'] === 200) {
                $object_all = $this->split_agents_logged_in($agent_logged_in[0]);
                return response()->json($object_all);
            }
        }
        return [];
    }

    /** Agent logged in JSON **/
    public function agents_logged_in_search_json(){

        $getServer = $_SERVER['SERVER_NAME'];
        $live_agents = DB::table('vicidial_live_agents')
            ->join('vicidial_users', 'vicidial_users.user', '=', 'vicidial_live_agents.user' )
            ->select('vicidial_users.full_name', 'vicidial_live_agents.user', 'vicidial_live_agents.status', 'conf_exten AS session',
                DB::raw("SEC_TO_TIME(TIMESTAMPDIFF(second, vicidial_live_agents.last_state_change, CURRENT_TIMESTAMP() )) AS chrono"), 'calls_today')
            ->get();

        return response()->json($live_agents);
    }

    /** split chrono live agent **/
    public function split_chrono_live_agent($response_logged_in){
        $split_arr = explode(',', explode('}]', explode('[{', $response_logged_in)[1])[0]);
        $object_all = ((array) new \stdClass());
        for ($i=3; $i < sizeof($split_arr); $i++){
            $ss_arr = explode(':', $split_arr[$i]);
            $object = new \stdClass();
            if (count($ss_arr) > 2 ){
                /** Get properties from object **/
                $object->data = $ss_arr[1].":".$ss_arr[2].":".$ss_arr[3];
                array_push($object_all , (array) $object);
            }

        }

        return ($object_all);
    }

    /** Chrono live agents status JSON **/
    public function chrono_live($agent_user){
        /** Variable inititalisation **/
        $admin_user = '';
        $admin_pass = '';
        $getServer = $_SERVER['SERVER_NAME'];

        $live_agents = DB::table('vicidial_live_agents')
            ->join('vicidial_users', 'vicidial_users.user', '=', 'vicidial_live_agents.user' )
            ->select('vicidial_users.full_name', 'vicidial_live_agents.user', 'vicidial_live_agents.status',
                'vicidial_live_agents.last_update_time', 'vicidial_live_agents.last_state_change')
            ->where('vicidial_live_agents.user', '=', $agent_user)
            ->get();

        $interval = '00:00:00';

        $last_update_time = $live_agents[0]->last_update_time; //new \DateTimeImmutable(explode('"', $object_all[0]['data'])[1]);
        $last_state_change = $live_agents[0]->last_state_change; //new \DateTimeImmutable(explode('"', $object_all[1]['data'])[1]);
        $interval = ((new \DateTime($last_state_change))->diff(new \DateTime($last_update_time)))->format("%H:%I:%S");

        return response()->json($interval);
    }

    /** Get admin {user, pass} **/
    public function getadmin($url_users){
        //dd($url_users);
        /** Users **/
        $users_array = [];
        $users_array = $this->getcurl($url_users);
        $info_users = $users_array[1];

        $response_users = "";
        if ($info_users['http_code'] === 200 ) {
            $response_users = json_decode($users_array[0], true);
        }

        return $response_users;
    }

    /** Get users **/
    public function getusers($url_users){
        //dd($url_users);
        /** Users **/
        $users_array = [];
        $users_array = $this->getcurl($url_users);
        $info_users = $users_array[1];

        $response_users = "";
        if ($info_users['http_code'] === 200 ) {
            $response_users = json_decode($users_array[0], true);
        }

        return $response_users;
    }

    /** Get server ip for a live agent **/
    public function get_serverip_for_liveagent($url_users){
        /** Users **/
        $users_array = [];
        $users_array = $this->getcurl($url_users);
        $info_users = $users_array[1];

        $response_users = "";
        if ($info_users['http_code'] === 200 ) {
            $response_users = json_decode($users_array[0], true);
        }

        return $response_users;
    }

    /** Hangup function **/
    public function hungup_call($selected_user, $function){

        /** Get server working on **/
        $get_selected_server = $_SERVER['SERVER_NAME'];

        if ($function == 'hangup'){
            /** get hangup api url */
            $api_h = "https://".$get_selected_server."/agc/api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&agent_user=$selected_user&function=external_hangup&value=1";
        }

        if ($function == 'pause'){
            /** get pause api url */
            $api_h = "https://".$get_selected_server."/agc/api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&agent_user=$selected_user&function=external_pause&value=PAUSE";
        }

        if ($function == 'resume'){
            /** get resume api url */
            $api_h = "https://".$get_selected_server."/agc/api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&agent_user=$selected_user&function=external_pause&value=RESUME";
        }

        $response_api = $this->getcurl($api_h);

        return $response_api[0];
    }

    /** get Webphone **/
    public function getwebphone($selected_phone){
        /** Get server working on **/
        $get_selected_server = $_SERVER['SERVER_NAME'];

        /** get phone informations */
        $phone_infos = DB::table('phones')
            ->select('extension', 'server_ip', 'login', 'pass')
            ->where('extension' , '=' , $selected_phone)->get();

        foreach ($phone_infos as $ph)
            $extention = $ph->extension;
        $server_ip = $ph->server_ip;
        $user_login = $ph->login;
        $pass = $ph->pass;


        /** split server with https:// **/
        //$split_server = explode('/', explode('https://', $get_selected_server)[1])[0];

        /** Connect to webphone **/
        $webphone_url =  "https://phone.viciphone.com/vp_interpreter.php?layout=css%2Fdefault.css&cid_name=$user_login&sip_uri=$extention%40$server_ip&auth_user=$user_login&password=$pass&ws_server=wss%3A%2F%2F$get_selected_server%3A8089%2Fws&debug_enabled=true&hide_dialpad=false&hide_dialbox=false&hide_mute=false&hide_volume=false&auto_answer=true";

        return [$extention, $webphone_url];
    }

    /** Get api webphone **/
    public function webphone($phone){
        $url = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getusers/".$phone."";
        $user_infos = $this->getphoneinfos($url);

        $user = $user_infos[0]['user'];
        $pass = $user_infos[0]['pass'];

        $webphone_api = "https://call1.capitalcontactcrm.tk/agc/api.php?source=test&user=$user&pass=$pass&agent_user=101010&function=webphone_url&value=DISPLAY";
        dd($webphone_api);
        $response_api = $this->getcurl($webphone_api);

        dd($response_api);

        return $response_api[0];

    }

    /** Monitoring function **/
    public function monitoring_function($selected_user, $session_id, $webphone_phone, $type_monitor){

        /** Get server working on **/
        $get_selected_server = $_SERVER['SERVER_NAME'];

        /** Get server ip of this live user **/
        $agent_serverip =  $get_phone = DB::table('vicidial_live_agents')
            ->select('server_ip')
            ->where('user' , '=' , $selected_user)->get()[0]->server_ip;

        /** execute monitoring api */
        $api_h = "https://".$get_selected_server."/vicidial/non_agent_api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&function=blind_monitor&phone_login=$webphone_phone&session_id=$session_id&server_ip=$agent_serverip&stage=$type_monitor";

        $response_api = $this->getcurl($api_h);

        return $response_api[0];
    }

    /** All call in queue for a specific server **/
    public function all_call_in_queue(Request $request){

        /** Request usesr data and selected server **/
        $get_users = $request->get('users_array');
        $getServer = $_SERVER['SERVER_NAME'];

        /** Initialize count_queue value **/
        $callinqueue_count = 0;

        $agent_user = $get_users[0];
        $url_call_in_queue = "https://$getServer/agc/api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&agent_user=".$agent_user."&function=calls_in_queue_count&value=DISPLAY";
        $response_api = $this->getcurl($url_call_in_queue);
        $explode_queue = explode('SUCCESS: calls_in_queue_count - ', $response_api[0]);
        $callinqueue_count = intval(end($explode_queue));

        /** Get server working on **/
        /* foreach ($get_users as $agent_user){
            $url_call_in_queue = "https://$getServer/agc/api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&agent_user=".$agent_user."&function=calls_in_queue_count&value=DISPLAY";
            $response_api = $this->getcurl($url_call_in_queue);
            $explode_queue = explode('SUCCESS: calls_in_queue_count - ', $response_api[0]);
            $callinqueue_count += intval(end($explode_queue));
        } */

        return $callinqueue_count;
    }

    /** INBOUND/OUTBOUNDS Calls DATE_FORMAT( xxx , '%m:%i')  CURRENT_TIMESTAMP()  last_update_time */
    public function prospect_waittting(){
        $prospect_waitting = \Illuminate\Support\Facades\DB::table('vicidial_auto_calls')
            ->select('status', 'campaign_id', 'phone_number', 'server_ip',
                DB::raw("SEC_TO_TIME(TIMESTAMPDIFF(second, call_time, CURRENT_TIMESTAMP() )) AS DIALTIME") , 'call_type', 'queue_priority', 'agent_only')
            ->where('status', 'IVR')
            ->orWhere('status', 'LIVE')
            ->orderBy('campaign_id', 'ASC')
            ->get();

        return response()->json($prospect_waitting);
    }

    /** Get IVR count */
    public function countIVR(){

        return response()->json(\Illuminate\Support\Facades\DB::table('vicidial_auto_calls')
            ->select(\Illuminate\Support\Facades\DB::raw('COUNT(auto_call_id) AS IVR_COUNT'))
            ->where('status', 'IVR')
            ->get());
    }

    /** Live Calls Waittinf for agents */
    public function liveCallsWaittingForAgents(){

        return response()->json(\Illuminate\Support\Facades\DB::table('vicidial_auto_calls')
            ->select(\Illuminate\Support\Facades\DB::raw('COUNT(auto_call_id) AS liveCallsWFAegnts'))
            ->where('status', 'LIVE')
            ->get());
    }

    /** Live Call chrono for each agent for a specific server **/
    public function agent_chrono(Request $request){

        /** Request usesr data and selected server **/
        $get_call_id_customers = $request->get('users_array');
        $selected_server = $request->get('select_server');

        /** Initialize count_queue value **/
        $callinqueue_count = 0;

        if (!is_null($get_call_id_customers) OR $selected_server != ""){
            if (is_null($selected_server)){
                $url = "https://call1.capitalcontactcrm.tk/vicidial/non_agent_api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&function=logged_in_agents&stage=csv&header=YES";
            }else if ($selected_server == 'Call1'){
                $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
                $admin_infos = $this->getadmin($url_admin);
                $admin_user = $admin_infos[0]['user'];
                $admin_pass = $admin_infos[0]['pass'];
            }else if ($selected_server == 'Call2'){
                $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
                $admin_infos = $this->getadmin($url_admin);
                $admin_user = $admin_infos[1]['user'];
                $admin_pass = $admin_infos[1]['pass'];
            }else if ($selected_server == 'CallBk'){
                $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
                $admin_infos = $this->getadmin($url_admin);
                $admin_user = $admin_infos[0]['user'];
                $admin_pass = $admin_infos[0]['pass'];
            }else if ($selected_server == 'Call3'){
                $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
                $admin_infos = $this->getadmin($url_admin);
                $admin_user = $admin_infos[0]['user'];
                $admin_pass = $admin_infos[0]['pass'];
            }

            /** Get server working on **/
            $get_selected_server = $this->getServerLoggedIn($selected_server);
            foreach ($get_call_id_customers as $get_call_id_customer){
                $url_agent_chrono = $get_selected_server."vicidial/non_agent_api.php?source=test&user=".$admin_user."&pass=".$admin_pass."&function=callid_info&call_id=".$get_call_id_customer."&stage=csv&header=YES";
                $response_api = $this->getcurl($url_agent_chrono);
                //dd($response_api);
                $explode_queue = explode('SUCCESS: calls_in_queue_count - ', $response_api[0]);
                $callinqueue_count += intval(end($explode_queue));
            }

            return $callinqueue_count;
        }

        return $callinqueue_count;


    }

    /** Get files **/
    public function getfiles(Request $request){
        //dd(Storage::disk('local'));
        /** Delete all files in storage folder ( .../public/storage) **/
        Storage::disk('local')->delete(Storage::disk('local')->allFiles());
        $files = json_decode(stripslashes($request->get('files')));
        //$files = ['http://213.246.57.137/RECORDINGS/MP3/20221012-095903_231140585_50055_6002-all.mp3', 'http://213.246.57.137/RECORDINGS/MP3/20221010-165528_321396541_50055_6003-all.mp3'];

        /** Initialization **/
        $zip = new \ZipArchive();
        $filename = 'audioZip.zip';
        foreach ($files as $file){
            /** Split audio file name to get the file name **/
            $split_arr_audio = explode('/', $file);
            $audio_file_name = end($split_arr_audio);//var_dump($audio_file_name);

            /** Get audio files and make it in storage **/
            $audio = file_get_contents($file);
            Storage::disk('local')->put( $audio_file_name , $audio);
        }

        $directorypath = public_path().'\\storage\\'.$filename;

        if ($zip->open($directorypath,  \ZipArchive::CREATE) == TRUE){
            $files = File::files(public_path().'\\storage');
            /** Zip files **/
            foreach ($files as $key => $value){
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }
        //dd(Storage::disk('local')->allFiles());

        /** Downlaod zip file as audioZip.zip after remove it **/
        //return response()->download($directorypath)->deleteFileAfterSend(true);
        return 'storage\audioZip.zip';

    }

    /** Send zip file to mail **/
    public function sendattachfile($getemail){

        /*$input = $request->validate([
             'email' => 'required',
             'attachment' => 'required',
         ]);

         $path = public_path('uploads');
         $attachment = $request->file('attachment');

         $name = time().'.'.$attachment->getClientOriginalExtension();;

         // create folder
         if(!File::exists($path)) {
             File::makeDirectory($path, $mode = 0777, true, true);
         }
         $attachment->move($path, $name);

         $filename = $path.'/'.$name; */

        $filename = public_path('storage').'\\'.'audioZip.zip';
        //dd($filename);
        Mail::send(['text' => 'mail'], ['name' => 'Nasreddine Boudene'], function ($message) use ($getemail){

            $message->to($getemail, 'Capital Acedemy')->subject('Audio Files');
            $message->attach(public_path('storage').'\\'.'audioZip.zip');
            $message->from(['nasreddine.dev.capital@gmail.com']);
        });

        return "Success";
    }

    /** Review Rating **/
    public function review_rating(Request $request){

        /** Create Table 'rating' if not exist **/
        if (!Schema::hasTable('rating')) {
            Schema::create('rating', function(Blueprint $table){
                $table->bigIncrements('id');
                $table->integer('rating');
                $table->bigInteger('id_recording')->unsigned();
                $table->timestamps();

                /*$table->foreign('id_recording')
                    ->references('recording_id')
                    ->on('recording_log');*/
            });
        }

        if ($request->isMethod('POST')){
            /** Get Id Record **/
            $get_id_record = $request->id_record;

            /** See if this id_record exist or no on the database **/
            $exist_id_record = ReviewRating::select('id')
                ->where('id_recording', $get_id_record)
                ->first();

            if (is_null($exist_id_record)){
                /** Insert this new evaluation in our database table 'rating' **/
                $review = new ReviewRating();
                $review->rating = intval($request->nbr_star);
                $review->id_recording = intval($get_id_record);
                $review->save();
            }else{
                /** Update this evaluation in our database table 'rating' **/
                $rating_id = $exist_id_record->id;

                $review = ReviewRating::find($rating_id);
                $review->rating = intval($request->nbr_star);
                $review->update();
            }
            //dd($get_id_record);

        }

        if ($request->isMethod('GET')){
            $recording_id = $request->recording_id;
            //$recording_id = '164444';
            //dd($recording_id);
            $evaluated = ReviewRating::select('rating')->where('id_recording', $recording_id)
                ->where('id_recording', '!=', null)
                ->first();
            return response()->json($evaluated);
        }

        return response()->json("success");
    }

    /** Ekoola fetch data **/
    public function ekoolaFetchData($split_arr){

        $i = 0;
        $j = 0;
        $object_all = [];
        $data_object = [];
        $my_value = new \stdClass();
        for($rt = 0; $rt < sizeof($split_arr); $rt++ ){

            $this_value = explode(',', explode('"entry_id":', $split_arr[$rt])[1])[0];
            $new_rt = $rt + 1;
            if ($new_rt <= sizeof($split_arr)){
                if ($new_rt < sizeof($split_arr)){
                    $next_entry_v = explode(',', explode('"entry_id":', $split_arr[$new_rt])[1])[0];
                }else{
                    $next_entry_v = $this_value + 1;
                }

                $values = $split_arr[$rt]; //dd($this_value, $next_entry_v, $values);
                //var_dump((int)$next_entry_v == (int)$this_value);
                if ((int)$next_entry_v == (int)$this_value){

                    $v_ekoola = explode('"', explode('"value":', $values)[1])[1];
                    $v_ekoola_field_id = explode(',', explode('"field_id":', $values)[1])[0];
                    $v_ekoola_endtry_id =  $this_value; //explode(',', explode('"entry_id":', $values)[1])[0]; dd($v_ekoola_endtry_id, $this_value);
                    if ($v_ekoola_field_id == 6){
                        $my_value->full_name = json_decode(sprintf('"%s"', $v_ekoola));
                    }

                    if ($v_ekoola_field_id == 5){
                        $my_value->birth_day = $v_ekoola;
                    }

                    if ($v_ekoola_field_id == 4){
                        $my_value->address = json_decode(sprintf('"%s"', $v_ekoola));
                    }

                    if ($v_ekoola_field_id == 3){
                        $my_value->number_phone = $v_ekoola;
                    }

                    //$data_object[$i] =  json_decode(sprintf('"%s"', $my_value)); dd($data_object);
                    $data_object[$i] =  $my_value;


                }else{

                    $v_ekoola = explode('"', explode('"value":', $values)[1])[1];
                    $v_ekoola_field_id = explode(',', explode('"field_id":', $values)[1])[0];
                    $v_ekoola_endtry_id =  $this_value; //explode(',', explode('"entry_id":', $values)[1])[0];
                    if ($v_ekoola_field_id == 6){
                        $my_value->full_name = json_decode(sprintf('"%s"', $v_ekoola));
                    }

                    if ($v_ekoola_field_id == 5){
                        $my_value->birth_day = $v_ekoola;
                    }

                    if ($v_ekoola_field_id == 4){
                        $my_value->address = json_decode(sprintf('"%s"', $v_ekoola));
                    }

                    if ($v_ekoola_field_id == 3){
                        $my_value->number_phone = $v_ekoola;
                    }
                    //$data_object[$i] =  json_decode(sprintf('"%s"', $my_value)); dd($data_object);
                    $data_object[$i] =  $my_value;


                    $object_all[$j] = $data_object[0];
                    $j++;
                    $i = (-1);
                    $my_value = new \stdClass();
                    $data_object = [];
                }
            }
            $i++;
        }

        return $object_all;
    }

    /** Get last count old_entry_id */
    public function getOldentryId(){

        /** Create db table */
        if (Schema::hasTable('ekoola_old_entry_id') == false) {
            Schema::create('ekoola_old_entry_id', function(Blueprint $table){
                $table->bigIncrements('id');
                $table->string('old_entry_id')->default('0');
                $table->timestamps();
            });

            DB::table('ekoola_old_entry_id')
                ->insert(['old_entry_id' => 0]);

            return null;
        }

        return (DB::table('ekoola_old_entry_id')->select('old_entry_id')->first())->old_entry_id;
    }

    /** UPdate last count old_entry_id **/
    public function updateOldentryId($new_entry_id){
        DB::table('ekoola_old_entry_id')->delete();

        return DB::table('ekoola_old_entry_id')
            ->insert(['old_entry_id' => $new_entry_id]);
    }

    /** Get form data of Ekoola (harmoniecrm.com/ekoola_api) **/
    public function ekoolaGetFomrData(Request $request){

        /** Get selected server **/
        $selected_server = $request->get('lead_server');

        /** Get admin infos **/
        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'TEST HARMONIE'){
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else{
            $selected_server = 'TEST HARMONIE';
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }

        /** Generate url **/
        if (is_null($selected_server)){
            $url = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getLists/".Auth::user()->user."/".Auth::user()->pass."";
        }else{
            $url = $this->getServerLoggedIn($selected_server)."agc/vicidial_laravel/public/index.php/api/getLists/".$admin_user."/".$admin_pass."";
        }

        /** Get List data **/
        $agent_logged_in = [];
        $agent_logged_in = $this->getcurl($url);
        $info_logged_in = $agent_logged_in[1];

        $response_logged_in = "";
        $object_all = [];
        if ($agent_logged_in[0] != "0"){
            if ($info_logged_in['http_code'] === 200 ) {
                $object_all = $this->split_lists($agent_logged_in[0]);
            }
        }


        /** Get last count old_entry_id */
        $old_entry_id = $this->getOldentryId();
        if ($old_entry_id == null){
            $old_entry_id = '0';
        }

        /** Get Lead fata from Ikoola **/
        $ekoola_user_db = 'capitalkhedma';
        $ekoola_pass_db = 'Capital@2022@';
        $url = "https://www.harmoniecrm.com/ekoola_api/public/api/getFormsData/".$old_entry_id."/".$ekoola_user_db."/".$ekoola_pass_db."";
        /** Get the number user subscribed **/
        $url_users_subscribed = "https://www.harmoniecrm.com/ekoola_api/public/api/countUsersSubscribed/".$old_entry_id."/".$ekoola_user_db."/".$ekoola_pass_db."";

        $response = $this->getcurl($url);
        $response_users_subscribed = $this->getcurl($url_users_subscribed);
        $ekoola_data = $response[0];

        if ($response[1]['http_code'] == 200) {
            if ($ekoola_data != "[]") {
                $split_arr = explode('},{', explode('}]', explode('[{', $ekoola_data)[1])[0]);

                /** Update the entry id into database **/
                /*$new_entry_id = explode(':', explode(',', $split_arr[0])[0])[1];
                $update_new_entry_id = $this->updateOldentryId($new_entry_id); */
                /** Reconstitution data **/
                $fetchdata = $this->ekoolaFetchData($split_arr);

                return view('ekoola/add_leads',
                    ['leads' => $fetchdata, 'selected_server' => 'All', 'lists_name' => $object_all, 'users_subscribed' => $response_users_subscribed[0]]);

            }
            return view('ekoola/add_leads',
                ['leads' => null, 'selected_server' => 'All', 'lists_name' => $object_all, 'users_subscribed' => 0]);
        }
        return view('ekoola/add_leads',
            ['leads' => null, 'selected_server' => 'All', 'lists_name' => $object_all, 'users_subscribed' => 0 ]);

    }

    /** Date Format */
    public function birth_date_format($birth_date){
        #make like this #YYYY-MM-dd
        $returned_date = "";
        $d_f = explode('/', $birth_date);
        for ($i = sizeof($d_f) - 1; $i >= 0; $i--){
            $returned_date .= $d_f[$i]."-";
        }
        return substr($returned_date, 0, -1);
    }

    /** Get willaya **/
    public function getWillaya($num_wilaya){

        $arr_willaya = [
            "Adrar",
            "Chlef",
            "Laghouat",
            "Oum-El-Bouaghi",
            "Batna",
            "Béjaïa",
            "Biskra",
            "Béchar",
            "Blida",
            "Bouira",
            "Tamanrasset",
            "Tébessa",
            "Tlemcen",
            "Tiaret",
            "Tizi-Ouzou",
            "Alger",
            "Djelfa",
            "Jijel",
            "Sétif",
            "Saïda",
            "Skikda",
            "Sidi Bel Abbès",
            "Annaba",
            "Guelma",
            "Constantine",
            "Médéa",
            "Mostaganem",
            "M’sila",
            "Mascara",
            "Ouargla",
            "Oran",
            "El Bayadh",
            "Illizi",
            "Bordj Bou Arreridj",
            "Boumerdès",
            "El-Tarf",
            "Tindouf",
            "Tissemsilt",
            "El-Oued",
            "Khenchela",
            "Souk-Ahras",
            "Tipaza",
            "Mila",
            "Aïn-Defla",
            "Naâma",
            "Aïn-Témouchent",
            "Ghardaïa",
            "Relizane",
            "El M'Ghair",
            "El Meniaa",
            "Ouled Djellal",
            "Bordj Badji Mokhtar",
            "Béni Abbès",
            "Timimoun",
            "Touggourt",
            "Djanet",
            "In Salah",
            "In Guezzam"
        ];

        for($i=1; $i <= sizeof($arr_willaya); $i++){
            if (intval($num_wilaya) == $i){

                return $arr_willaya[$i -1];
            }
        }
        return $arr_willaya[1 - 1];
    }

    /** Address Format */
    public function address_format($address){
        $returned_adr = "";
        $split_address = explode(' ', $address);
        foreach ($split_address as $ss_adr){
            $returned_adr .= $ss_adr.".";

        }
        return substr($returned_adr, 0, -1);
    }

    /** Full name format */
    public function fullNameFormat($fullName){
        $returned_fullname = "";
        $split_fullname = explode(' ', $fullName);
        foreach ($split_fullname as $ss_fn){
            $returned_fullname .= $ss_fn.".";
        }
        return substr($returned_fullname, 0, -1);
    }

    /** Full name format */
    public function phoneFormat($phone){
        $returned_phone = "";
        if (!(substr($phone, 0, 1) == "0")){
            return explode('+213', $phone)[1];
        }
        return $phone;
    }

    /** Api Add ekoola data (Lead) to our servers **/
    public function addLead(Request $request){

        /** Get selected server **/
        $selected_server = $request->get('lead_server');
        $selected_list_id = $request->get('selected_list_id');
        $first_name = $this->fullNameFormat($request->get('fullname'));
        $second_name = ''; //$request->get('second_name');
        $birth_date = $this->birth_date_format($request->get('birth_date'));
        $phone_number = $this->phoneFormat($request->get('phone_number'));
        $adress = $this->address_format($this->getWillaya(explode('-', explode(':', $request->get('get_adress'))[0])[0]));

        /** Initial Inserted lead Value Or No */
        $lead_inserted = false;

        /** Get admin infos **/
        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'TEST HARMONIE'){
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else{
            $selected_server = 'TEST HARMONIE';
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }

        /** Get leads id */
        $leads_id = $this->leadSearch($selected_server, $admin_user, $admin_pass, $phone_number);
        /** Get list id */
        $list_id = $this->listIdList_lead_search($selected_server, $admin_user, $admin_pass, $leads_id, $selected_list_id);

        if ($list_id === $selected_list_id){
            $lead_inserted = true;
        }

        /** Insert This Lead If lead_inserted equal false **/
        if ($lead_inserted == false) {

            /** Generate url **/
            if (is_null($selected_server)) {
                $url = "https://test.harmoniecrm.com/vicidial/non_agent_api.php?source=test&user=" . Auth::user()->user . "&pass=" . Auth::user()->pass . "&function=add_lead&phone_number=$phone_number&phone_code=0&list_id=$selected_list_id&dnc_check=N&first_name=$first_name&last_name=$second_name&address1=$adress&date_of_birth=$birth_date";
            } else {
                $url = $this->getServerLoggedIn($selected_server) . "vicidial/non_agent_api.php?source=test&user=" . $admin_user . "&pass=" . $admin_pass . "&function=add_lead&phone_number=$phone_number&phone_code=0&list_id=$selected_list_id&dnc_check=N&first_name=$first_name&last_name=$second_name&address1=$adress&date_of_birth=$birth_date";
            }

            /** Get data **/
            $agent_logged_in = [];
            $agent_logged_in = $this->getcurl($url);
            $info_logged_in = $agent_logged_in[1];

            $response_logged_in = "";
            $object_all = [];
            if ($agent_logged_in[0] != "0") {
                if ($info_logged_in['http_code'] === 200) {
                    $lead_inserted = true;
                    return response()->json([$agent_logged_in[0], $lead_inserted]);
                }
            }

            $lead_inserted = false;
            return response()->json(['', $lead_inserted]);

        }
        return response()->json(['', $lead_inserted]);
    }

    /** Lead search **/
    public function leadSearch($selected_server, $admin_user, $admin_pass, $phone_number){
        /** Generate url **/
        if (is_null($selected_server)){
            $url = "https://test.harmoniecrm.com/vicidial/non_agent_api.php?source=test&user=".Auth::user()->user."&pass=".Auth::user()->pass."&function=lead_search&phone_number=$phone_number";
        }else{
            $url = $this->getServerLoggedIn($selected_server)."vicidial/non_agent_api.php?source=test&user=".$admin_user."&pass=".$admin_pass."&function=lead_search&phone_number=$phone_number";
        }

        /** Get data **/
        $agent_logged_in = [];
        $agent_logged_in = $this->getcurl($url);
        $info_logged_in = $agent_logged_in[1];

        $response_logged_in = "";
        $object_all = [];
        if ($agent_logged_in[0] != "0"){
            if ($info_logged_in['http_code'] === 200 ) {
                if (!str_contains($agent_logged_in[0], 'ERROR')) {
                    $d_r = explode('|', $agent_logged_in[0]);
                    if ($d_r[1] > 0) {
                        $leads_id = explode('-', explode("\n", $d_r[2])[0]);
                        return $leads_id;
                    }
                }
            }
        }
        return '';
    }

    /** List ID lead search **/
    public function listIdList_lead_search($selected_server, $admin_user, $admin_pass, $leads_id, $list_id){
        if ($leads_id != ""){
            foreach ($leads_id as $lead) {
                if ($lead != "") {
                    $url = "https://test.harmoniecrm.com/vicidial/non_agent_api.php?source=test&user=6666&pass=0551test2020&function=lead_all_info&lead_id=492785";
                    /** Generate url **/
                    if (is_null($selected_server)) {
                        $url = "https://test.harmoniecrm.com/vicidial/non_agent_api.php?source=test&user=" . Auth::user()->user . "&pass=" . Auth::user()->pass . "&function=lead_all_info&lead_id=$lead";
                    } else {
                        $url = $this->getServerLoggedIn($selected_server) . "vicidial/non_agent_api.php?source=test&user=" . $admin_user . "&pass=" . $admin_pass . "&function=lead_all_info&lead_id=$lead";
                    }

                    /** Get data **/
                    $agent_logged_in = [];
                    $agent_logged_in = $this->getcurl($url);
                    $info_logged_in = $agent_logged_in[1];

                    $response_logged_in = "";
                    $object_all = [];
                    if ($agent_logged_in[0] != "0") {
                        if ($info_logged_in['http_code'] === 200) {
                            if (!str_contains($agent_logged_in[0], 'ERROR')){
                                $id_list = explode('|', $agent_logged_in[0])[4];
                                if ($id_list === $list_id){
                                    return $id_list;
                                }
                            }
                        }
                    }
                    return '';
                }
            }
        }
        return '';
    }

    /** See if lead is inserted or no **/
    public function isLeadInserted(Request $request){

        /** Get selected server **/
        $selected_server = $request->get('lead_server');
        $selected_list_id = $request->get('selected_list_id');
        $phone_number = $this->phoneFormat($request->get('phone_number'));

        /** Initial Inserted lead Value Or No */
        $lead_inserted = false;

        /** Get admin infos **/
        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'TEST HARMONIE'){
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else{
            $selected_server = 'TEST HARMONIE';
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }

        /** Get leads id */
        $leads_id = $this->leadSearch($selected_server, $admin_user, $admin_pass, $phone_number);
        /** Get list id */
        $list_id = $this->listIdList_lead_search($selected_server, $admin_user, $admin_pass, $leads_id, $selected_list_id);

        if ($list_id === $selected_list_id){
            $lead_inserted = true;
            response()->json($lead_inserted);
        }
        return response()->json($lead_inserted);
    }

    /** Get Lists **/
    public function getLists($selected_server){
        /** Get admin infos **/
        if ($selected_server == 'Call1'){
            $url_admin = 'https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call2'){
            $url_admin = 'https://call2.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[1]['user'];
            $admin_pass = $admin_infos[1]['pass'];
        }else if ($selected_server == 'CallBk'){
            $url_admin = 'https://call1.callbk.tk/agc/nasreddine/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'TEST HARMONIE'){
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else if ($selected_server == 'Call3'){
            $url_admin = 'https://call3.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }else{
            $selected_server = 'TEST HARMONIE';
            $url_admin = 'https://test.harmoniecrm.com/agc/vicidial_laravel/public/index.php/api/getadmin';
            $admin_infos = $this->getadmin($url_admin);
            $admin_user = $admin_infos[0]['user'];
            $admin_pass = $admin_infos[0]['pass'];
        }

        /** Generate url **/
        if (is_null($selected_server)){
            $url = "https://call1.capitalcontactcrm.tk/agc/vicidial_laravel/public/index.php/api/getLists/".Auth::user()->user."/".Auth::user()->pass."";
        }else{
            $url = $this->getServerLoggedIn($selected_server)."agc/vicidial_laravel/public/index.php/api/getLists/".$admin_user."/".$admin_pass."";
        }

        /** Get List data **/
        $agent_logged_in = [];
        $agent_logged_in = $this->getcurl($url);
        $info_logged_in = $agent_logged_in[1];

        $response_logged_in = "";
        $object_all = [];
        if ($agent_logged_in[0] != "0"){
            if ($info_logged_in['http_code'] === 200 ) {
                $object_all = $this->split_lists($agent_logged_in[0]);

                return response()->json($object_all);
            }
        }
        return response()->json([]);
    }

    /** Get auto ekoola data */
    function getAutoEkoolaData($admin_user, $admin_pass, $selected_server, $selected_list_id, $admin_url){



        /** Get Lead fata from Ikoola **/
        $ekoola_user_db = 'capitalkhedma';
        $ekoola_pass_db = 'Capital@2022@';

        /** Get last count old_entry_id */
        $old_entry_id = $this->getOldentryId();
        if ($old_entry_id == null){
            $old_entry_id = '0';
        }

        /** Show If there is new customer **/
        $url_count = "https://www.harmoniecrm.com/ekoola_api/public/api/countUsersSubscribed/".$old_entry_id."/".$ekoola_user_db."/".$ekoola_pass_db."";
        $response_count = $this->getcurl($url_count);
        $ekoola_data_count = $response_count[0];

        if ($response_count[1]['http_code'] == 200) {
            if (!str_contains($ekoola_data_count, 'ERROR')) {
                if ($ekoola_data_count != "[]") {
                    if ((int)$ekoola_data_count > 0){
                        $url = "https://www.harmoniecrm.com/ekoola_api/public/api/getFormsData/".$old_entry_id."/".$ekoola_user_db."/".$ekoola_pass_db."";

                        $response = $this->getcurl($url);
                        $ekoola_data = $response[0];

                        if ($response[1]['http_code'] == 200) {
                            if (!str_contains($ekoola_data, 'ERROR')) {
                                if ($ekoola_data != "[]") {
                                    $split_arr = explode('},{', explode('}]', explode('[{', $ekoola_data)[1])[0]); //dd($split_arr);
                                    $fetchdata = $this->ekoolaFetchData($split_arr);

                                    /** See if lead is inseted or no **/
                                    foreach ($fetchdata as $leads) {
                                        /** Get phone number **/
                                        $first_name = $this->fullNameFormat($leads->full_name);
                                        $second_name = ''; //$request->get('second_name');
                                        $birth_date = $this->birth_date_format($leads->birth_day);
                                        $adress = $this->address_format($this->getWillaya(explode('-', explode(':', $leads->address)[0])[0]));
                                        $phone_number = $this->phoneFormat($leads->number_phone);
                                        //$phone_number = "0666666666";
                                        /** Get leads id */
                                        //$leads_id = $this->leadSearch($selected_server, $admin_user, $admin_pass, $phone_number);
                                        /** Get list id */
                                        //$list_id = $this->listIdList_lead_search($selected_server, $admin_user, $admin_pass, $leads_id, $selected_list_id);

                                        //if ($list_id != $selected_list_id) {
                                        /** Insert Lead into vicidial database **/

                                        /** Generate url **/
                                        if (is_null($selected_server)) {
                                            $url = "https://test.harmoniecrm.com/vicidial/non_agent_api.php?source=test&user=" . Auth::user()->user . "&pass=" . Auth::user()->pass . "&function=add_lead&phone_number=$phone_number&phone_code=0&list_id=$selected_list_id&dnc_check=N&first_name=$first_name&last_name=$second_name&address1=$adress&date_of_birth=$birth_date";
                                        } else {
                                            $url = $admin_url."vicidial/non_agent_api.php?source=test&user=" . $admin_user . "&pass=" . $admin_pass . "&function=add_lead&phone_number=$phone_number&phone_code=0&list_id=$selected_list_id&dnc_check=N&first_name=$first_name&last_name=$second_name&address1=$adress&date_of_birth=$birth_date";
                                        }

                                        /** Get data **/
                                        $agent_logged_in = [];
                                        $agent_logged_in = $this->getcurl($url);
                                        $info_logged_in = $agent_logged_in[1];

                                        $response_logged_in = "";
                                        $object_all = [];
                                        if ($agent_logged_in[0] != "0") {
                                            if (!str_contains($agent_logged_in[0], 'ERROR')) {
                                                if ($info_logged_in['http_code'] === 200) {
                                                    /** Lead was inserted successfully **/
                                                }
                                            }
                                        }

                                        //}

                                    }

                                    /**************************************************************************************************************
                                     *
                                     * Here After we finished insert leads (foreach loop insert) we must update the new entry_id into own db table
                                     *
                                     * Update entry_id into 'ekoola_old_entry_id' db table
                                     *
                                     **************************************************************************************************************/
                                    $new_entry_id = explode(':', explode(',', $split_arr[0])[0])[1];
                                    $update_new_entry_id = $this->updateOldentryId($new_entry_id);


                                }
                            }
                        }

                    }
                }
            }
        }

    }

    /** Automatic get data from ekoola and insert it into vicidial db **/
    function setInterval($seconds, $selected_list_id, $admin_infos, $start_stop)
    {
        if ($start_stop === "Start"){
            $this->start_stop_global = true;
        }else{
            $this->start_stop_global = false;
        }

        /** Get admin infos **/
        $selected_server = $admin_infos['server_name'];
        $admin_user = $admin_infos['server_user'];
        $admin_pass = $admin_infos['server_password'];
        $admin_url = $admin_infos['link_server'];

        ignore_user_abort(true);//Run in persistent mode
        set_time_limit(0);//Run infinitely

        while ($this->start_stop_global == true) {
            //==do your rest of works here.
            //echo "Current timestamp is: " . time() . PHP_EOL;
            $this->getAutoEkoolaData($admin_user, $admin_pass, $selected_server, $selected_list_id, $admin_url);
            flush();//buffer output
            sleep(((int)$seconds));
            //sleep(((int)$seconds) * 60);
        }
    }

    /** Run Automatic Insert Data **/
    public function runAutomaticInsertData(){

        //$this->setInterval($milliseconds, $selected_list_id);
    }

    /** Insert Servers informations **/
    public function getInsertServers(Request $request){

        if ($request->isMethod('GET')){
            $server_informations = null;
            /** Get Servers **/
            if (Schema::hasTable('own_servers') == true) {
                $server_informations = OwnServers::select('server_name', 'server_user', 'server_password', 'link_server')
                    ->get();
            }

            return view('servers_management/create_servers', [ 'servers' => $server_informations ]);
        }

        /** Insert servers informations (create table if not exist) **/
        if (!Schema::hasTable('own_servers')) {
            Schema::create('own_servers', function(Blueprint $table){
                $table->bigIncrements('server_id');
                $table->string('server_name');
                $table->string('server_user');
                $table->string('server_password');
                $table->string('link_server');
                $table->timestamps();
            });
        }

        /** Insert Data **/
        $OwnServers = new OwnServers();
        $OwnServers->server_name = $request->get('server_name');
        $OwnServers->server_user = $request->get('server_user');
        $OwnServers->server_password = $request->get('server_password');
        $OwnServers->link_server = $request->get('link_server');
        $OwnServers->save();

        return redirect('getInsertServers');
    }

    /** Get Servers name  */
    public function getServers(){
        return OwnServers::select('server_id', 'server_name')->get();
    }

    /** Get Ekoola setting page **/
    public function ekoolaSetting(Request $request){
        if ($request->isMethod('GET')){
            return view('ekoola/setting_server', ['get_servers' => $this->getServers()]);
        }

        /** Save setting to table (create table if not exist) **/
        Schema::dropIfExists('ekoola_setting');
        if (!Schema::hasTable('ekoola_setting')) {
            Schema::create('ekoola_setting', function(Blueprint $table){
                $table->bigIncrements('id_ekoolasetting');
                $table->bigInteger('server_id')->unsigned();
                $table->string('list_name');
                $table->string('time_refresh');
                $table->boolean('selected');
                $table->timestamps();

                $table->foreign('server_id')->references('server_id')->on('own_servers'); //->onDelete('cascade');
            });
        }
        //dd($request->get('lead_server'), $request->get('lists_name'), $request->get('select_time'));
        /** Save this data */
        $EkoolaSetting = EkoolaSetting::updateOrInsert(
            ['server_id' => $request->get('lead_server'),
                'list_name' => $request->get('lists_name'),
                'time_refresh' => $request->get('select_time'),
                'selected' => true ]
        );

        /* $find_id = (EkoolaSetting::select('id_ekoolasetting')
            ->where('server_id', '=', $request->get('lead_server'))
            ->where('list_name', '=', $request->get('lists_name'))
            ->where('time_refresh', '=', $request->get('select_time'))
            ->get())[0]['id_ekoolasetting']; */

        //DB::select("UPDATE ekoola_setting SET selected = false WHERE id_ekoolasetting <>  ".$find_id);

        return redirect('ekoolaSetting');

    }

    /** Run the automatic insert from Ikoola **/
    public function runAutomaticEkoola($start_stop){

        $getekoola_setting = EkoolaSetting::select('server_id', 'list_name', 'time_refresh')->get()[0];

        $server_id = $getekoola_setting['server_id'];
        $list_name = $getekoola_setting['list_name'];
        $time_refresh = $getekoola_setting['time_refresh']; dd($server_id, $list_name, $time_refresh);

        $server_informations = (OwnServers::select('server_name', 'server_user', 'server_password', 'link_server')
            ->where('server_id', '=', $server_id)
            ->get())[0];

        $this->setInterval($time_refresh, $list_name, $server_informations, $start_stop);
    }

    public function addSite(Request $request){
        /** Create Table 'addSite' if not exist **/
        if (!Schema::hasTable('ower_sites')) {
            Schema::create('ower_sites', function(Blueprint $table){
                $table->bigIncrements('id_sites');
                $table->string('site_owner');
                $table->string('site_name');
                $table->string('link_site');
                $table->timestamps();
            });
        }

        if ($request->isMethod('POST')){

            $add_Site = new addSite;
            $add_Site->site_owner = $request->get('site_developer');
            $add_Site->site_name = $request->get('site_name');
            $add_Site->link_site = $request->get('site_link');

            $add_Site->save();

            return redirect('addSite');
        }

        /*if ($request->isMethod("PUT")){

            addSite::where('id_sites', $request->get('id_site_update_links'))
                    ->update(['site_owner' => $request->get('site_developer')],
                        ['site_name' => $request->get('site_name')],
                        ['link_site' => $request->get('site_link') ] );

            return redirect('addSite');
        } */


        /** Gets data from db table */
        $get_site_data = addSite::select('*')->get();

        return view('kamel_sites/kamel_sites',
            ['get_site_informations' => $get_site_data]);



    }

    public function addSiteUpdate(Request $request){
        dd($request->get('id_site_update_linkss'), $request->get('site_developer'), $request->get('site_name'), $request->get('site_link'));
        $site_id = addSite::find(intval($request->get('id_site_update_linkss')));
        dd($site_id, intval($request->get('id_site_update_links')),  $request->get('id_site_update_links'));
        $site_id->site_owner = $request->get('site_developer');
        $site_id->site_name = $request->get('site_name');
        $site_id->link_site = $request->get('site_link');

        $site_id->update();

        return redirect('addSite');
    }

    function randomNumberSequence($requiredLength = 7, $highestDigit = 9) {
        $sequence = '';
        for ($i = 0; $i < $requiredLength; ++$i) {
            $sequence .= mt_rand(0, $highestDigit);
        }
        return $sequence;
    }

    /** Import Lit */
    public function importList(Request $request){

        if ($request->isMethod('GET')){

            /** Get vicidial list informations */
            $vicidial_lists = VicidialLists::select('list_id', 'list_name')->get();

            return view('LeadsList/importlist',
                ['lists' => $vicidial_lists]);
        }

        // Starting clock time in seconds
        $start_time = microtime(true);

        $file = $request->file('csv_file');

        //$directorypath = public_path().'\\storage\\'.$filename;
        $filename = time().'_'.$file->getClientOriginalName();

        /** Get contact list file and make it in storage **/
        $file_content = file_get_contents($file);
        //Storage::disk('local')->put( $filename , $file_content);
        Storage::disk('local')->put( $filename , $file_content);
        $file_path = public_path().'/storage/'.$filename;

        /** Delete file from storage */
        //File::delete($file_path);

        ###Get list_id
        $list_id = $request->get('get_lists');
        Excel::import(new ListImport($list_id), $file_path);

        // End clock time in seconds
        $end_time = microtime(true);

        // Calculate script execution time
        $execution_time = ($end_time - $start_time);

        return $execution_time;

    }

    /** Create List */
    public function addList(Request $request){

        if($request->isMethod('GET')){
            /** Get Campaigns */
            $getCpms = Campaigns::select('campaign_id', 'campaign_name')->get();

            return view('Admin.liste.ajouter-liste', ['cpms' => $getCpms]);
        }
        $getServer = $_SERVER['SERVER_NAME'];
        $list_id = $request->get('list_id');
        $list_name = $request->get('list_name');
        $list_description = $request->get('list_description');
        $active_y_n = 'N';
        $active_y_n = $request->get('active_y_n');
        $cpm_id = $request->get('cpm_id');

        $addlist_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&function=add_list&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&list_id='.$list_id.'&list_name='.$list_name.'&campaign_id='.$cpm_id.'&active='.$active_y_n.'&list_description='.$list_description;
        //dd($addlist_url);
        $response = $this->getcurl($addlist_url); //dd($response);
        $addlist_response = $response[0];

        if ($response[1]['http_code'] == 200) {
            if (!str_contains($addlist_response, 'ERROR')) {
                if ($addlist_response != "[]") {
                    return redirect('afficher-liste')->with('message', ["SUCCESS", $addlist_response]);
                }
            }
        }
        return redirect('afficher-liste')->with('message', ["ERROR", $addlist_response]);
    }

    /** Load new list */
    public function loadList(Request $request){

        /** Get vicidial list informations */
        $vicidial_lists = VicidialLists::select('list_id', 'list_name')->get();

        /** Get phone codes */
        $vicidialPhoneCodes = VicidialPhoneCodes::select('country_code', 'country')
            ->groupBy('country', 'country_code')
            ->orderBy('country_code', 'ASC')
            ->get();


        return view('Admin.liste.load_list',
            ['lists' => $vicidial_lists, 'vicidial_codes' => $vicidialPhoneCodes]);

    }

    /** Import list */
    public function import_leads(Request $request){
        ###Get list_id
        $list_id = $request->get('get_list_selected');

        ###Get phone code (prefix)
        $phone_code = $request->get('phone_code_override');

        $file = $request->file('upload_file');

        //$directorypath = public_path().'\\storage\\'.$filename;
        $filename = time().'_'.$file->getClientOriginalName();

        /** Get contact list file and make it in storage **/
        $file_content = file_get_contents($file);
        //Storage::disk('local')->put( $filename , $file_content);
        Storage::disk('local')->put( $filename , $file_content);
        //$file_path = public_path().'/storage/'.$filename;
        $file_path = Storage::disk('local')->path($filename);

        /** Get the first row(header) of this excel */
        $columns= (new HeadingRowImport)->toArray($file_path);

        return view('Admin.liste.import_leads',
            ['list_id' => $list_id, 'phone_code' => $phone_code, 'file_path' => $file_path,
                'header' => $columns[0][0], 'filename' => $file->getClientOriginalName(), 'file_extension' => strtoupper($file->clientExtension()) ]);
    }

    /** Import this leads */
    public function import_thisLeads(Request $request){
        /** Import this list with new fields specification */
        $list_id = $request->get('list_id');
        $phone_code = $request->get('phone_code');
        $file_path = $request->get('file_path');
        $file_name = $request->get('file_name');

        $CODE_PRINCIPAL_DU_VENDEUR_INDEX = $request->get('CODE_PRINCIPAL_DU_VENDEUR_INDEX');
        $ID_SOURCE_INDEX = $request->get('ID_SOURCE_INDEX');
        $TITRE_INDEX = $request->get('TITRE_INDEX');
        $PRENOM_INDEX = $request->get('PRENOM_INDEX');
        $INITIALE_INDEX = $request->get('INITIALE_INDEX');
        $NOM_DE_FAMILLE_INDEX = $request->get('NOM_DE_FAMILLE_INDEX');
        $ADRESSE_1_INDEX = $request->get('ADRESSE_1_INDEX');
        $ADRESSE_2_INDEX = $request->get('ADRESSE_2_INDEX');
        $ADRESSE_3_INDEX = $request->get('ADRESSE_3_INDEX');
        $VILLE_INDEX = $request->get('VILLE_INDEX');
        $ETAT_INDEX = $request->get('ETAT_INDEX');
        $PROVINCE_INDEX = $request->get('PROVINCE_INDEX');
        $CODE_POSTAL_INDEX = $request->get('CODE_POSTAL_INDEX');
        $CODE_PAYS_INDEX = $request->get('CODE_PAYS_INDEX');
        $LE_GENRE_INDEX = $request->get('LE_GENRE_INDEX');
        $DATE_DE_NAISSANCE_INDEX = $request->get('DATE_DE_NAISSANCE_INDEX');
        $E_MAIL_INDEX = $request->get('E_MAIL_INDEX');
        $MENTION_DE_SECURITE_INDEX = $request->get('MENTION_DE_SECURITE_INDEX');
        $COMMENTAIRES_INDEX = $request->get('COMMENTAIRES_INDEX');
        $RANG_INDEX = $request->get('RANG_INDEX');
        $PROPRIETAIRE_INDEX = $request->get('PROPRIETAIRE_INDEX');
        $CHAMPSTEST_INDEX = $request->get('CHAMPSTEST_INDEX');
        $NUMERO_DE_TELEPHONE_INDEX = $request->get('NUMERO_DE_TELEPHONE_INDEX');
        $TELEPHONE_SUPPLEMENTAIRE_INDEX = $request->get('TELEPHONE_SUPPLEMENTAIRE_INDEX');

        try {

            Excel::import(new ListImport($list_id, $phone_code, $CODE_PRINCIPAL_DU_VENDEUR_INDEX,
                $ID_SOURCE_INDEX, $TITRE_INDEX, $PRENOM_INDEX, $INITIALE_INDEX,
                $NOM_DE_FAMILLE_INDEX, $ADRESSE_1_INDEX, $ADRESSE_2_INDEX,  $ADRESSE_3_INDEX, $VILLE_INDEX, $ETAT_INDEX,
                $PROVINCE_INDEX, $CODE_POSTAL_INDEX, $CODE_PAYS_INDEX, $LE_GENRE_INDEX, $DATE_DE_NAISSANCE_INDEX,
                $E_MAIL_INDEX, $MENTION_DE_SECURITE_INDEX, $COMMENTAIRES_INDEX, $RANG_INDEX, $PROPRIETAIRE_INDEX,
                $CHAMPSTEST_INDEX, $NUMERO_DE_TELEPHONE_INDEX, $TELEPHONE_SUPPLEMENTAIRE_INDEX), $file_path);

            ### LOG INSERTION Admin Log Table ###
            $logf = DB::table('vicidial_admin_log')->insert(['event_date' => ''.date('Y-m-d H:m:i').'', 'user' => ''.Auth::user()->user.'',
                'ip_address' => ''.$_SERVER['SERVER_ADDR'].'', 'event_section'=> 'LISTS',
                'event_type' => 'LOAD', 'record_id' => ''.$list_id.'', 'event_code' => 'ADMIN LOAD LIST CUSTOM',
                'event_sql' => '', 'event_notes' => 'File Name: '.$file_name.', GOOD: N, BAD: N, TOTAL: N' ]);

            /** Delete file from storage */
            File::delete($file_path);

            return redirect('afficher-liste')->with('message', ["SUCCESS", "Upload List Successfully"]);
        }catch (\Exception $e){
            return redirect('afficher-liste')->with('message', ["ERROR", $e->getMessage()]);
        }


    }

    /** Display Lists */
    public function displayLists(){
        /** Get Lists */
        $lists = VicidialLists::select('list_id', 'list_name', 'list_description')->get();

        return view('Admin.liste.show-liste', ['lists' => $lists]);
    }

    /** Update Liste */
    public function updateListe(Request $request, $list_id){
        if ($request->isMethod('GET')){
            /** GEt list_id information */
            $list_infos = VicidialLists::find($list_id);

            /** Get campaigns list */
            $cpms = Campaigns::select('campaign_id', 'campaign_name')->get();

            return view('Admin.liste.modifier-liste', ['lists' => $list_infos, 'cpms' => $cpms]);
        }
        /** Make update of tgis list */
        $getServer = $_SERVER['SERVER_NAME'];
        $lists_array = $request->get('lists_array');

        $list_id = $lists_array[0];
        $list_name = $lists_array[1];
        $list_description = $lists_array[2];
        $cpm_id = $lists_array[3];
        $active_y_n = $lists_array[4];


        $updatelist_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&function=update_list&list_id='.$list_id.'&list_name='.$list_name.'&campaign_id='.$cpm_id.'&active='.$active_y_n.'&list_description='.$list_description;

        $response = $this->getcurl($updatelist_url); //dd($response);
        $updatelist_response = $response[0];

        $data = [];
        $data['status'] = $response[1]['http_code'];
        $data['isResponseError'] = str_contains($updatelist_response, 'ERROR');
        $data['message'] = $updatelist_response;

        return response()->json($data);

        /*if ($response[1]['http_code'] == 200) {
            if (!str_contains($updatelist_response, 'ERROR')) {
                if ($updatelist_response != "[]") {
                    return redirect('afficher-liste')->with('message', ["SUCCESS", $updatelist_response]);
                }
            }
        }
        return redirect('afficher-liste')->with('message', ["ERROR", $updatelist_response]); */

    }

    /** Delete List */
    public function deleteList($list_id){
        $getServer = $_SERVER['SERVER_NAME'];
        $deleteList_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&function=update_list&list_id='.$list_id.'&delete_list=Y&delete_leads=Y';
        $response = $this->getcurl($deleteList_url);
        $deleteList_response = $response[0];

        $data = [];
        $data['status'] = $response[1]['http_code'];
        $data['isResponseError'] = str_contains($deleteList_response, 'ERROR');
        $data['content'] = $deleteList_response;

        return response()->json($data);

        /*if ($response[1]['http_code'] == 200) {
            if (!str_contains($deleteList_response, 'ERROR')) {
                if ($deleteList_response != "[]") {
                    return redirect('afficher-liste')->with('message', ["SUCCESS", $deleteList_response]);
                }
            }
        }
        return redirect('afficher-liste')->with('message', ["ERROR", $deleteList_response]); */
    }

    /** Add User */
    public function addUser(Request $request){

        if ($request->isMethod('GET')){
            /** Get user group */
            $vicidial_user_groups = Vicidial_User_Groups::select('user_group', 'group_name')->get();

            return view('Admin.utilisateur.ajouter-utilisateur', ['vicidial_user_groups' => $vicidial_user_groups]);
        }
        /** Add User **/
        $getServer = $_SERVER['SERVER_NAME'];
        $agent_user = $request->get('get_agent_user');
        $agent_pass = $request->get('get_agent_pass');
        $agent_level = $request->get('get_agent_level');
        $agent_full_name = $request->get('get_agent_full_name');
        $agent_user_group = $request->get('get_agent_user_group');
        $agent_user_phone_login = $request->get('get_agent_phone_login');
        $agent_user_phone_pass = $request->get('get_agent_phone_pass');

        $addUsert_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&function=add_user&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&agent_user='.$agent_user.'&agent_pass='.$agent_pass.'&agent_user_level='.$agent_level.'&agent_full_name='.$agent_full_name.'&agent_user_group='.$agent_user_group.'&phone_login='.$agent_user_phone_login.'&phone_pass='.$agent_user_phone_pass;

        //dd($addUsert_url);
        $response = $this->getcurl($addUsert_url); //dd($response);
        $addUser_response = $response[0];

        if ($response[1]['http_code'] == 200) {
            if (!str_contains($addUser_response, 'ERROR')) {
                if ($addUser_response != "[]") {

                    if ($agent_level < 4){
                        /** Add Phone for this user */
                        $add_phone_url = "https://".$getServer."/vicidial/non_agent_api.php?source=test&function=add_phone&user=".Auth::user()->user.'&pass='.Auth::user()->pass."&extension=$agent_user_phone_login&dialplan_number=$agent_user_phone_login&voicemail_id=$agent_user_phone_login&phone_login=$agent_user_phone_login&phone_pass=$agent_user_phone_pass&server_ip=".$_SERVER['SERVER_ADDR']."&protocol=SIP&registration_password=$agent_user_phone_pass&phone_full_name=$agent_user_phone_login&local_gmt=1.00&outbound_cid=$agent_user_phone_login&is_webphone=Y&template_id=webRTC";
                        $response_phone = $this->getcurl($add_phone_url);
                        $updatePhone_response = $response_phone[0];

                        if ($response_phone[1]['http_code'] == 200) {
                            if (!str_contains($updatePhone_response, 'ERROR')) {
                                if ($updatePhone_response != "[]") {
                                    /** Redirect to list users with success message of creatting user and his/her phone */
                                    return redirect('afficher-utilisateur')->with('message',["SUCCESS", $addUser_response." AND SUCCESS ADD PHONE ".$updatePhone_response]);
                                }
                            }
                        }
                        /** Redirect to list users with error message of non creatting a phone of this user (user was created successfully) */
                        return redirect('afficher-utilisateur')->with('message', ["ERROR", $updatePhone_response." AND ".$addUser_response]);
                    }

                    /** Redirect to list users with success message of creatting just user without phone (Admin) */
                    return redirect('afficher-utilisateur')->with('message',["SUCCESS", $addUser_response]);
                }
            }
        }

        return redirect('afficher-utilisateur')->with('message', ["ERROR", $addUser_response]);

    }

    /** Delete User */
    public function deleteUser($agent_user){
        $getServer = $_SERVER['SERVER_NAME'];
        /** Initiale delete user url */
        $delete_url = "https://".$getServer."/vicidial/non_agent_api.php?source=test&function=update_user&user=".Auth::user()->user.'&pass='.Auth::user()->pass."&agent_user=$agent_user&delete_user=Y";
        $response_user = $this->getcurl($delete_url);
        $deleteUser_response = $response_user[0];

        $data = [];
        $data['status'] = $response_user[1]['http_code'];
        $data['content'] = $deleteUser_response;
        $data['isResponseError'] = str_contains($deleteUser_response, 'ERROR');

        return response()->json($data);


        /* if ($response_user[1]['http_code'] == 200) {
             if (!str_contains($deleteUser_response, 'ERROR')) {
                 if ($deleteUser_response != "[]") {
                     /** Redirect to list users with success message of deleting user */
        /*          return redirect('afficher-utilisateur')->with('message',["SUCCESS", $deleteUser_response]);
              }
          }
      } */
        /** Redirect to list users with error message of non deleting this user */
        // return redirect('afficher-utilisateur')->with('message', ["ERROR", $deleteUser_response]);
    }

    /** Show Users */
    public function showUsers(){
        $vicidial_users = Vicidial_User::select('user_id', 'user', 'full_name', 'user_level', 'user_group', 'active')->get();

        return view('Admin.utilisateur.afficher-utilisateur',
            ['vicidial_users' => $vicidial_users]);
    }

    /** Update User */
    public function updateUser(Request $request, $user_id){

        if ($request->isMethod('GET')){
            /** Find vicidial_users **/
            $update_user = Vicidial_User::find($user_id);

            /** Get user group */
            $vicidial_user_groups = Vicidial_User_Groups::select('user_group', 'group_name')->get();

            return view('Admin.utilisateur.modifier-utilisateur',
                ['update_user' => $update_user, 'vicidial_user_groups' => $vicidial_user_groups]);
        }

        /** Get update user fields **/
        $getServer = $_SERVER['SERVER_NAME'];
        $users_array = $request->get('users_array');

        $agent_user = $users_array[0];
        $agent_pass = $users_array[1];
        $agent_full_name = $users_array[2];
        $agent_level = $users_array[3];
        $agent_active = $users_array[4];
        $agent_user_group = $users_array[5];
        $agent_user_phone_login = $users_array[6];
        $agent_user_phone_pass = $users_array[7];


        /** Make users field update */
        $updateUsert_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&function=update_user&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&agent_user='.$agent_user.'&agent_pass='.$agent_pass.'&agent_user_level='.$agent_level.'&agent_full_name='.$agent_full_name.'&agent_user_group='.$agent_user_group.'&phone_login='.$agent_user_phone_login.'&phone_pass='.$agent_user_phone_pass.'&active='.$agent_active;

        //dd($updateUsert_url);
        $response = $this->getcurl($updateUsert_url); //dd($updateUsert_url, $response);
        $updateUser_response = $response[0];

        $data = [];
        $data['status'] = $response[1]['http_code'];
        $data['message'] = $updateUser_response;

        return response()->json($data);
        /*if ($response[1]['http_code'] == 200) {
            if (!str_contains($updateUser_response, 'ERROR')) {
                if ($updateUser_response != "[]") {
                    return redirect('afficher-utilisateur')->with('message',["SUCCESS", $updateUser_response]);
                }
            }
        }*/

        //return redirect('afficher-utilisateur')->with('message', ["ERROR", $updateUser_response]);
    }


    /** CPANEL */
    public function cpanel(){
        $getServer = $_SERVER['SERVER_NAME'];
        $live_agents = DB::table('vicidial_live_agents')
            ->join('vicidial_users', 'vicidial_users.user', '=', 'vicidial_live_agents.user' )
            ->select('vicidial_users.full_name', 'vicidial_live_agents.user', 'vicidial_live_agents.status', 'conf_exten AS session',
                DB::raw("SEC_TO_TIME(TIMESTAMPDIFF(second, vicidial_live_agents.last_state_change, CURRENT_TIMESTAMP() )) AS chrono"))
            ->get();

        return view('Admin.cpanel.cpanel', ['logged_in' => $live_agents]);
    }

    /** Copy User */
    public function copyUser(Request $request){
        if ($request->isMethod('GET')){
            $get_users_ids = Vicidial_User::select('user', 'full_name')->get();
            return view('Admin.utilisateur.copier-utilisateur', ['get_users_ids' => $get_users_ids]);
        }
        /** Add User **/
        $getServer = $_SERVER['SERVER_NAME'];
        $agent_user_number = $request->get('get_agent_user_number');
        $agent_pass = $request->get('get_agent_pass');
        $agent_full_name = $request->get('get_agent_full_name');
        $agent_source_id = $request->get('get_agent_source_id');

        $copyUsert_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&function=copy_user&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&agent_user='.$agent_user_number.'&agent_pass='.$agent_pass.'&source_user='.$agent_source_id.'&agent_full_name='.$agent_full_name;

        //dd($addUsert_url);
        $response = $this->getcurl($copyUsert_url); //dd($response);
        $copyUser_response = $response[0];

        if ($response[1]['http_code'] == 200) {
            if (!str_contains($copyUser_response, 'ERROR')) {
                if ($copyUser_response != "[]") {
                    return redirect('afficher-utilisateur')->with('message',["SUCCESS", $copyUser_response]);
                }
            }
        }

        return redirect('afficher-utilisateur')->with('message', ["ERROR", $copyUser_response]);
    }


    public function uploadFile(){

        $url = "http://call1.harmoniecrm.com/vicidial/admin_listloader_fourth_gen.php";
        $data = [
            'PHP_AUTH_USER' => '7777',
            'PHP_AUTH_PW'=> '0551797726kamel',
            'leadfile_name' => 'test_list_upload.xlsx',
            'DB'  => '0',
            'vendor_lead_code_field' => '-1',
            'source_id_field' => '-1',
            'phone_number_field' => '3',
            'title_field' => '-1',
            'first_name_field' => '0',
            'middle_initial_field' => '-1',
            'last_name_field'  => '1',
            'address1_field' => '6',
            'address2_field' => '7',
            'address3_field' => '-1',
            'city_field' => '8',
            'state_field' => '-1',
            'province_field' => '-1',
            'postal_code_field' => '5',
            'country_code_field' => '-1',
            'gender_field' => '-1',
            'date_of_birth_field' => '2',
            'alt_phone_field' => '-1',
            'email_field' => '-1',
            'security_phrase_field' => '-1',
            'comments_field' => '-1',
            'rank_field' => '-1',
            'owner_field' => '-1',
            'international_dnc_scrub' => '',
            'dedupe_statuses_override' => '',
            'status_mismatch_action' => '',
            'dupcheck' => 'NONE',
            'usacan_check' => 'NONE',
            'state_conversion' => '',
            'web_loader_phone_length' => '',
            'postalgmt' => 'AREA',
            'lead_file' => '/tmp/test_list_upload.txt',
            'list_id_override' => '26969696',
            'phone_code_override'  => '33',
            'DB' => '0',
            'OK_to_process' => 'OK TO PROCESS'

        ];
        $response = $this->getcurlPOST($url, $data);
        dd($response);
    }
}
