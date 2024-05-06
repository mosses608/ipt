<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmdepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'department_name',
        'hod_name',
        'firm_name',
    ];
}
