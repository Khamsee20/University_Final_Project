<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Member;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $userss = User::where('id', '>', 1)->get();
        $c_user = count($userss);
        $members = Member::all();
        $c_member = count($members);
        $rooms = Room::all();
        $c_room = count($rooms);
        $comments = Comment::all();
        $c_comment = count($comments);
        return view('admin.index', compact('c_user', 'c_member', 'c_room', 'c_comment'));
    }

    public function memberHome()
    {
        $mem = Member::where('user_id', Auth::user()->id)->first();
        $roomget = Room::where('member_id', $mem->id)->get();
        $roomonline = Room::where('member_id', $mem->id)->where('status', 'ອອນລາຍ')->get();
        $roomoffline = Room::where('member_id', $mem->id)->where('status', 'ອອບລາຍ')->get();
        $C_room = count($roomget);
        $c_on = count($roomonline);
        $c_off = count($roomoffline);
        return view('members.index', compact('C_room','roomget', 'roomonline', 'roomoffline', 'c_on', 'c_off'));
    }

    public function userHome()
    {
        $booking = Booking::where('user_id', Auth::user()->id)->where('status', 'on')->get();
        $cbooking = count($booking);
        $rt = Roomtype::all();
        $rrr = Room::orderBy('id')->paginate(6);
        return view('users.index', compact('rrr', 'rt', 'booking', 'cbooking'));
    }

    public function show_room_type($id)
    {
        $rt = Roomtype::all();
        $rrr = Room::orderBy('id')->paginate(6);
        $rrt = Roomtype::find($id)->where('id', $id)->first();
        return view('users.room.show_roomtype', compact('rt', 'rrr', 'rrt'));
    }
}
