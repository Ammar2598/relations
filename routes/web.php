<?php

use App\Models\Profile;
use App\Models\Users;
use App\Models\Posts;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    auth()->loginUsingId(2);
    $user = Users::where('id', auth()->user()->id)->with('profile')->first();
    dd($user->profile->fname);
});

Route::get('profile/{id}', function ($id) {
    $profile = Profile::where('id', $id)->with('user')->first();
    dd($profile->toArray());
});

Route::get('user/posts/{id}', function ($id) {
    $userposts = Users::where('id', $id)->with('posts')->first();
    dd($userposts->toArray());
});

Route::get('allposts',function(){
   $posts=Posts::get();
   foreach ($posts as $post) {
    echo $post->title.' writen by user :'.$post->user->name.'<hr>' ;
   }
});

Route::get('user/checkout',function(){
    auth()->loginUsingId(1);
    $userproduct =Users::where('id',auth()->user()->id)->with('product')->first();
    // dd($userproduct->toArray());
    echo '<h1> User is : '.$userproduct->name  .'</h1>';
    foreach($userproduct->product as $product){
    echo $product->title .' \ '.$product->price.' $ <hr>';
    }
});

Route::get('product/{id}',function($id){
   $product=Product::where('id',$id)->with('user')->first();
   dd($product->toArray());
});