<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roomtype;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class roomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtype = Roomtype::orderby('id', 'asc')->paginate(10); 
        $C_Roomtype = count($roomtype);
        $i = 1;
        return view('admin.roomtype.index', compact('roomtype', 'C_Roomtype', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomtype = new Roomtype;
        $roomtype->name = $request->input('roomtype_name');
        $roomtype->save();
        return redirect()->back()->with('success', 'ທ່ານໄດ້ເພີ່ມປະເພດຫ້ອງແຖວສຳເລັດແລ້ວ.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function show(roomtype $roomtype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype = Roomtype::find($id);
        return view('admin.roomtype.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roomtype = Roomtype::find($id);
        $roomtype->name = $request->input('roomtype_name');
        $roomtype->update();
        return redirect()->route('roomtype.index')->with('success', 'ທ່ານໄດ້ແກ້ໄຂປະເພດຫ້ອງແຖວສຳເລັດແລ້ວ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomtype = Roomtype::find($id);
        $roomtype->delete();
        return redirect()->back()->with('success', 'ທ່ານລົບປະເພດຫ້ອງແຖວສຳເລັດແລ້ວ');
    }

    public function search()
    {
        $search_roomtyp = $_GET['query'];
        $roomtype = Roomtype::where('name', 'LIKE', '%'.$search_roomtyp.'%')->get();
        $c_search = count($roomtype);
        $i=1;

        return view('admin.roomtype.search', compact('roomtype','i','c_search'));

    }
}
