<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TokensController extends Controller
{
    public function prueba(Request $request){
        return "hello";
    }
}
