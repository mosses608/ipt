<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'reg_number',
        'full_name',
        'programme',
        'department',
        'year',
        'level',
        'present',
        'absent',
    ];
}
