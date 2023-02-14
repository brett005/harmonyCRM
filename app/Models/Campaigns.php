<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    protected $table = "vicidial_campaigns";
    protected $primaryKey = 'campaign_id';
    public $guarded = [];
    //protected $fillable = ['campaign_id', 'campaign_name'];
}
