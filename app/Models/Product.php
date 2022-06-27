<?php

namespace App\Models;
use App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable=[
        'title',
        'price',
        'description'
    ];


    //many to many 
    public function user(){
        return $this->belongsToMany(Users::class,'product_user','product_id','user_id');
    }
}


