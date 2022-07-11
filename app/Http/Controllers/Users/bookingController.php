<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_cancel;
use App\Models\Room;
use App\Models\Roomtype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $rooms = Room::find($id)->where('id', $id)->first();
        return view('users.room.booking', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Room $rooms)
    {
        $request->validate([

            'intodate' => 'required',
        ], [
            'intodate.required' => 'ກະລູນາເລືອກວັນທີທີ່ທ່ານຈະເຂົ້າມາເບິ່ງຫ້ອງແຖວ.',
        ]);
        $bookings = new Booking();
        $bookings['room_id'] = $rooms->id;
        $bookings['user_id'] = Auth::user()->id;
        $bookings['booking_date'] = date(now());
        $bookings['status'] = 'on';
        if ($request->intodate < date(now())) {
            return redirect()->back()->with('error', 'ກະລຸນາເລືອກວັນທີໃຫ້ຖືກຕ້ອງ');
        }
        $bookings['into_date'] = $request->intodate;
        $bookings->save();
        return redirect(route('users.index', '#pricing-table'))->with('success', 'ທ່ານໄດ້ຈອງສຳເລັດແລ້ວ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function booking_history(Booking $booking)
    {
        $booking_cancel = Booking::where('user_id', Auth::user()->id)->where('status', 'off')->get();
        $ccbooking = count($booking_cancel);
        return view('users.room.booking_history', compact('booking_cancel', 'ccbooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Booking_cancel  $booking_cancel)
    {
        $bkcancel = new Booking_cancel();
        $cbooking = Booking::find($id)->where('id', $id)->first();
        $cbooking['status'] = 'off';
        $cbooking->update();

        $bkcancel['cancel_date'] = date(now());
        $bkcancel['booking_id'] = $cbooking->id;
        $bkcancel->save();
        return redirect(route('users.index', '#pricing-table'))->with('success', 'ທ່ານໄດ້ຍົກເລີກການຈອງສຳເລັດແລ້ວ.');
    }
    public function store_bookingcancel(Request $request, Room $rooms)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking_cancel = Booking::find($id);
        $booking_cancel->delete();
        return redirect()->back()->with('success', 'ທ່ານໄດ້ລົບປະຫວັດການຈອງສຳເລັດແລ້ວ.');
    }

    public function search(Request $request)
    {
        $request->validate([

            'query' => 'required',
        ], [
            'query.required' => 'ກະລູນາເລືອກວັນທີທີ່ທ່ານຈະເຂົ້າມາເບິ່ງຫ້ອງແຖວ.',
        ]);
        $search_rooms = $_GET['query'];
        $rooms = Room::where('name', 'LIKE', '%' . $search_rooms . '%')->where('status', 'ອອນລາຍ')->get();
        $crooms = count($rooms);
        return view('users.room.search', compact('rooms', 'crooms'));
    }
}
