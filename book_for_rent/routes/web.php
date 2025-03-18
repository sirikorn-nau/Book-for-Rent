<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\LessorController;
use App\Http\Controllers\UserController;


// ! สำหรับ Uer
Route::get('/' , [UserController::class,'index']);
Route::get('/detailBook/{id}' , [UserController::class,'detailBook']);



// ! สำหรับ Lessor
// ใช้ Controller แล้วลบ Callback Function
// Route::get('/home' , [LessorController::class,'home'])->name('home');
Route::get('/about' , [LessorController::class,'about'])->name('about');
Route::get('/create' , [LessorController::class,'create']);
Route::post('/insert' , [LessorController::class,'insert']);
Route::get('/delete/{id}' , [LessorController::class,'delete'])->name('delete');
Route::get('/edit/{id}' , [LessorController::class,'edit'])->name('edit');
Route::post('/update/{id}' , [LessorController::class,'update'])->name('update');





// ต้อง Log in ถึงจะเข้าได้
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');








// Route::get('/', function () {
//     return "<a href='".route('users')."'>Login</a>";
// });

Route::get('/blog/{name}', function ($name) {
    return "<h1>บทความชื่อ ${name} </h1>";
});

Route::get('admin/users/fallback', function () {
    return "<h1> Hi users </h1>";
})->name('users');
// ->name('') เป็นการตั้งชื่อ route , วิธีเรียกใช้ = ".route('users')."


// กรณี route ไม่มีอยู่ใน Project จะให้เกิดการทำงานยังไง เรียกว่า "Route Fallback"
Route::fallback(function(){
    return "<h1>ไม่พบหน้าเว็บ</h1>";
});


