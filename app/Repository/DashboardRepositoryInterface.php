<?php


namespace App\Repository;


interface DashboardRepositoryInterface
{
    public function index();

    public function getCallLogs();
    public function getLastCallLogs();
    public function getLenghtSec($lead_id);
    public function getChannelLive();
    public function activateWebphone();
    public function getTimeAgent();
    public function ChangePauseCode($pause_code);
    
}

