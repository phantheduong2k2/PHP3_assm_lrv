<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request){
       $pro_check = product::where('id', $request->pro_id)->where('status', '0')->first();

      if($pro_check){
        comment::create([
            'pro_id' => $pro_check->id,
            'user_id' =>  Auth::user()->id,
            'comment' => $request->comment,
            'rating'  => $request->rating
        ]);
    }
        return redirect()->back()->with('success', 'comment success');

    }
}
