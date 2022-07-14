<?php

use App\Http\Controllers\Itemcontroller;
use App\Http\Controllers\logincontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mailcontroller;

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
    return view('welcome');
});

Auth::routes();


Route::get('/tonilog', [logincontroller::class, 'getlogin'])->name('tonilog');

Route::post('/tonilog', [logincontroller::class, 'postlogin'])->name('tonilog');



Route::post('/',[Itemcontroller::class, 'getindex'])->name('help');

Route::post('/item',[Itemcontroller::class, 'addtask'])->name('item');


Route::post('/register', [mailcontroller::class,'sendmail']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//action routes
Route::post('deletet/{id}', [Itemcontroller::class,'deletetask']) ->name('deletet');
Route::post('endtaskR/{id}', [Itemcontroller::class,'endtask']) ->name('endtaskR');

Route::get('log', function(){
    if(session() -> has('users')){

        session()->pull('users');

    }
    return redirect('login');
})->name('log');