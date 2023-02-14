<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vicidial_User extends Model
{
    protected $table = "vicidial_users";
    protected $primaryKey = "user_id";
    public $guarded = [];
}
