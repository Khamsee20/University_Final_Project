<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class adminCommentController extends Controller
{
   public function index()
   {
        $ment = Comment::orderBy('id', 'desc')->paginate(10);
        $i = 1;
        $c_ment = count($ment);
        return view('admin.comments.index', compact('ment','i','c_ment'));

   }

   public function delete_comments($id)
   {
    $comments = Comment::find($id);
    $comments->delete();
    return redirect()->back()->with('success', 'ລົບຄອມເມັ້ນສຳເລັດແລ້ວ');
   }
}