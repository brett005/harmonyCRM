<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VicidialLists extends Model
{
    protected $table = 'vicidial_lists';
    protected $primaryKey = 'list_id';
    protected $guarded = [];
    public $timestamps = false;
}
