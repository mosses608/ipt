<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class Student extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static function scopeFilter($query , array $filters){
        if($filters['search'] ?? false){
            $query->where('username' , 'like' , '%' . request('search') .'%')
                   ->orwhere('supervisor' , 'like', '%' . request('search') .'%')
                   ->orwhere('programme' , 'like' , '%' . request('search') . '%')
                   ->orwhere('department' , 'like' , '%' . request('search') . '%')
                   ->orwhere('level' , 'like' , '%' .request('search') . '%');
        }
    }

    protected $fillable = [
        'full_name',
        'username',
        'programme',
        'department',
        'college',
        'year',
        'level',
        'supervisor',
        'response',
        'profile',
        'password',
    ];

    public static function single($id){
        $students=self::all();

        foreach($students as $student){
            if($student->id == $id){
                return $student;
            }
        }
    }


    public static function single_show($id){
        $students=self::all();

        foreach($students as $student){
            if($student->id == $id){
                return $student;
            }
        }
    }

    public static function view_allocations($id){
        $students=self::all();

        foreach($students as $student){
            if($student->id == $id){
                return $student;
            }
        }
    }

    public static function find_activity($id){
        $students=self::all();

        foreach($students as $student){
            if  ($student['id'] == $id){
                return $student;
            }
        }
    }

    public static function single_attendance($id){
        $students=self::all();

        foreach($students as $student){
            if($student['id'] == $id){
                return $student;
            }
        }
    }

    public static function evaluation($id){
        $students=self::all();

        foreach($students as $student){
            if($student['id'] == $id){
                return $student;
            }
        }
    }

    protected $guard = 'student';

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
