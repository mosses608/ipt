<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'firm_name',
        'student_name',
        'adm_no',
        'course',
        'department',
        'year',
        'level',
        'total_days',
        'from',
        'to',
        'field_supervisor',
        'supervisor_position',
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
