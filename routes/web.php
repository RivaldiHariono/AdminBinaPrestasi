<?php

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
Route::match(["GET","POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::get('/users/inactive','UserController@inactive')->name('users.inactive');
Route::resource("users","UserController");

// Students
Route::get('/students/inactive','StudentController@inactive')->name('students.inactive');
Route::resource("students","StudentController");

// Teachers
Route::get('/teachers/inactive','TeacherController@inactive')->name('teachers.inactive');
Route::resource("teachers","TeacherController");