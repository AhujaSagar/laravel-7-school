<?php

use Illuminate\Support\Facades\Route;
use App\schoolInfo;

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

Route::resource('school', 'SchoolController');
Route::resource('course', 'CoursesController');
Route::resource('courses_offered', 'CoursesOfferedController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/search',function(){
    $q = Request::get ( 'q' );
    $school = schoolInfo::where('name','LIKE','%'.$q.'%')->get();
    if(count($school) > 0)
        return view('school.index')->withDetails($school)->withQuery ( $q );
    else return view ('school.index')->withMessage('No Details found. Try to search again !');
});
