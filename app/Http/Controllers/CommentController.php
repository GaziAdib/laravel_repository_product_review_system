<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{


    public function addComment(Request $request, $id) {

        $request->validate([
            'comment' => 'required',
            'rating' => 'required'
        ]);

     $data =  Comment::insert([
          'product_id' => $id,
          'comment' => $request->comment,
          'rating' => $request->rating,
      ]);

      return redirect('/products');


    }


    // public function loadComments($id) {

    //     $comments = Comment::where('product_id', $id)->get();
    //     dd($comments);
    //     return response()->json($comments);

    // }



}
