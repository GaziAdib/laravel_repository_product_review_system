<?php

namespace App\Http\Controllers;


use App\Repository\IProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public $product;

    public function __construct(IProductRepository $product) {
        $this->product = $product;
    }



    public function index()
    {
        // return all products

        $products =  $this->product->getAllProducts();

        return view('product.index')->with('products', $products);

    }

    public function show($id)
    {
        // get single product

        $product = $this->product->getSingleProduct($id);
        return view('product.show')->with('product', $product);
    }


    public function create()
    {

        // create page
        return view('product.create');
    }


    public function store(Request $request)
    {

        // validate and store data
        $request->validate([
            'picture' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        //image upload

        $data = $request->all();

        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        $this->product->createProduct($data);

        return redirect('/products');

    }





    public function edit($id)
    {
        $product = $this->product->editProduct($id);
        return view('product.edit')->with('product', $product);
    }


    public function update(Request $request, $id)
    {

        // validate and store data
        $request->validate([
            'picture' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        //image upload

        $data = $request->all();

        if($image = $request->file('picture')) {
            $name = time(). '.' .$image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            $data['picture'] = "$name";
        }

        $this->product->updateProduct($id, $data);

        return redirect('/products');

    }


    public function destroy($id)
    {
        //
    }
}
