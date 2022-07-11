<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use Illuminate\Http\Request;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = Roomtype::all();
        $rooms = Room::orderby('id')->paginate(5);
        $room = Room::all();
        $i = 1;
        $C_room = count($rooms);
        return view('admin.room.index', compact('rooms','i','C_room','roomtypes','room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomtypes = Roomtype::all();
        $memberget = Member::orderBy('id', 'desc')->get();
        return view('admin.room.create', compact('memberget','roomtypes',));
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
        $request->validate([
            
            'name' => 'required',
            'roomtype_id' => 'required',
            'member_id' => 'required',
            'village' => 'required',
            'district' => 'required',
            'province' => 'required',
            'horm' => 'required',
            'far_from' => 'required',
            'status' => 'required',
            'qty' => 'required',
            'location' => 'required',
            'price' => 'required',
            'details' => 'required',
            'pic' => 'required',
        ],
        [
            'name.required' => 'ກະລຸນາປ້ອນຊື່ຫ້ອງແຖວໃຫ້ຖືກ',
            'roomtype_id.required' => 'ກະລຸນາເລືອກປະເພດຫ້ອງແຖວໃຫ້ຖືກ',
            'member_id.required' => 'ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ',
            'village.required' => 'ກະລຸນາປ້ອນບ້ານ',
            'district.required' => 'ກະລຸນາປ້ອນເມືອງ',
            'province.required' => 'ກະລຸນາປ້ອນແຂວງ',
            'horm.required' => 'ກະລຸນາປ້ອນຮ່ອມ',
            'far_from.required' => 'ກະລຸນາປ້ອນໄລຍະທາງ',
            'status.required' => 'ກະລຸນາປ້ອນສະຖານະ',
            'qty.required' => 'ກະລຸນາປ້ອນຈຳນວນຫ້ອງ',
            'location.required' => 'ກະລຸນາໃສ່ລິງສະຖານທີ',
            'price.required' => 'ກະລຸນາປ້ອນລາຄ່າ',
            'details.required' => 'ກະລຸນາປ້ອນລາຍລະອຽດ',
            'pic.required' => 'ກະລຸນາເລືອກຮູບພາບ',
            
        ]);
       
        $roomput = new Room();
        $roomput['name']= $request->name;
        $roomput['roomtype_id']= $request->roomtype_id;
        $roomput['member_id']= $request->member_id;
        $roomput['village']= $request->village;
        $roomput['district']= $request->district;;
        $roomput['province']= $request->province;
        $roomput['horm']= $request->horm;
        $roomput['far_from']= $request->far_from;
        $roomput['status']= $request->status;
        $roomput['qty']= $request->qty;
        $roomput['location']= $request->location;
        $roomput['price']= $request->price;
        $roomput['details']= $request->details;
        if($request->file('pic')){
            $file= $request->file('pic');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('uploads'), $filename);
            $roomput['image']= $filename;
        }
        $roomput->save();
        return redirect()->back()->with('success', 'ເພີ່ມຫ້ອງແຖວໃໝ່ສຳເລັດແລ້ວ');
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
        $members = Member::with('users')->get();
        $rooms = Room::find($id)->where('id',$id)->first();
        return view('admin.room.edit', compact('rooms','roomtypes','members',));
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
       
        $request->validate([
            
            'name' => 'required',
            'roomtype_id' => 'required',
            'member_id' => 'required',
            'village' => 'required',
            'district' => 'required',
            'province' => 'required',
            'horm' => 'required',
            'far_from' => 'required',
            'status' => 'required',
            'qty' => 'required',
            'location' => 'required',
            'price' => 'required',
            'details' => 'required',
           
        ],
        [
            'name.required' => 'ກະລຸນາປ້ອນຊື່ຫ້ອງແຖວໃຫ້ຖືກ',
            'roomtype_id.required' => 'ກະລຸນາເລືອກປະເພດຫ້ອງແຖວໃຫ້ຖືກ',
            'member_id.required' => 'ກະລຸນາເລືອກເຈົ້າຂອງຫ້ອງແຖວ',
            'village.required' => 'ກະລຸນາປ້ອນບ້ານ',
            'district.required' => 'ກະລຸນາປ້ອນເມືອງ',
            'province.required' => 'ກະລຸນາປ້ອນແຂວງ',
            'horm.required' => 'ກະລຸນາປ້ອນຮ່ອມ',
            'far_from.required' => 'ກະລຸນາປ້ອນໄລຍະທາງ',
            'status.required' => 'ກະລຸນາປ້ອນສະຖານະ',
            'qty.required' => 'ກະລຸນາປ້ອນຈຳນວນຫ້ອງ',
            'location.required' => 'ກະລຸນາໃສ່ລິງສະຖານທີ',
            'price.required' => 'ກະລຸນາປ້ອນລາຄ່າ',
            'details.required' => 'ກະລຸນາປ້ອນລາຍລະອຽດ',
            
            
        ]);
        $roomtypes = Roomtype::all();
        $members = Member::all();
        $roomput = Room::find($id)->where('id',$id)->first();
        $roomput['name']= $request->name;
        $roomput['roomtype_id']= $request->roomtype_id;
        $roomput['member_id']= $request->member_id;
        $roomput['village']= $request->village;
        $roomput['district']= $request->district;;
        $roomput['province']= $request->province;
        $roomput['horm']= $request->horm;
        $roomput['far_from']= $request->far_from;
        $roomput['status']= $request->status;
        $roomput['qty']= $request->qty;
        $roomput['location']= $request->location;
        $roomput['price']= $request->price;
        $roomput['details']= $request->details;
        // if($request->file('pic')){
        //     $file= $request->file('pic');
        //     $filename= date('YmdHi').$file->getClientOriginalName();
        //     $file-> move(public_path('uploads'), $filename);
        //     $roomput['image']= $filename;
        // }
        $roomput->update();
        return redirect()->route('register-room.index', compact('roomput','members','roomtypes'))->with('success', 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນຫ້ອງແຖວສຳເລັດແລ້ວ');
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

    public function search_room()
    {
        $search_room = $_GET['query'];
        $rooms = Room::where('name', 'LIKE', '%'.$search_room.'%')->get();
        $c_search = count($rooms);
        $i=1;

        return view('admin.room.search', compact('rooms','i','c_search'));

    }

           
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $roomget = Room::all();
        $c_room = count($roomget);
        $i = 1;
        return view('admin.room.show', compact('roomget','c_room','i'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function search_report( Request $request)
    {
        $request->validate([

            'fromDate' => 'required',
            'toDate' => 'required',
            ],[
            'fromDate.required' => 'ກະລຸນາເລືອກວັນທີເລິມຕົ້ນ',
            'toDate.required' => 'ກະລຸນາເລືອກວັນທີສຸດທ້າຍ',
            ]);
            $fromDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            $roomget = Room::select()->where('created_at','>=',$fromDate)->where('created_at','<=',$toDate)->paginate(10);
            $c_roomget = count($roomget);
            $i = 1;
            return view('admin.room.search_report', compact('roomget','c_roomget','i'));
    }
}
