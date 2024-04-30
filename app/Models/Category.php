<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'image'
    ];

    public function scopeSearch($query,$value){
        $query->where('name','like',"%{$value}%");
    }
}
