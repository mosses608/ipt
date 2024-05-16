<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentmessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile',
        'sender_name',
        'message',
    ];
}
