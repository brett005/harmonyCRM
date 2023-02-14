<?php


namespace App\Repository;


interface AuthRepositoryInterface
{
    

    public function index();
    public function loginAgent();
    public function login($request);
    public function logout();


}
