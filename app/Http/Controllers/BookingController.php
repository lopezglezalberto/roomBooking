<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Mail\NotificationClient;
use App\Mail\NotificationHotel;
use App\Models\Booking;
use App\Models\Rooms;
use App\Repositories\BookingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class BookingController extends AppBaseController
{
    /** @var  BookingRepository */
    private $bookingRepository;

    public function __construct()
    {
       //
    }

    /**
     * Display a listing of the Booking.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rooms = Rooms::whereNotExists(
            function ($query) {
                $query->select(DB::raw(1))
                    ->from('bookings')
                    ->whereRaw('bookings.rooms_id = rooms.id');
            })->get();

        return view('bookings.create', compact('rooms'));
    }


    public function get_available(Request $request){

        $input = request()->all();

        $rules = array(

            'arrival_date' => 'required',
            'departure_date' => 'required|verification_date:'. $input['arrival_date'],
        );

        $messages = array(

            'arrival_date.required' => 'This field is required',
            'departure_date.required' => 'This field is required',
            'departure_date.verification_date' => 'It cannot be longer than the arrival date',
        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $rooms = Rooms::whereNotExists(
                                function ($query) {
                                    $query->select(DB::raw(1))
                                        ->from('bookings')
                                        ->whereRaw('bookings.rooms_id = rooms.id');
                                })->get();

            $success = [
                'title' => 'Success',
                'message' => 'Successful search'
            ];


            return response()->json(['success' => $success]);
        }

        return response()->json([
            'success' => false,
            'errors' => $validator->getMessageBag()->toArray(),
        ]);
    }

    public function get_data_room(Request $request){

        $input = request()->all();

        $rules = array(

            'id_room' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required|verification_date:'. $input['arrival_date'],
        );

        $messages = array(

            'id_room.required' => 'This field is required',
            'id_room.validate_calculate_price' => 'Dates are required',
            'arrival_date.required' => 'This field is required',
            'departure_date.required' => 'This field is required',
            'departure_date.verification_date' => 'The departure date cannot be equal to or prior to the arrival date.',

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $toDate = Carbon::parse($input['departure_date']);
            $fromDate = Carbon::parse($input['arrival_date']);

            $days_diference = $toDate->diffInDays($fromDate);

            $total_amount = 0;

            if($input['id_room']){
                $room = Rooms::find($input['id_room']);

                $total_amount = $days_diference * $room->price_per_nigth;
            }

            $details = [
                'short_description' => $room->short_description,
                'price_per_nigth' => $room->price_per_nigth,
                'days' => $days_diference. ' Noches',
                'total_amount' => $total_amount
            ];


            return response()->json(['details' => $details]);
        }
        return response()->json([
            'success' => false,
            'errors' => $validator->getMessageBag()->toArray(),
        ]);
    }

    /**
     * Store a newly created Booking in storage.
     *
     * @param CreateBookingRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = request()->all();

        $rules = array(

            'arrival_date' => 'required',
            'departure_date' => 'required|verification_date:'. $input['arrival_date'],
            'id_room' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        );

        $messages = array(

            'arrival_date.required' => 'This field is required',
            'departure_date.required' => 'This field is required',
            'departure_date.verification_date' => 'The departure date cannot be equal to or prior to the arrival date.',
            'id_room.required' => 'This field is required',
            'full_name.required' => 'This field is required',
            'email.required' => 'This field is required',
            'email.email' => 'Email format required',
            'phone.required' => 'This field is required',

        );

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->passes()) {

            $room = Rooms::find($input['id_room']);

            $toDate = Carbon::parse($input['departure_date']);
            $fromDate = Carbon::parse($input['arrival_date']);

            $days_diference = $toDate->diffInDays($fromDate);

            $total_amount = 0;

            if($input['id_room']){
                $room = Rooms::find($input['id_room']);

                $total_amount = $days_diference * $room->price_per_nigth;
            }

            $booking = new Booking();
            $booking->rooms_id = $input['id_room'];
            $booking->full_name = $input['full_name'];
            $booking->arrival_date = $input['arrival_date'];
            $booking->departure_date = $input['departure_date'];
            $booking->reserved = 1;
            $booking->amount = $total_amount;
            $booking->email = $input['email'];
            $booking->phone = $input['phone'];
            $booking->note = $input['note'];
            $booking->save();

            $message = [

                'type' => 'client',
                'full_name' => $input['full_name'],
                'departure_date' => $input['departure_date'],
                'arrival_date' => $input['arrival_date'],
                'room' => $room->name,
                'amount' => $total_amount
            ];


            try {
                \Illuminate\Support\Facades\Mail::to($input['email'])->queue(new NotificationClient($message));
                \Illuminate\Support\Facades\Mail::to('bookingshotel@gmail.com')->queue(new NotificationHotel($message));

                return 1;

            } catch (\Exception $e) {
                return 0;
            }


            \Cache::flush();
            \Cache::put('message', '<b style="color: black">Se ha registrado la recepcici&oacute;n del Banco de Sangre:  satisfactoriamente.</b>', 20);
            \Cache::put('title', '<b style="color: black">Operaci&oacute;n realizada</b>', 20);
            \Cache::put('type', 'success', 20);

            return response()->json(['days' => 1]);
        }

        return response()->json([
            'success' => false,
            'errors' => $validator->getMessageBag()->toArray(),
        ]);
    }

    /**
     * Display the specified Booking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified Booking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified Booking in storage.
     *
     * @param int $id
     * @param UpdateBookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBookingRequest $request)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $booking = $this->bookingRepository->update($request->all(), $id);

        Flash::success('Booking updated successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified Booking from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $this->bookingRepository->delete($id);

        Flash::success('Booking deleted successfully.');

        return redirect(route('bookings.index'));
    }
}
