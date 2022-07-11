<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Member;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class member_roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = Roomtype::all();
        $memberget = Member::all();
        $rooms = Room::all();
        $users = User::all();
        $mem = Member::where('user_id', Auth::user()->id)->first();
        $roomget = Room::where('member_id', $mem->id)->get();
        $roomonline = Room::where('member_id', $mem->id)->where('status', 'ອອນລາຍ')->get();
        $roomoffline = Room::where('member_id', $mem->id)->where('status', 'ອອບລາຍ')->get();
        $C_room = count($roomget);
        $c_on = count($roomonline);
        $c_off = count($roomoffline);

        $i = 1;
        return view('members.room.index', compact('rooms', 'i', 'C_room', 'memberget', 'users', 'roomget', 'roomonline', 'roomoffline', 'c_on', 'c_off'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roomtypes = Roomtype::all();
        $userget = User::orderBy('id', 'desc')->where('roles', 'Member')->where('id', Auth::user()->id)->get();
        $memget = Member::where('user_id', Auth::user()->id)->first();
        return view('members.room.create', compact('roomtypes', 'userget', 'memget'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(
            [

                'name' => 'required',
                'roomtype_id' => 'required',
                'village' => 'required',
                'district' => 'required',
                'province' => 'required',
                'horm' => 'required',
                'far_from' => 'required',

                'location' => 'required',
                'price' => 'required',
                'details' => 'required',
                'pic' => 'required',
            ],
            [
                'name.required' => 'ກະລຸນາປ້ອນຊື່ຫ້ອງແຖວໃຫ້ຖືກ',
                'roomtype_id.required' => 'ກະລຸນາເລືອກປະເພດຫ້ອງແຖວໃຫ້ຖືກ',
                'village.required' => 'ກະລຸນາປ້ອນບ້ານ',
                'district.required' => 'ກະລຸນາປ້ອນເມືອງ',
                'province.required' => 'ກະລຸນາປ້ອນແຂວງ',
                'horm.required' => 'ກະລຸນາປ້ອນຮ່ອມ',
                'far_from.required' => 'ກະລຸນາປ້ອນໄລຍະທາງ',

                'location.required' => 'ກະລຸນາໃສ່ລິງສະຖານທີ',
                'price.required' => 'ກະລຸນາປ້ອນລາຄ່າ',
                'details.required' => 'ກະລຸນາປ້ອນລາຍລະອຽດ',
                'pic.required' => 'ກະລຸນາເລືອກຮູບພາບ',

            ]
        );
        $memget = Member::where('user_id', Auth::user()->id)->first();
        $roomput = new Room();
        $roomput['name'] = $request->name;
        $roomput['roomtype_id'] = $request->roomtype_id;
        $roomput['member_id'] = $memget->id;
        $roomput['village'] = $request->village;
        $roomput['district'] = $request->district;;
        $roomput['province'] = $request->province;
        $roomput['horm'] = $request->horm;
        $roomput['qty'] = $request->qty;
        $roomput['far_from'] = $request->far_from;
        $roomput['status'] = 'ອອບລາຍ';
        $roomput['location'] = $request->location;
        $roomput['price'] = $request->price;
        $roomput['details'] = $request->details;
        if ($request->file('pic')) {
            $file = $request->file('pic');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $roomput['image'] = $filename;
        }
        $roomput->save();
        return redirect()->back()->with('success', 'ເພີ່ມຫ້ອງແຖວໃໝ່ສຳເລັດແລ້ວ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtypes = Roomtype::all();
        $members = Member::all();
        $rooms = Room::find($id)->where('id', $id)->first();
        return view('members.room.edit', compact('rooms', 'roomtypes', 'members',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $memget = Member::where('user_id', Auth::user()->id)->first();
        $roomtypes = Roomtype::all();
        $members = Member::all();
        $rooms = Room::find($id)->where('id', $id)->first();
        $rooms->name = $request->input('room_name');
        $rooms->roomtype_id = $request->input('roomtype_id');
        $rooms->village = $request->input('village');
        $rooms->district = $request->input('district');
        $rooms->province = $request->input('province');
        $rooms->horm = $request->input('horm');

        $rooms->far_from = $request->input('far_from');
        $rooms->location = $request->input('location');
        $rooms->price = $request->input('price');
        $rooms->details = $request->input('details');
        $rooms->update();
        return redirect()->route('member_register-room.index', compact('rooms', 'members', 'roomtypes'))->with('success', 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນຫ້ອງແຖວສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms = Room::find($id);
        $rooms->delete();
        return redirect()->back()->with('success', 'ທ່ານລົບປະເພດຫ້ອງແຖວສຳເລັດແລ້ວ');
    }

    public function search()
    {
        $search_room = $_GET['query'];
        $users = User::all();
        $rooms = Room::where('member_id', Auth::user()->id)->where('name', 'LIKE', '%' . $search_room . '%')->get();
        $c_search = count($rooms);
        $i = 1;

        return view('members.room.search', compact('rooms', 'i', 'c_search', 'users'));
    }

    public function details($id)
    {
        $comments = Comment::where('room_id', $id)->get();
        $photos = Image::where('room_id', $id)->get();
        $roomtypes = Roomtype::all();
        $members = Member::all();
        $rooms = Room::find($id)->where('id', $id)->first();
        return view('members.room.room_details', compact('rooms', 'roomtypes', 'members', 'photos', 'comments'));
    }

    public function admore_image(Request $request, Room $rooms)
    {
        // dd($dormitory);
        $request->validate([

            'photo' => 'required',
        ], [
            'photo.required' => 'ກະລູນາເລືອກຮູບພາບ',
        ]);
        $images = new Image();
        $images['room_id'] = $rooms->id;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $images['image'] = $filename;
        }
        $images->save();
        return redirect()->back()->with('success', 'ເພີ່ມຮູບສຳເລັດແລ້ວ');
    }

    public function delete_image($id)
    {
        $images = Image::find($id)->where('id', $id)->first();
        $image = $images->image;
        if (!$image) {
            $images = image::find($id)->where('id', $id)->delete();
            return redirect()->back()
                ->with('success', 'ລົບຂໍ້ມູນຫ້ອງເເຖວສຳເລັດ');
        } else {
            unlink('uploads/' . $image);
            $images = image::find($id)->where('id', $id)->delete();
            return redirect()->back()
                ->with('success', 'ລົບຂໍ້ມູນຮູບພາບຫ້ອງເເຖວສຳເລັດ');
        }
    }

    public function comment(Request $request, Room $rooms)
    {
        $request->validate([

            'comment' => 'required',
        ], [
            'comment.required' => 'ກະລູນາເພີ່ມຄອມເມັ້ນ.',
        ]);
        $comments = new Comment();
        $comments['room_id'] = $rooms->id;
        $comments['user_id'] = Auth::user()->id;
        $comments['comments'] = $request->comment;
        $comments->save();
        return redirect()->back()->with('success', 'ເພີ່ມເພີ່ມຄອມເມັ້ນສຳເລັດແລ້ວ');
    }

    public function delete_comments($id)
    {

        $comments = Comment::find($id)->where('id', $id)->first();
        $comments = Comment::find($id)->where('id', $id)->delete();
        return redirect()->back()
            ->with('successs', 'ລົບຄອມເມັ້ນສຳເລັດ');
    }
}
