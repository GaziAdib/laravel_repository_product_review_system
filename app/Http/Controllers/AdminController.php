<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function adminShowAllProduct() {
        $products =  Product::all();
        return view('admin.index')->with('products', $products);
    }

    public function adminGetAllComments() {
            $comments = Comment::all();

            return view('admin.comments')->with('comments', $comments);
    }

    public function adminDeleteComment($id) {
        Comment::find($id)->delete();
        return redirect('/admin/products/comments');
    }

    public function adminDeleteProduct($id) {
        Product::find($id)->delete();
        return redirect('/admin/products');
    }

}
