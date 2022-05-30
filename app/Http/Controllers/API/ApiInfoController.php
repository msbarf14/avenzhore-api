<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiInfoController extends Controller
{
    public function index(){
        return response()->json("welcome to api ma'la", 200);
    }
}
