<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'uId',
        'name',
        'description',
        'price',
        'image'
];
public function User(){
    return $this->belongsTo(User::class,'uId','id');
}

}
