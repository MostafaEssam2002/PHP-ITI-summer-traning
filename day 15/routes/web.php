<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::get('/students',[StudentController::class,'index'])->name('students.index');

// Route::get('/students/update/{id}',[StudentController::class,'update'])->name('students.update');
// Route::put('/students/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('students.edit');

// تحديث بيانات الطالب
Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');

Route::get('/students/{id}',[StudentController::class,'show'])->name('students.show');

Route::delete('/students/{id}',[StudentController::class,'destroy'])->name('students.destroy');
// show form
Route::get('/studets/create',[StudentController::class,'create'])->name('students.create');
Route::post('students/store',[StudentController::class,'store'])->name('students.store');
// عرض صفحة التعديل


Route::resource('tracks',TrackController::class);
// courses
Route::resource('courses', CourseController::class);


