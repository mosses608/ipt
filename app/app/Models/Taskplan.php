<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskplan extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_day',
        'task',
        'tools',
        'supervisor',
        'company',
    ];
}
