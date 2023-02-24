<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClientConroller;
use App\Http\Controllers\FluentConroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PaginationController;
use App\Http\Controllers\PostConroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionConroller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentGatewayController;
use Illuminate\Support\Facades\Route;
use Ixudra\Curl\Facades\Curl;
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
//     return view('welcome');
// });
Route::get('/',[ProductController::class,'index'])->name('product.index');
Route::get('/home/{name?}',[HomeController::class,'index'])->name('home.index');
Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/url',[UserController::class,'index2'])->name('user.index2');

//http client
Route::get('/posts',[ClientConroller::class,'getAllPost'])->name('posts.getallpost');
Route::get('/posts/{id?}',[ClientConroller::class,'getPostById'])->name('posts.getallpost');
Route::get('/add-post',[ClientConroller::class,'addPost'])->name('posts.add');
Route::get('/update-post',[ClientConroller::class,'updatePost'])->name('posts.update');
Route::get('/delete-post/{id}',[ClientConroller::class,'deletePost'])->name('posts.delete');

//string function
Route::get('/string',[FluentConroller::class,'index'])->name('string.index');

//server side validation
Route::get('/login',[LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'loginSubmit'])->name('login.loginSubmit');

//session
Route::get('/session/get',[SessionConroller::class,'getSessionData'])->name('session.get');
Route::get('/session/set',[SessionConroller::class,'storeSessionData'])->name('session.store');
Route::get('/session/remove',[SessionConroller::class,'deleteSessionData'])->name('session.delete');

//crud with query builder
Route::get('/posts',[PostConroller::class,'getAllPosts'])->name('posts.allpost');
Route::get('/posts/add',[PostConroller::class,'addPost'])->name('posts.add');
Route::post('/posts/add',[PostConroller::class,'addPostSubmit'])->name('posts.addSubmit');
Route::get('/posts/{id?}',[PostConroller::class,'getPostById'])->name('posts.getById');
Route::post('/posts/{id?}',[PostConroller::class,'getUpdateById'])->name('posts.updateById');
Route::get('/posts-delete/{id?}',[PostConroller::class,'getDeleteById'])->name('posts.deletedById');
Route::get('/all-post',[PostConroller::class,'getAllPostsUsingModel'])->name('post.getallpost');

//join
Route::get('/inner-join',[PostConroller::class,'innerjoinCaluse'])->name('innerjoin');
Route::get('/left-join',[PostConroller::class,'leftjoinCaluse'])->name('leftjoin');
Route::get('/right-join',[PostConroller::class,'rightjoinCaluse'])->name('rightjoin');

//pagintion
Route::get('/pagination',[PaginationController::class,'pagination'])->name('pagination');

//upload file
Route::get('/upload',[UploadController::class,'uploadForm']);
Route::post('/upload',[UploadController::class,'uploadFile'])->name('upload.uploadFile');

//sending mail
Route::get('/send-mail',[MailController::class,'sendMail'])->name('emails.TestMail');

//crud operation with ajax
Route::get('/students-list',[StudentController::class,'fetchStudents'])->name('students.all');
Route::post('/student-add',[StudentController::class,'addStudent'])->name('student.add');
Route::get('/get-student/{id}',[StudentController::class,'getStudentById'])->name('getStudentById');
Route::put('/update-student',[StudentController::class,'updateStudentById'])->name('updateStudentById');
Route::delete('/student/{id}',[StudentController::class,'deleteStudentById'])->name('deleteStudentById');
Route::delete('/selected-students',[StudentController::class,'deleteCheckBoxStudents'])->name('deleteSelectedStudent');
//Infinite Scroll Pagination 
Route::get('/student-infinite-scroll',[StudentController::class,'index'])->name('student.infiniteScroll');

//High Charts
Route::get('/high-charts',[ChartController::class,'index'])->name('highcharts.index');


//client side validation
Route::get('/register',[AuthController::class,'index'])->name('register.index');

//convert number to words
Route::get('/test',function(){
    return view('test');
});

Route::get('/index',function(){
    return view('index');
});
Route::get('/about',function(){
    return view('about');
});
Route::get('/contact',function(){
    return view('contact');
});

/* curl 
    reference from "https://github.com/ixudra/curl/blob/master/README.md"
    1.open rerminal type "composer requre ixudra/curl" press enter
    2.open config/app.php
        'providers' => array(
            //...
            Ixudra\Curl\CurlServiceProvider::class, //<== enter this line
        ),
        'aliases' => array(
            //...
            'Curl' => Ixudra\Curl\Facades\Curl::class, //<== enter this line
        ),
    3.use Ixudra\Curl\Facades\Curl;  //type top this file    
*/
Route::get('/curl', function () {
    $response = Curl::to('https://www.google.com/')->get();
    dd($response);
});

/*Payment Gateway*/
Route::get('/payment', [PaymentGatewayController::class, 'createPayment'])->name('payment.create');
Route::post('/payment/store', [PaymentGatewayController::class, 'payment'])->name('payment.store');
Route::post('/payment/callback', [PaymentGatewayController::class, 'callback'])->name('payment.callback');
