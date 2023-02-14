<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vicidial_User_Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class phoneController extends Controller
{
    /** Show Campaign */
    public function showPhone(){
        $phone_list = DB::table('phones')->select('extension', 'protocol', 'server_ip', 'dialplan_number', 'status', 'fullname', 'login')->get();
        $countPhones = DB::table('phones')->count();

        return view('Admin.phones.liste-phone', ['phone_list' => $phone_list, 'countPhones' => $countPhones]);
    }

    /** Add Phone */
    public function addPhone(Request $request){
        /** Get add phone page */
        if ($request->isMethod('GET')){
            /** Get user group */
            $vicidial_user_groups = Vicidial_User_Groups::select('user_group', 'group_name')->get();
            $get_the_servers_ip = DB::table('servers')->select('server_id', 'server_description', 'server_ip')->get();

            return view('Admin.phones.ajouter-telephone', ['vicidial_user_groups' => $vicidial_user_groups, 'get_the_servers_ip' => $get_the_servers_ip]);
        }
        /** Add User **/
        $getServer = $_SERVER['SERVER_NAME'];
        $agent_full_name = $request->get('get_phone_full_name');
        $agent_user_group = $request->get('get_admin_user_group');
        $agent_user_phone_login = $request->get('get_phone_login');
        $agent_user_phone_pass = $request->get('get_phone_pass');
        $get_phone_extension = $request->get('get_phone_extension');
        $get_dial_plan = $request->get('get_dialplan_number');
        $get_voice_mail_box = $request->get('get_voicemail_id');
        $get_outbound_caller_id = $request->get('get_outbound_cid');
        $get_server_ip = $request->get('get_server_ip');

        /** Add Phone for this user */
        $add_phone_url = "https://".$getServer."/vicidial/non_agent_api.php?source=test&function=add_phone&user=".Auth::user()->user.'&pass='.Auth::user()->pass."&extension=$get_phone_extension&dialplan_number=$get_dial_plan&voicemail_id=$get_voice_mail_box&phone_login=$agent_user_phone_login&phone_pass=$agent_user_phone_pass&server_ip=$get_server_ip&protocol=SIP&registration_password=$agent_user_phone_pass&phone_full_name=$agent_full_name&local_gmt=1.00&outbound_cid=$get_outbound_caller_id&is_webphone=Y&template_id=webRTC";
        $response_phone = $this->getcurl($add_phone_url);
        $updatePhone_response = $response_phone[0];

        if ($response_phone[1]['http_code'] == 200) {
            if (!str_contains($updatePhone_response, 'ERROR')) {
                if ($updatePhone_response != "[]") {
                    /** Redirect to list users with success message of creatting user and his/her phone */
                    return redirect('liste-phone')->with('message', ["SUCCESS", $updatePhone_response]);
                }
            }
        }

        return redirect('liste-phone')->with('message', ["ERROR", $updatePhone_response]);
    }

    /** Update Phone */
    public function updatePhone(Request $request, $phone_login){
        /** Get pdate phone page */
        if ($request->isMethod('GET')){
            /** Get user group */
            $vicidial_user_groups = Vicidial_User_Groups::select('user_group', 'group_name')->get();
            $get_the_servers_ip = DB::table('servers')->select('server_id', 'server_description', 'server_ip')->get();
            $get_phone_informations =  DB::table('phones')
                    ->select('extension', 'protocol', 'server_ip', 'dialplan_number', 'status', 'fullname', 'login', 'pass', 'voicemail_id', 'outbound_cid', 'user_group')
                    ->where('login', $phone_login)
                    ->get()[0];

            return view('Admin.phones.modifier-telephone',
                    ['vicidial_user_groups' => $vicidial_user_groups,
                        'get_the_servers_ip' => $get_the_servers_ip,
                        'get_phone_informations' => $get_phone_informations ]);
        }
        /** Update User **/
        $getServer = $_SERVER['SERVER_NAME'];
        $phones_array = $request->get('phones_array');

        $agent_user_phone_login = $phones_array[0];
        $agent_user_phone_pass = $phones_array[1];
        $agent_full_name = $phones_array[2];
        $get_phone_extension = $phones_array[3];
        $get_dial_plan = $phones_array[4];
        $get_voice_mail_box = $phones_array[5];
        $get_outbound_caller_id = $phones_array[6];
        $agent_user_group = $phones_array[7];
        $get_server_ip = $phones_array[8];

        /** Update Phone for this user */
        $update_phone_url = "https://".$getServer."/vicidial/non_agent_api.php?source=test&function=update_phone&user=".Auth::user()->user.'&pass='.Auth::user()->pass."&extension=$get_phone_extension&dialplan_number=$get_dial_plan&voicemail_id=$get_voice_mail_box&phone_login=$agent_user_phone_login&phone_pass=$agent_user_phone_pass&server_ip=$get_server_ip&protocol=SIP&registration_password=$agent_user_phone_pass&phone_full_name=$agent_full_name&local_gmt=1.00&outbound_cid=$get_outbound_caller_id&is_webphone=Y&template_id=webRTC";
        $response_phone = $this->getcurl($update_phone_url);
        $updatePhone_response = $response_phone[0];

        $data = [];
        $data['status'] = $response_phone[1]['http_code'];
        $data['isResponseError'] = !str_contains($updatePhone_response, 'ERROR');
        $data['message'] = $updatePhone_response;

        return response()->json($data);

       /* if ($response_phone[1]['http_code'] == 200) {
            if (!str_contains($updatePhone_response, 'ERROR')) {
                if ($updatePhone_response != "[]") {
                    /** Redirect to list users with success message of updatting this phone */
                /*    return redirect('liste-phone')->with('message', ["SUCCESS", $updatePhone_response]);
                }
            }
        }

        return redirect('liste-phone')->with('message', ["ERROR", $updatePhone_response]); */
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
}
