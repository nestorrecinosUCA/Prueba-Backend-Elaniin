<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allProducts = Product::select(['id', 'sku', 'name', 'quantity', 'price', 'description', 'image'])
        ->paginate(10);
        return $allProducts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'string',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'description' => 'string',
        ]);

        $createProduct = Product::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image
        ]);

        return $createProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::select('id', 'sku', 'name', 'quantity', 'price', 'description', 'image')
        ->where('id', $id)
        ->get();
        //$product = Product::find($id);
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'sku' => 'string',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'description' => 'string',
        ]);
        
        $updateProduct = Product::find($id);
        $updateProduct->sku = $request->sku;
        $updateProduct->name = $request->name;
        $updateProduct->quantity = $request->quantity;
        $updateProduct->price = $request->price;
        $updateProduct->description = $request->description;
        $updateProduct->image = $request->image;
        $updateProduct->save();

        return $updateProduct;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productToDelete = Product::find($id);
        $productToDelete->delete();
        return ['message' => 'Product Deleted'];
    }
}
