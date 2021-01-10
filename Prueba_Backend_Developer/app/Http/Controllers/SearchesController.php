<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function results(Request $request)
    {
        $search = $request->search; //Var for recieving the word to be searched

        $dataFounded = Product::select('*')//Searching the information in the database
        ->where('name', 'like', "%$search%")
        ->orWhere('sku', 'like', "%$search%")
        ->paginate(10);
        
        if(empty($dataFounded)){//If the informationt was not found, say that it was not found
            return ["message" => "No founded"];
        }else{
            return $dataFounded;//If it was found, show the informaion found
        }
    }
}
