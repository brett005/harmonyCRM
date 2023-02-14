<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\UnadevListExport;
use App\Exports\AgentTimeDetailExport;
use App\Exports\AgentStatExport;
use Maatwebsite\Excel\Excel;
use DB;

class StatController extends Controller
{
      //private $server = 'https://call3.callbk.tk';
    //private $SERVER = 'https://call3.harmoniecrm.com';
    private $userAdmin = '6666';
    private $passAdmin = 'Capital2023';

    private function server(){
        return "https://$_SERVER[HTTP_HOST]";
    }
    public function new_statistics(){
        $data = [];
        

        $data['campaigns'] = DB::table('vicidial_campaigns')->select('campaign_id','campaign_name','active')->where('active','Y')->get();

        $data['lists'] = DB::table('vicidial_lists')->select('list_id','list_name','campaign_id','active')->get();/*->groupBy(function($list) {
            return $list->campaign_id;
        });*/
        return view('Admin.statistics.index',$data);
        
    }
    public function new_show_stat_agents(Request $request){

        if(!$request->campaign){
            return redirect()->back()->with(['error'=>"Veuillez choisir la compagne svp !!"]);
        }

        //////////////
        //if($request->stat_agent){
            //$listids = $request->list;
            $lists = DB::table('vicidial_list')
                    //->join('vicidial_list','vicidial_log.lead_id','=','vicidial_list.lead_id')
                    //->whereIn('list_id',$listids)
                    ->where(DB::raw("(DATE_FORMAT(modify_date,'%Y-%m-%d'))"),$request->date)
                    ->orderBy('entry_date','DESC')->where('user','<>','VDAD')
                    ->get();
            $ids = $lists->pluck('user');

            $vicidial_agent_log = DB::table('vicidial_agent_log')->where(DB::raw("(DATE_FORMAT(event_time,'%Y-%m-%d'))"),$request->date)->whereIn('user',$ids)->get()->groupBy('user');

            
            $allagentInfo = [];
            //dd($vicidial_agent_log);
            $totalAppels = 0;
            $totalSale = 0;
            $totalCu = 0;
            $totalAttente = 0;
            $totalTraitement = 0;
            $totalProduction = 0;
            foreach($vicidial_agent_log as $user){
                $agentDC = [];
                $agentDMC = [];
                $agentDT = [];
                $agentDAT = [];
                $agentDPROD = [];
                $agentSale = [];
                $agentCU = [];
                $sale = ['SALE'];
                $waitSec = 0;
                $talkSec = 0;
                $pauseSec = 0;
                $dispoSec = 0;
                $deadSec = 0;
                $nbrAppels = 0;
                

                //dd($user);
                $wait = 0;
                $talk = 0;
                $prod = 0;
                $dispo = 0;
                $saleCall = 0;
                $cu = 0;
                foreach($user as $key => $agent){
                    //$nbrAppels++;
                    if($agent->status=="SALE"){
                        $saleCall++;
                    }
                    if($agent->talk_sec>0){
                        $nbrAppels++;
                    }
                    $wait+=$agent->wait_sec;
                    $talk+=$agent->talk_sec+$agent->dead_sec;
                    //$prod=$waitSec+$talkSec+$dispoSec;
                    $prod+=$agent->talk_sec+$agent->dispo_sec+$agent->wait_sec;
                    $dispo+=$agent->dispo_sec;
                    if($agent->talk_sec>175){
                        $cu++;
                    }
                }
                $agentInfo['Agent'] = $user[0]->user;
                $vicidial_user = DB::table('vicidial_users')->select('full_name')->where('user',$user[0]->user)->first();

                $agentInfo['Full_name'] = $vicidial_user->full_name;
                $agentInfo['Datente'] = $wait; ///calculer le temps d'attente (status = ready)
                $totalAttente+= $agentInfo['Datente'];
                //array_push($agentDAT,$agentInfo['Datente']);

                $agentInfo['DTraitement'] = $dispo; /// duree de traitement (status = dispo)
                $totalTraitement+= $agentInfo['DTraitement'];
                //array_push($agentDT,$agentInfo['DTraitement']);
                $agentInfo['Dproduction'] = $prod; /// duree de production (status = ready or dispo or incall)
                //array_push($agentDPROD,$agentInfo['Dproduction']);
                $totalProduction+= $agentInfo['Dproduction'];

                $agentInfo['appels'] = $nbrAppels;
                $totalAppels = $totalAppels + $agentInfo['appels'];
                $agentInfo['Sale'] = $saleCall; /// nbr fiches qualifier positivement (don, promesse..)
                $totalSale = $totalSale + $agentInfo['Sale'];
                //array_push($agentSale,$totalSale);

                $agentInfo['CU'] = $cu;
                $totalCu = $totalCu + $agentInfo['CU'];
                //array_push($agentCU,$totalCu);


                array_push($allagentInfo,$agentInfo);
            }
            //dd($allagentInfo);
            $totalAgentInfo = [];

            $totalAgentInfo['Dat'] = $totalAttente; ///calculer le temps d'attente (status = ready)

            $totalAgentInfo['Dt'] = $totalTraitement; /// duree de traitement (status = dispo)
            
            $totalAgentInfo['Dprod'] = $totalProduction; /// duree de production (status = ready on dispo or incall)
            $totalAgentInfo['appels'] = $totalAppels;  //// nbr de appeles
            $totalAgentInfo['Sale'] = $totalSale;  //// nbr de appeles
            $totalAgentInfo['CU'] = $totalCu;  //// nbr de appeles
            $data['totalAgentInfo'] = $totalAgentInfo;
            $data['agents'] = $allagentInfo;
            $data['etat'] = 200;
            //dd($data);
            return response()->json($data);
           
    }
    public function ExportList(Request $request){
       
        if(!$request->list){
            return redirect()->back()->with(['error'=>"Veuillez choisir les lists svp !!"]);
        }

        $listids = $request->list;
        if($request->date){
                $lists = DB::table('vicidial_list')
                //->join('vicidial_list','vicidial_log.lead_id','=','vicidial_list.lead_id')
                ->whereIn('list_id',$listids)
                ->where(DB::raw("(DATE_FORMAT(modify_date,'%Y-%m-%d'))"),$request->date)
                ->orderBy('entry_date','DESC')
                ->get();
        }else{
            $lists = DB::table('vicidial_list')
                //->join('vicidial_list','vicidial_log.lead_id','=','vicidial_list.lead_id')
                ->whereIn('list_id',$listids)
                ->orderBy('entry_date','DESC')
                ->get();
        }
        
        if(count($lists)<1){
            return redirect()->back()->with(['error'=>'Aucun contact existe avec cette date !!']);
        }

            foreach ($lists as $list) {
                if($list->user == '' || $list->user == 'VDAD'){
                    $userr = '';
                }else{
                    $userr = $list->user;
                }
                 if(property_exists($list,'call_date')){
                    if($list->call_date == "0000-00-00 00:00:00"){
                        $call_date = '';
                    }else{
                        $call_date = date("Ymd", strtotime($list->call_date));
                    }
                }else{
                    if($list->modify_date == "0000-00-00 00:00:00"){
                        $call_date = '';
                    }else{
                        $call_date = date("Ymd", strtotime($list->modify_date));
                    }
                }
                $date1 = date("Ymd", strtotime($list->entry_date));
                
                $recording = DB::table('recording_log')->where('lead_id',$list->lead_id)->first();
      
                $data[] = [
                  'entry_date'=> $list->entry_date == "0000-00-00 00:00:00" ? '' : $date1,
                  'call_date'=> $call_date,
                  'phone_number'=> $list->phone_number,
                  'status'=> $this->Status($list->status),
                  'duree'=> $recording == null ? '' : $recording->length_in_sec,
                  'agent'=> $userr,
                  'first_name'=> $list->first_name,
                  'last_name'=> $list->last_name,
                  'alt_phone'=> $list->alt_phone,
                  'address1'=> $list->address1,
                  'postal_code'=> $list->postal_code,
                  'city'=> $list->city,
                  'comments'=> $list->comments,
                ];
             }
        return (new UnadevListExport($data))->download('export_'.date('Ymd_his').'.xlsx');
    }
    function Status($status){
        if($status == 'NEW'){
             return $status = '';
        }elseif($status == 'DNC'){
            return $status = 'DO NOT CALL';
        }elseif($status == 'DROP'){
            return $status = 'Agent Not Available';
        }elseif($status == 'XDROP'){
            return $status = 'Agent Not Available IN';
        }elseif($status == 'NA'){
            return $status = 'No Answer AutoDial';
        }
        elseif($status == 'CALLBK'){
            return $status = 'Call Back';
        }elseif($status == 'A'){
            return $status = 'Answering Machine';
        }elseif($status == 'AA'){
            return $status = 'Answering Machine Auto';
        }elseif($status == 'SALE'){
            return $status = 'Sale Made';
        }elseif($status == 'NonINT'){
            return $status = 'Non interesser';
        }elseif($status == 'NPA'){
            return $status = 'NE PAS Appeller ';
        }elseif($status == 'AB'){
            return $status = 'Busy Auto';
        }
        elseif($status == 'DC'){
            return $status = 'Disconnected Number';
        }elseif($status == 'ADC'){
            return $status = 'Disconnected Number Auto';
        }elseif($status == 'ADCT'){
            return $status = 'Disconnected Number Temporary';
        }elseif($status == 'AFAX'){
            return $status = 'Fax Machine Auto';
        }elseif($status == 'AFTHRS'){
            return $status = 'Inbound After Hours Drop';
        }elseif($status == 'NI'){
            return $status = 'Not Interested';
        }elseif($status == 'CBHOLD'){
            return $status = 'Call Back Hold';
        }elseif($status == 'DEC'){
            return $status = 'Declined Sale';
        }elseif($status == 'IQNANQ'){
            return $status = 'InQueue No-Agent-No-Queue drop';
        }elseif($status == 'IVRXFR'){
            return $status = 'Outbound drop to Call Menu';
        }elseif($status == 'LRERR'){
            return $status = 'Outbound Local Channel Res Err';
        }elseif($status == 'MAXCAL'){
            return $status = 'Inbound Max Calls Drop';
        }elseif($status == 'MLINAT'){
            return $status = 'Multi-Lead auto-alt set inactv';
        }elseif($status == 'NANQUE'){
            return $status = 'Inbound No Agent No Queue Drop';
        }elseif($status == 'NP'){
            return $status = 'No Pitch No Price';
        }elseif($status == 'PDROP'){
            return $status = 'Outbound Pre-Routing Drop';
        }elseif($status == 'RQXFER'){
            return $status = 'Re-Queue';
        }elseif($status == 'SVYCLM'){
            return $status = 'Survey sent to Call Menu';
        }elseif($status == 'XFER'){
            return $status = 'Call Transferred';
        }elseif($status == 'DNCC'){
            return $status = 'DO NOT CALL Hopper Camp Match';
        }else{
            return $status = 'injoignable';
        }
    }

    function TotalTime($agentTime){
        //dd($agentTime);
        $timeTotal = 0;
        foreach ($agentTime as $key => $time) {
            //if($key == 1){
            $timeTable = explode(':',$time);
            $time = ($timeTable[0]*3600)+($timeTable[1]*60)+$timeTable[2];
            
            $timeTotal = $timeTotal + $time;
            //}
        }
        if($timeTotal < 3600){ 
            $heures = 0; 
            
            if($timeTotal < 60){$minutes = 0;} 
            else{$minutes = floor($timeTotal / 60);} 
            
            $secondes = floor($timeTotal % 60); 
            } 
            else{ 
            $heures = floor($timeTotal / 3600); 
            $secondes = floor($timeTotal % 3600); 
            $minutes = floor($secondes / 60); 
            } 
            
            $secondes2 = floor($secondes % 60); 
            if($heures<10){$heures = '0'.$heures;}
            if($minutes<10){$minutes = '0'.$minutes;}
            if($secondes2<10){$secondes2 = '0'.$secondes2;}
            $TimeFinal = $heures.':'.$minutes.':'.$secondes2; 
            return $TimeFinal;
        //dd($TimeFinal);
    }

}
