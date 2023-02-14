<?php

namespace App\Http\Controllers\Admin;

use DB;

class HomeController extends Controller
{
    private $serverbk = 'https://call3.harmoniecrm.com/harmony/index.php';
    public function index(){
        $data = [];

        $campaigns = DB::table('vicidial_campaigns')->get();
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
    public function loginAdmin(){
        return view('Admin.auth.login');
    }
    public function loginAgent(){
        $campaigns = DB::table('vicidial_campaigns')->get();
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
}
