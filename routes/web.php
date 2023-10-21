<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Main page

Route::get('/', 'HomeController@index')->name('/');
Route::get('/', 'BookingController@index')->name('home');


//Rooms

Route::resource('rooms', 'RoomsController');



//Bookings

Route::resource('bookings', 'BookingController');
Route::post('get_data_room', 'BookingController@get_data_room')->name('bookings.get_data_room');
Route::post('get_available', 'BookingController@get_available')->name('bookings.get_available');
