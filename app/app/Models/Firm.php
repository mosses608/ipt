<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $filters){
        if($filters['search'] ?? false){
            $query->where('firm_name' , 'like' , '%' .request('search') .'%');
        }
    }
    protected $fillable = [
        'firm_name',
        'location',
        'address',
        'firm_type',
        'serives',
    ];

}
