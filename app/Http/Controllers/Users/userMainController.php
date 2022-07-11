<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Member;
use App\Models\Room;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class userMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_room_details($id)
    { {
            $bking = Booking::where('room_id', $id)->where('user_id', Auth::user()->id)->get();
            $cbking = count($bking);
            $booking = Booking::where('room_id', $id)->get();
            $cbooking = count($booking);
            $roomqty = Room::where('id', $id)->value('qty');
            $emptyroom = $roomqty - $cbooking;
            $comments = Comment::where('room_id', $id)->get();
            $photos = Image::where('room_id', $id)->get();
            $roomtypes = Roomtype::all();
            $members = Member::all();
            $roomget = Room::find($id)->where('id', $id)->first();
            return view(
                'users.room.details',
                compact('roomget', 'roomtypes', 'members', 'photos', 'comments', 'cbooking', 'roomqty', 'emptyroom', 'bking','cbking')
            );
        }
    }

    public function delete_comments($id)
    {

        $comments = Comment::find($id)->where('id', $id)->first();
        $comments = Comment::find($id)->where('id', $id)->delete();
        return redirect()->back()
            ->with('successs', 'ລົບຄອມເມັ້ນສຳເລັດ');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user_comment(Request $request, Room $roomget)
    {
        $request->validate([

            'comment' => 'required',
        ], [
            'comment.required' => 'ກະລູນາເພີ່ມຄອມເມັ້ນ.',
        ]);
        $comments = new Comment();
        $comments['room_id'] = $roomget->id;
        $comments['user_id'] = Auth::user()->id;
        $comments['comments'] = $request->comment;
        $comments->save();
        return redirect()->back()->with('success', 'ເພີ່ມເພີ່ມຄອມເມັ້ນສຳເລັດແລ້ວ');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function booking($id)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
