<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\admincontroller;

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

// Route::get('/', function () {
//     return view('admin.layout');
// });
route::get('admin',[admincontroller::class,'login']);
route::post('login_post',[admincontroller::class,'login_post']);
route::get('logout',[admincontroller::class,'logout']);

route::group(['middleware'=>'admin_auth'],function(){
    route::get('/',[admincontroller::class,'dashboard']);

});
