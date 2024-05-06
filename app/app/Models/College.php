<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;

    public function scopeFilter($query , array $filters){
        if($filters['search'] ?? false){
            $query->where('college_name' , 'like' , '%' . request('search') . '%');
        }
    }

    protected $fillable=[
        'college_name',
        'college_location',
        'level',
        'programme_numbers',
        'single_program',
        'program1',
        'program2',
        'program31',
        'program32',
        'program33',
        'program41',
        'program42',
        'program43',
        'program44',
        'program51',
        'program52',
        'program53',
        'program54',
        'program55',
        'program61',
        'program62',
        'program63',
        'program64',
        'program65',
        'program66',
        'program71',
        'program72',
        'program73',
        'program74',
        'program75',
        'program76',
        'program77',
    ];

    public static function find($id){
        $colleges=self::all();

        foreach($colleges as $college){
            if($college->id==$id){
                return $college;
            }
        }
    }
}
