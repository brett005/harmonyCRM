<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repository\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Session;
use GuzzleHttp\Client;
use DB;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(AuthRepositoryInterface $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        return $this->auth->index();
    }

    public function loginAgent()
    {
        return $this->auth->loginAgent();
    }

    public function login(Request $request)
    {
        return $this->auth->login($request);
    }
    public function logout()
    {
        return $this->auth->logout();
    }
}
