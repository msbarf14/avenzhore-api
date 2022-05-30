<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlumni;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Carbon;
use App\Alumni;

class AlumniController extends Controller
{
    public function index() {
        try {
            $data = Alumni::all();
            return response()->json([
                'success' => true,
                'messages' => 'Alumni data has been get',
                'data' => $data, 
             ],  200);
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when get Alumni data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }
    
    public function store(Request $request) {
        try {
            $input = $request->all();
            $input['created_at'] = Carbon::now();
            $insert = Alumni::create($input);

            return Response::json([
                'success' => true,
                'message' => 'Disability data has been add',
                'data'    => $insert
            ], 200);

        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error add Alumni data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }

    public function search(Request $request) {
		$search = $request->full_name;
        try {
            $data = Alumni::where('full_name','like',"%{$search}%")->get();
            return Response::json([
                'success' => true,
                'message' => 'Alumni data has been get',
                'data'    => $data
            ], 200);

        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error add Alumni data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }
}
