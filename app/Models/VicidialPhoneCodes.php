<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VicidialPhoneCodes extends Model
{
    protected $table = 'vicidial_phone_codes';
    public $fillable = ['country_code', 'country'];
    protected $guarded = [];
}
