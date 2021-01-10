<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Searching thew information of all the products
        $allProducts = Product::select(['*'])
        ->paginate(10);

        return $allProducts;//returning the information found
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
        //Validating the information to be saved
        $request->validate([
            'sku' => 'string',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'description' => 'string',
            'image' => 'image|max:5000'
        ]);
        //saving the image and getting its path
        if(!($request->image)){
            $image = null;
        }else{
            $image = basename(Storage::put('Products', $request->image));
        }
        //Creating and saving the information
        $createProduct = Product::create([
            'sku' => $request->sku,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $image
        ]);

        return $createProduct; //returning the information saved
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //Showing a specific product
        $product = Product::select('*')
        ->where('id', $id)
        ->get();
        
        return $product; //Returning the information found
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
        //Validation the information to be updated
        $request->validate([
            'sku' => 'string',
            'name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric|regex:/^[\d]{0,8}(\.[\d]{1,2})?$/',
            'description' => 'string',
            'image' => 'image|max:5000'
        ]);

        //saving the image and getting its path
        if(!($request->image)){
            $image = null;
        }else{
            $image = basename(Storage::put('Products', $request->image));
        }

        $updateProduct = Product::find($id);//finding the product's id to be updated
        $updateProduct->sku = $request->sku;
        $updateProduct->name = $request->name;
        $updateProduct->quantity = $request->quantity;
        $updateProduct->price = $request->price;
        $updateProduct->description = $request->description;
        $updateProduct->image = $image;
        $updateProduct->save();//saving the information updated

        return $updateProduct;//Returning the information updated

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productToDelete = Product::find($id);//Getting the product's id to be deleted
        $productToDelete->delete();//Deleting the product's information
        return ['message' => 'Product Deleted'];//Retutning a final message
    }
}
