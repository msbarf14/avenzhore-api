<?php

namespace App\Http\Controllers\WEB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    public function __invoke() {
        return DB::table('wilayah_provinsi')->get();
    }
}