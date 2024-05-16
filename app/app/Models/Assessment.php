<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'supervisor',
        'student_name',
        'adm_no',
        'course',
        'department',
        'year',
        'level',
        'firm_name',
        'score1',
        'score2',
        'score3',
        'score4',
        'score5',
        'score6',
        'score7',
        'score8',
        'score9',
        'score10',
    ];
}
