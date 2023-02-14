<?php


namespace App\Repository;


interface InfoRepositoryInterface
{


    public function UpdateDispo($request);
    public function updateQualifContact($request);
    public function RegisternewInfoContact($request);
    public function RegisternewInfoContactPost($request);
    public function getLeadInfo($lead_id);
    public function ChangeStatus($etatAgent);

}
