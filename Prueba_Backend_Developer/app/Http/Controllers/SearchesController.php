<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchesController extends Controller
{
    public function results(Request $request){
        $search = $request->search;
        $dataFounded = Product::select('*')
        ->where('name', 'like', "%$search%")
        ->orWhere('sku', 'like', "%$search%")
        ->paginate(10);
        //$dataFounded = DB::table('products')->where('name', $search);
        if(empty($dataFounded)){
            return ["message" => "No founded"];
        }else{
            return $dataFounded;
        }
    }
}
