<?php


namespace App\Repository;

use App\Models\Comment;
use App\Models\Product;

class AdminRepository implements IAdminRepository {

    public function adminShowAllProduct()
    {
        return Product::all();
    }

    public function adminGetAllComments()
    {
        return Comment::all();
    }

    public function adminDeleteComment($id)
    {
        return Comment::find($id)->delete();
    }

    public function adminDeleteProduct($id)
    {
        return Product::find($id)->delete();
    }



}



?>
