<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\Table;

class userController extends Controller
{
    public function index(){
        $user = User::where('id','>',1)->with('position')->paginate(5);
        $c_user = count($user);
        $i = 1;
        return view('admin.user.index', compact('user','c_user','i'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'ທ່ານລົບສຳເລັດແລ້ວ');
    }

    public function search_users()
    {
        $search_user = $_GET['query'];
        $user = User::where('name', 'LIKE', '%'.$search_user.'%')->paginate(10);
        $c_user = count($user);
        $i=1;

        return view('admin.user.search', compact('user','i','c_user'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show() 
    {

        $userget = User::orderBy('id', 'desc')->where('roles', 'User')->get();
        $c_user = count($userget);
        $i = 1;
        return view('admin.user.show', compact('userget','c_user','i'));

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
            $user = User::select()->where('created_at','>=',$fromDate)->where('created_at','<=',$toDate)->paginate(10);
            $c_user = count($user);
            $i = 1;
            return view('admin.user.search_report', compact('user','c_user','i'));
    }

 

    public function update(Request $request, $id)
    {
       
        $request->validate([
            
            'position' => 'required',
        ],
        [
            'position.required' => 'ກະລຸນາເລືອກຕຳແໜ່ງທີ່ທ່ານຢາກປ່ຽນ',
        ]);
        $userget = User::find($id)->where('id',$id)->first();
        $userget['roles']= $request->position;
        
        if($request->position == 'Member'){
        $userget->update();
        return redirect(route('register_member.create'));
        }
            $userget->update();
            return redirect(route('admin_users.index'))->with('success','ທ່ານອັບເດດຕຳແໜ່ງສຳເລັດແລ້ວ');
        

        // return redirect()->route('admin_users.index', compact('userget'))->with('success', 'ທ່ານໄດ້ປ່ຽນຕຳແໜ່ງສຳເລັດແລ້ວ');
    }

    public function edit($id)
     {
        $user = User::where('id','>',1)->with('position')->paginate(5);
        $c_user = count($user);
        $i = 1;
        $userss = User::find($id)->where('id',$id)->first();
        return view('admin.user.edit',compact('user','c_user','i','userss'));
    }

 
}
