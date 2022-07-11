<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use function PHPUnit\Framework\returnSelf;

class memberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $memberget = Member::orderBy('id','desc')->with('users')->paginate(5);
        $C_member = count($memberget);
        $i = 1;
        return view('admin.register_member.index', compact('memberget','C_member','i'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_name = User::where('roles','Member')->get();
        $mm = Member::orderby('id', 'asc')->with('users');
      
        return view('admin.register_member.create', compact('mm','user_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'phone' => 'required',
            'village' => 'required',
            'district' => 'required',
            'province' => 'required',
        ],
        [
            'user_id.required' => 'ກະລຸນາເລືອກຜູ້ໃຊ້',
            'phone.required' => 'ກະລຸນາປ້ອນເບີໂທ',
            'village.required' => 'ກະລຸນາປ້ອນບ້ານ',
            'district.required' => 'ກະລຸນາປ້ອນເມືອງ',
            'province.required' => 'ກະລຸນາປ້ອນແຂວງ',
        ]);
        $member = new Member();
        $member->user_id = $request->user_id;
        $member->phone = $request->phone;
        $member->village = $request->village;
        $member->district = $request->district;
        $member->province = $request->province;
        $member->save();
        return redirect(route('register_member.index'))->with('success', 'ເພີ່ມສະໝາຊິກຫ້ອງແຖວໃໝ່ສຳເລັດແລ້ວ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member) 
    {
        $i = 1;
        $memberget = Member::with('users')->get();
        $C_member = count($memberget);
        return view('admin.register_member.show', compact('memberget','C_member','i'));

    }

     

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
            $user = User::all();
            $memberget = Member::select()->where('created_at','>=',$fromDate)->where('created_at','<=',$toDate)->paginate(10);;
            $C_member = count($memberget);
            $i = 1;
            return view('admin.register_member.search_report', compact('memberget','C_member','i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_name = User::all();
        $memberget = Member::find($id)->where('id',$id)->first();
        return view('admin.register_member.edit', compact('memberget','user_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_name = User::all();
        $memberget = Member::find($id)->where('id',$id)->first();
        $memberget->user_id = $request->input('user_id');
        $memberget->phone = $request->input('phone');
        $memberget->village = $request->input('village');
        $memberget->district = $request->input('district');
        $memberget->province = $request->input('province');
        $memberget->update();
        return redirect()->route('register_member.index', compact('user_name','memberget'))->with('success', 'ທ່ານໄດ້ແກ້ໄຂຂໍ້ມູນສະມາຊິກສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membergert = Member::find($id);
        $membergert->delete();
        return redirect()->back()->with('success', 'ທ່ານລົບປະເພດຫ້ອງແຖວສຳເລັດແລ້ວ');
    }

    public function search()
    {
        $search_memeber = $_GET['query'];
        $users = User::all();
        $memberget = Member::whereHas('users', function ($q) use($search_memeber){
            $q->where('name', 'LIKE', '%'.$search_memeber.'%');
        })->get();
        $c_search = count($memberget);
        $i=1;

        return view('admin.register_member.search', compact('memberget','i','c_search'));

    }
}
