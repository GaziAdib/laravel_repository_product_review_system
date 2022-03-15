<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository implements IProductRepository {

    public function getAllProducts()
    {
       return Product::all();
    }

    public function getSingleProduct($id)
    {


        return  Product::find($id);

        //return Product::with('comments')->get();

        //return Product::with('comments')->find($id);
    }

    public function createProduct(array $data)
    {
        // Product::create([
        //     'picture' => $data['pciture'],
        //     'title' => $data['title'],
        //     'price' => $data['price'],
        //     'description' => $data['description']
        // ]);

        $product = new Product();
        $product->picture = $data['picture'];
        $product->title = $data['title'];
        $product->price = $data['price'];
        $product->description = $data['description'];


        $product->save();

    }

    public function editProduct($id)
    {
        return Product::find($id);
    }

    public function updateProduct($id, array $data)
    {
       Product::find($id)->update([
            'picture' => $data['picture'],
            'title' => $data['title'],
            'price' => $data['price'],
            'description' => $data['description']
        ]);
    }

}



?>
