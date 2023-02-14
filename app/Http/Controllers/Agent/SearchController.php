<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\SearchRepositoryInterface;
use Session;
use GuzzleHttp\Client;
USE DB;
class SearchController extends Controller
{
    protected $search;

    public function __construct(SearchRepositoryInterface $search)
    {
        $this->search = $search;
    }

    public function SearchLead(Request $request)
    {
        return $this->search->SearchLead($request);
    }
    public function searchCalls(Request $request)
    {
        return $this->search->searchCalls($request);
    }
}
