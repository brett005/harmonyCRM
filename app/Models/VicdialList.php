<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VicdialList extends Model
{
    //use HasFactory;
    protected $table = 'vicidial_list';
    protected $primaryKey = 'lead_id';
    //$table->string('first_name',50);
    //public $fillable = ['first_name', 'second_name', 'address'];
    protected $guarded = [];
    public $timestamps = false;
}
