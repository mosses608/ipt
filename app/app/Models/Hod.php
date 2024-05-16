<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;


class Hod extends Model implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function scopeFilter($query , array $filters){
        if($filters['search'] ?? false){
            $query->where('employee_id' , 'like' , '%' . request('search') .'%')
           ->orwhere('phone' , 'like' , '%' . request('search') .'%')
           ->orwhere('full_name' , 'like' , '%' . request('search') .'%')
            ->orwhere('college' , 'like' , '%' . request('search') . '%');
        }
    }


    protected $fillable = [
        'role',
        'full_name',
        'phone',
        'employee_id',
        'college',
        'department',
        'username',
        'password',
        'profile',
    ];

    protected $guard = 'hod';

    public static function find($id){
        $hods = self::all();

        foreach($hods as $staff){
            if($staff['id'] == $id){
                return $staff;
            }
        }
    }


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
