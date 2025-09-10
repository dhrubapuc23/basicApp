<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
//use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\StudentMiddleware;

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
Route::get('student/course',[StudentController::class, 'getcourse']);
Route::get('student/create',[StudentController::class, 'create'])->name('student.create');
Route::post('student/store',[StudentController::class, 'store'])->name('student.store');
Route::get('student/show',[StudentController::class, 'showData'])->name('student.show');
Route::get('student/edit/{id}',[StudentController::class, 'EditData'])->name('student.edit');
Route::post('student/update/{id}',[StudentController::class, 'UpdateData'])->name('student.update');
Route::get('student/delete/{id}',[StudentController::class, 'DeleteData'])->name('student.delete');
Route::get('file-upload',[StudentController::class, 'uploadFile'])->name('student.file.upload');
Route::post('file-upload',[StudentController::class, 'uploadFileStore'])->name('student.file.store');
Route::get('user-info',[StudentController::class, 'userinfo'])->name('user.info');
Route::post('user-submit',[StudentController::class, 'storeUserInfo'])->name('user.submit')->middleware(StudentMiddleware::class);

//Route::resource('student', ResourceController::class);
