<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fieldvaccancy extends Model
{
    use HasFactory;
    protected $fillable = [
        'college',
        'vaccany_number',
    ];
}
