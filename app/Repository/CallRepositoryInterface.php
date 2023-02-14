<?php


namespace App\Repository;


interface CallRepositoryInterface
{


    public function getAgentStatus();
    public function refreshIncall();
    public function getChannel();
    public function ChangeIncall($request);
    public function getTimeIncall($lead_id);
    public function hangup($request);
    public function ManualDial($request);

}
