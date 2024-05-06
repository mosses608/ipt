<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'firm_name',
        'vacancy_number',
        'maleValue',
        'femaleValue',
        'department',
    ];
}
