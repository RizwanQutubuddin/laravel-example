<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users/{name?}',function($name=null){
    return 'Hi '.$name;
});

Route::get('/users/{id?}',function($id=null){
    return 'user id '.$id;
});

Route::match(['get','post'],'/students',function(Request $request){
    return 'Requested method is '.$request->method();
});

Route::any('/posts',function(Request $request){
    return 'Requested method is '.$request->method();
});


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

//group middleware
Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::get('/students',[StudentAPIController::class,'index']);
    Route::get('/student/{id}',[StudentAPIController::class,'show']);
    Route::post('/student',[StudentAPIController::class,'store']);
    Route::put('/student/{id}',[StudentAPIController::class,'update']);
    Route::delete('/student/{id}',[StudentAPIController::class,'destroy']);
    Route::get('/students-search',[StudentAPIController::class,'search']);
    Route::post('/upload-file',[StudentAPIController::class,'uploadFile']);

    //or instead of all above api we can use single API which mention below.
    Route::apiResource('/student-resource',StudentAPIController::class);
    
    Route::post('/logout',[AuthController::class,'logout']);

});

