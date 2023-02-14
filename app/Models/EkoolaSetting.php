<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkoolaSetting extends Model
{
    //use HasFactory;
    protected $table = "ekoola_setting";
    protected $primaryKey = "id_ekoolasetting";
    protected $fillable = ['server_id', 'list_name', 'time_refresh', 'selected'];
    public $timestamps = false;

}
