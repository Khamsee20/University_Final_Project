<?php

namespace App\Http\Controllers;

use App\Models\uploadpic;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function addImage(){
        return view('add_image');
    }
    //Store image
    public function storeImage(Request $request){
       /*Logic to store data*/
       $data= new uploadpic();

       if($request->file('image')){
           $file= $request->file('image');
           $filename= date('YmdHi').$file->getClientOriginalName();
           $file-> move(public_path('public/Image'), $filename);
           $data['pic']= $filename;
       }
       $data->save();
       return redirect()->route('images.view');
    }
		//View image
    public function viewImage(){
        $imageData= uploadpic::all();
        return view('view_image', compact('imageData'));
    }
}
