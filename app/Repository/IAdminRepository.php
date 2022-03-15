<?php

namespace App\Repository;

interface IAdminRepository {

    public function adminShowAllProduct();

    public function adminGetAllComments();

    public function adminDeleteComment($id);

    public function adminDeleteProduct($id);

}




?>
