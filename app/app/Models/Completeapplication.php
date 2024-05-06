<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Completeapplication extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $filters)
{
    if($filters['search'] ?? false){
        $query->where('firm_name' , 'like' , '%' . request('search') .'%');
    }
}    protected $fillable = [
        'reg_number',
        'gender1',
        'gender2',
        'firm_name',
        'academic_year',
        'action',
    ];

}


