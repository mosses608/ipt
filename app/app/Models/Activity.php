<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'reg_number',
        //'submit_date',
        'submit_day',
        'nu_activities',
        'task01',
        'task21',
        'task22',
        'task31',
        'task32',
        'task33',
        'task41',
        'task42',
        'task43',
        'task44',
        'attachment',
    ];
}
