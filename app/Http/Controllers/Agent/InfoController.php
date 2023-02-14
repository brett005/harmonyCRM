<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\InfoRepositoryInterface;
use Session;
use GuzzleHttp\Client;
USE DB;

class InfoController extends Controller
{
    protected $info;

    public function __construct(InfoRepositoryInterface $info)
    {
        $this->info = $info;
    }

    public function UpdateDispo(Request $request)
    {
        return $this->info->UpdateDispo($request);
    }
    public function updateQualifContact(Request $request)
    {
        return $this->info->updateQualifContact($request);
    }
    public function getLeadInfo($lead_id)
    {
        return $this->info->getLeadInfo($lead_id);
    }
    public function RegisternewInfoContact(Request $request)
    {
        return $this->info->RegisternewInfoContact($request);
    }
    public function RegisternewInfoContactPost(Request $request)
    {
        return $this->info->RegisternewInfoContactPost($request);
    }
    public function ChangeStatus($etatAgent)
    {
        return $this->info->ChangeStatus($etatAgent);
    }
}
