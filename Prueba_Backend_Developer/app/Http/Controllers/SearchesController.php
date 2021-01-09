<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchesController extends Controller
{
    public function results(Request $request){
        $search = $request->search;
        $dataFounded = Product::select('*')
        ->where('name', $search)
        ->where('sku', $search)
        ->paginate(10);

        return $dataFounded;
    }
}
