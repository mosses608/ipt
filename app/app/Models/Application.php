<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'reg_no',
        'academic_year',
        'firm_name',
        'firm_location',
        'gender1',
        'gender2',
        'action'
    ];
}
