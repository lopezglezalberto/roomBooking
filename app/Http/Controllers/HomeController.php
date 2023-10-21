<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use Illuminate\Http\Request;

use Flash;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    protected $session;


    public function __construct()
    {
       //
    }

    public function index()
    {

        $rooms = Rooms::whereNotExists(
                                        function ($query) {
                                            $query->select(DB::raw(1))
                                                ->from('bookings')
                                                ->whereRaw('bookings.rooms_id = rooms.id');
                                        })->get();

        return view('home', compact('rooms'));

    }





}
