<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use validator;

class ProductController extends Controller  {

    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'description' => 'required',
        ]);

        $product = Product::create($request->all());
        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());

        return response()->json([
            'message' => 'Successfull update product'
        ]);
    }

    public function delete($id)
    {
        Product::destroy($id);

        return response()->json([
            'message' => 'Successfull delete product'
        ]);
    }


}
