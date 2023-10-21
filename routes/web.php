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


Route::get('/fecha', function () {

    $rooms_no_avaible = \App\Models\Booking::whereDate('departure_date','>=' , '2023-10-21')
                                            ->whereDate('arrival_date','<=', '2023-10-28')->get();





    $rooms = \App\Models\Rooms::whereNotExists(
                        function ($query) {
                            $query->select(DB::raw(1))
                                ->from('bookings')
                                ->whereRaw('bookings.rooms_id = rooms.id')
                                ->whereDate('bookings.departure_date','>=' , '2023-10-21')
                                ->whereDate('bookings.arrival_date','<=', '2023-10-28');
                        })->get();

    return $rooms;

})->name('fecha');

