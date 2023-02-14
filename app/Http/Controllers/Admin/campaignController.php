<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class campaignController extends Controller
{
    /** Add Campaign */
    public function addCampaign(Request $request){
        if ($request->isMethod('GET')){
            return view('Admin.compagne.ajouter-compagne');
        }
        /** Insert a new campaign **/
        try {
            ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
            $vo_ct = DB::table('vicidial_override_ids')->select('value')
                ->where('id_table', '=', 'vicidial_campaigns')
                ->where('active', '=', '1')
                ->get();
            if ($vo_ct->count()){
                $campaign_id = $vo_ct[0]->value + 1;

                $rslt = DB::table('vicidial_override_ids')
                    ->where('id_table', '=', 'vicidial_campaigns')
                    ->where('active', '=', '1')
                    ->update(['value' => $campaign_id]);
            }
            ##### END ID override optional section #####

            /** Get fields */
            $cpm_id = $request->get('cpm_number');
            $cpm_name = $request->get('cpm_name');
            $cpm_actif = $request->get('cpm_actif');
            $cpm_hoper_level = $request->get('cpm_hoper_level');
            $cpm_next_agent_call = $request->get('cpm_next_agent_call');

            $row_cpm = DB::table('vicidial_campaigns')
                ->where('campaign_id', '=', $cpm_id)
                ->count();
            if ($row_cpm > 0){
                return redirect('liste-compagne')->with('message',["ERROR", 'CAMPAIGN NOT ADDED - there is already a campaign in the system with this ID']);
            }
            if ( (strlen($cpm_id) < 2) or (strlen($cpm_id) > 8) or (strlen($cpm_name) < 6)  or (strlen($cpm_name) > 40) )
            {
                return redirect('liste-compagne')
                    ->with('message',["ERROR", '<br>CAMPAIGN NOT ADDED - Please go back and look at the data you entered \n
                                        <br>campaign ID must be between 2 and 8 characters in length \n
                                            <br>campaign name must be between 6 and 40 characters in length \n ']);
            }

            $insert_cpm = DB::table('vicidial_campaigns')->insert(['campaign_id' => $cpm_id, 'campaign_name' => $cpm_name, 'active' => $cpm_actif, 'hopper_level' => $cpm_hoper_level, 'next_agent_call' => $cpm_next_agent_call]);

            if ($insert_cpm == true){
                $true_false = DB::table('vicidial_campaign_stats')->insert(['campaign_id' => $cpm_id]);
                if ($true_false == true){
                    DB::table('vicidial_campaign_stats_debug')->insert(['campaign_id' => $cpm_id, 'server_ip' => $_SERVER['SERVER_ADDR']]);
                }else{
                    return redirect('liste-compagne')->with('message',["ERROR", 'We can not insert into vicidial_campaign_stats_debug table']);
                }
            }else{
                return redirect('liste-compagne')->with('message',["ERROR", 'We can not insert into the database']);
            }

            ### LOG INSERTION Admin Log Table ###
            $stmt="INSERT INTO vicidial_campaigns values('$cpm_id','$cpm_name','$cpm_actif','$cpm_hoper_level','$cpm_next_agent_call')";
            $SQL_log = "$stmt|";
            //$SQL_log = preg_replace(';','',$SQL_log);
            $SQL_log = addslashes($SQL_log);
            $admin_log = DB::table('vicidial_admin_log')->insert(['event_date' => date('Y-m-d H:m:i'),
                'user' => Auth::user()->user, 'ip_address' => $_SERVER['SERVER_ADDR'],
                'event_section' => 'CAMPAIGNS', 'event_type' => 'ADD', 'record_id' => ''.strval($cpm_id).'',
                'event_code'=> 'ADMIN ADD CAMPAIGN', 'event_sql' => $SQL_log, 'event_notes' => '' ]);

            return redirect('liste-compagne')->with('message',['SUCCESS', 'La compagne est ajouté  avec success']);
        }catch (\Exception $ex){
            return redirect('liste-compagne')->with('message',['ERROR', 'Erreur ,Compagne non crée '.$ex->getMessage()]);
        }
    }

    /** Reform the list */
    public function reformTheList($cpm_list_response){
        $list_cpm =preg_split("/\r\n|\n|\r/", $cpm_list_response);

        $objects_Cpms = ((array) new \stdClass());
        for ($i=0; $i < sizeof($list_cpm) - 1; $i++){
            $objects_Cpms_infos = new \stdClass();
            $arrCpm = explode('|', $list_cpm[$i]);
            $objects_Cpms_infos->campaign_id = $arrCpm[0];
            $objects_Cpms_infos->campaign_name = $arrCpm[1];
            $objects_Cpms_infos->active = $arrCpm[2];
            $objects_Cpms_infos->user_group = $arrCpm[3];
            $objects_Cpms_infos->dial_method = $arrCpm[4];
            $objects_Cpms_infos->dial_level = $arrCpm[5];
            $objects_Cpms_infos->lead_order = $arrCpm[6];
            $objects_Cpms_infos->dial_statuses = $arrCpm[7];

            array_push($objects_Cpms , ((array) $objects_Cpms_infos));
        }
        return $objects_Cpms;
    }

    /** Show Campaign */
    public function showCampaign(){
        $getServer = $_SERVER['SERVER_NAME'];
        $cpm_list_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&function=campaigns_list&user='.Auth::user()->user.'&pass='.Auth::user()->pass;

        /** Get count campaign and count new campagn */
        $countCpm = DB::table('vicidial_campaigns')->count();
        $countNewCpm = DB::table('vicidial_campaigns')->where('dial_status_a')->count();

        $response = $this->getcurl($cpm_list_url);
        $cpm_list_response = $response[0];

        if ($response[1]['http_code'] == 200) {
            if (!str_contains($cpm_list_response, 'ERROR')) {
                if ($cpm_list_response != "[]") {
                    return view('Admin.compagne.liste-compagne', ['list_cpm' => $this->reformTheList($cpm_list_response),
                        'countCpm' => $countCpm, 'countNewCpm' => $countNewCpm ]);
                }
            }
        }

        return redirect('liste-compagne')->with('message', ["ERROR", $cpm_list_response,
            'countCpm' => $countCpm, 'countNewCpm' => $countNewCpm ]);
    }

    /** Update Campagn */
    public function updateCampagn(Request $request, $cpm_id){
        $getServer = $_SERVER['SERVER_NAME'];
        if ($request->isMethod('GET')){
            $get_this_cpm = DB::table('vicidial_campaigns')->where('campaign_id', '=', $cpm_id)->get()[0];
            //dd($get_this_cpm->campaign_id);
            return view('Admin.compagne.modifier-compagne', ['cpm_infos' => $get_this_cpm]);
        }
        /** Get fields */
        $cpms_array = $request->get('cpms_array');
        $cpm_id = $cpms_array[0];
        $cpm_name = $cpms_array[1];
        $cpm_actif = $cpms_array[2];
        $cpm_hoper_level = $cpms_array[3];
        $cpm_reset_hopper = $cpms_array[4];
        $cpm_dial_method = $cpms_array[5];

        /** @var  $update_cpm_url
         ** Generate update campagn url method
         */
        $update_cpm_url = 'https://'.$getServer.'/vicidial/non_agent_api.php?source=test&user='.Auth::user()->user.'&pass='.Auth::user()->pass.'&function=update_campaign&campaign_id='.$cpm_id.'&campaign_name='.$cpm_name.'&active='.$cpm_actif.'&hopper_level='.$cpm_hoper_level.'&reset_hopper='.$cpm_reset_hopper.'&dial_method='.$cpm_dial_method;
        //dd($update_cpm_url);
        $cpm_update_response = $this->getcurl($update_cpm_url);
        $cpm_update_status = $cpm_update_response[1]['http_code'];
        $isResponseError = str_contains($cpm_update_response[0], 'ERROR'); ##returned true or false

        $data = [];
        $data['status'] = $cpm_update_status;
        $data['message'] = $cpm_update_response;
        $data['isResponseError'] = $isResponseError;

        return response()->json($data);

        /*return redirect('liste-compagne')->with('message', ["ERROR", $cpm_update_response,
            'countCpm' => $countCpm, 'countNewCpm' => $countNewCpm ]); */
    }

    /** Delete Campagn **/
    public function deleteCampagn($cpm_id){
        $data = [];
        try {
            /** Delete this campagn from vicidial_campaigns table */
            $vicidial_campaigns = DB::table('vicidial_campaigns')->where('campaign_id', '=', $cpm_id)->limit(1);
            //if ($vicidial_campaigns->first()){
            if ($vicidial_campaigns->delete()) {
                /** DELETE this campagn FROM vicidial_campagn_agents */
                $vicidial_campaign_agents = DB::table('vicidial_campaign_agents')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaign_agents->first()) {
                $vicidial_campaign_agents->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_live_agents */
                $vicidial_campaign_statuses = DB::table('vicidial_campaign_statuses')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaign_statuses->first()) {
                $vicidial_campaign_statuses->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_campaign_hotkeys */
                $vicidial_campaign_hotkeys = DB::table('vicidial_campaign_hotkeys')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaign_hotkeys->first()) {
                $vicidial_campaign_hotkeys->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_callbacks */
                $vicidial_callbacks = DB::table('vicidial_callbacks')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_callbacks->first()) {
                $vicidial_callbacks->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_campaign_stats */
                $vicidial_campaign_stats = DB::table('vicidial_campaign_stats')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaign_stats->first()) {
                $vicidial_campaign_stats->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_campaign_stats_debug */
                $vicidial_campaign_stats_debug = DB::table('vicidial_campaign_stats_debug')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaign_stats_debug->first()) {
                $vicidial_campaign_stats_debug->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_lead_recycle */
                $vicidial_lead_recycle = DB::table('vicidial_lead_recycle')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_lead_recycle->first()) {
                $vicidial_lead_recycle->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_campaign_server_stats */
                $vicidial_campaign_server_stats = DB::table('vicidial_campaign_server_stats')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaign_server_stats->first()) {
                $vicidial_campaign_server_stats->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_server_trunks */
                $vicidial_server_trunks = DB::table('vicidial_server_trunks')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_server_trunks->first()) {
                $vicidial_server_trunks->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_pause_codes */
                $vicidial_pause_codes = DB::table('vicidial_pause_codes')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_pause_codes->first()) {
                $vicidial_pause_codes->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_campaigns_list_mix */
                $vicidial_campaigns_list_mix = DB::table('vicidial_campaigns_list_mix')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_campaigns_list_mix->first()) {
                $vicidial_campaigns_list_mix->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_xfer_presets */
                $vicidial_xfer_presets = DB::table('vicidial_xfer_presets')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_xfer_presets->first()) {
                $vicidial_xfer_presets->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_xfer_stats */
                $vicidial_xfer_stats = DB::table('vicidial_xfer_stats')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_xfer_stats->first()) {
                $vicidial_xfer_stats->delete();

                /** DELETE THIS CAMPAGN FROM vicidial_hopper */
                $vicidial_hopper = DB::table('vicidial_hopper')->where('campaign_id', '=', $cpm_id);
                //if ($vicidial_hopper->first()) {
                $vicidial_hopper->delete();

                ### LOG INSERTION Admin Log Table ###
                $stmtA="DELETE from vicidial_campaigns where campaign_id='$cpm_id' limit 1;";
                $admin_log_insert = DB::table('vicidial_admin_log')->insert(['event_date' => date('Y-m-d H:m:i'),
                    'user' => Auth::user()->user, 'ip_address' => $_SERVER['SERVER_ADDR'],
                    'event_section' => 'CAMPAIGNS', 'event_type' => 'DELETE', 'record_id' => ''.strval($cpm_id).'',
                    'event_code' => 'ADMIN DELETE CAMPAIGN', 'event_sql' => $stmtA, 'event_notes' => '']);

                if ($admin_log_insert == true) {
                    $data['message'] = "SUCCESS";
                    $data['content'] = " SUPPRESSION DES (LEADS) DE LIST HOPPER DE L'ANCIEN CAMPAIGN HOPPER (" . $cpm_id . ") \n SUPPRESSION DE LA CAMPAGNE TERMINÉE: " . $cpm_id . " ";
                    return response()->json($data);
                    //return redirect()->back()->with('message', ["SUCCESS", " SUPPRESSION DES (LEADS) DE LIST HOPPER DE L'ANCIEN CAMPAIGN HOPPER (" . $cpm_id . ") \n SUPPRESSION DE LA CAMPAGNE TERMINÉE: " . $cpm_id . " "]);
                }

            }else{
                $data['message'] = "ERROR";
                $data['content'] = " Cette campagne est n'existe pas";
                return response()->json($data);
                //return redirect()->back()->with('message', ["ERROR", " Cette campagne est n'existe pas" ]);
            }
            $data['message'] = "ERROR";
            $data['content'] = "  On peut pas supprimer cette liste, désolé ";
            return response()->json($data);
            //return redirect()->back()->with('message', ["ERROR", " On peut pas supprimer cette liste, désolé "]);
        }catch (\Exception $ex){
            $data['message'] = "ERROR";
            $data['content'] = " ".$ex->getMessage();
            return response()->json($data);
            //return redirect()->back()->with('message', ["ERROR", " ".$ex->getMessage()]);
        }

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
