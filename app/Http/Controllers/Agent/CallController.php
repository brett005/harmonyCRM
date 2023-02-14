<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CallRepositoryInterface;
use Session;
use GuzzleHttp\Client;
USE DB;
class CallController extends Controller
{
    protected $call;

    public function __construct(CallRepositoryInterface $call)
    {
        $this->call = $call;
    }

    public function getAgentStatus()
    {
        return $this->call->getAgentStatus();
    }
    public function refreshIncall()
    {
        return $this->call->refreshIncall();
    }
    public function getChannel()
    {
        return $this->call->getChannel();
    }
    public function ChangeIncall(Request $request)
    {
        return $this->call->ChangeIncall($request);
    }
    public function getTimeIncall($lead_id)
    {
        return $this->call->getTimeIncall($lead_id);
    }
    public function hangup(Request $request)
    {
        return $this->call->hangup($request);
    }
    public function ManualDial(Request $request)
    {
        return $this->call->ManualDial($request);
    }
}
