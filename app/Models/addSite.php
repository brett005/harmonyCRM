<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addSite extends Model
{
    //use HasFactory;
    protected $table = "ower_sites";
    protected $primaryKey = "id_sites";
    protected $fillable = ['id_sites', 'site_owner', 'site_name', 'link_site'];
    public $timestamps = true;
}
