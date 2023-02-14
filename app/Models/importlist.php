<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class importlist extends Model
{
    //use HasFactory;
    protected $table = "importlist";
    protected $primaryKey = 'id';
    public $fillable = ['id', 'first_name', 'last_name', 'email'];
}
