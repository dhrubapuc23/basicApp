<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}/{name?}', function (string $id, string $name = null) {
    // return 'User Page - ID: ' . $id. ' - Name: ' . $name;
    return view('user', ['id'=>$id, 'name'=>$name]);
})->whereAlpha('name')->whereNumber('id');

// Route::view('/','welcome');

// Route::get('/home', function () {
//     return view('homepage');
// });

Route::get('/home', [UserController::class, 'index']);

Route::prefix('greeting')->group(function () {
        Route::get('/about', function () {
        return 'Greeting Page';
    })->name('gt');
    Route::get('/name', function () {
        return 'Greeting Page - Name';
    })->name('gtn');
    Route::get('/address', function () {
        return 'Greeting Page - Address';
    })->name('gta');
});

Route::view('/master','master');
Route::view('/feature1','feature1');
Route::view('/feature2','feature2');
Route::get('student',[StudentController::class, 'index']);

//Route::resource('student', ResourceController::class);
