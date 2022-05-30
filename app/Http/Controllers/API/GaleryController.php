<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Galery;
class GaleryController extends Controller
{
    public function index() {
        $data = Galery::latest()->get();
        try {
            return response()->json($data, 200);
        } catch (\Error $error) {
            return response()->json($error);
        }
    }
}
