<?php

namespace App\Guards;

use Illuminate\Support\Facades\Auth;

class StudentGuard extends \Illuminate\Auth\SessionGuard
{
    public function student()
    {
        return Auth::user(); // This assumes that the currently authenticated user is a student
    }
}
