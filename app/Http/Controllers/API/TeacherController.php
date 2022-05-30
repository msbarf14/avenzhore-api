<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Teacher;
class TeacherController extends Controller
{
    public function index() {
        try {
            
            $data = Teacher::with('booksDetail.book')->get();
            return response()->json([
                'success' => true,
                'messages' => 'Masyayikh data has been get',
                'data' => $data, 
             ],  200);
            //code...
        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error when get Masyayikh data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }
    public function search(Request $request) {
		$search = $request->full_name;
        try {
            $data = Teacher::where('full_name','like',"%{$search}%")->get();
            return Response::json([
                'success' => true,
                'message' => 'Teacher data has been get',
                'data'    => $data
            ], 200);

        } catch (\Exception $error) {
            return Response::json([
                'success' => false,
                'message' => 'Error add Teacher data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }
}
