<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnServers extends Model
{
    //use HasFactory;
    protected $table = "own_servers";
    protected $primaryKey = 'server_id';
}
