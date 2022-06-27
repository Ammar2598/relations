<?php

namespace App\Models;

use App\Models\Profile;
use App\Models\Posts;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = "users";

    //one to one
    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }


    //one to many
    public function posts()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }

    //many to many
    public function product(){
        return $this->belongsToMany(Product::class,'product_user','user_id','product_id');
    }
}
