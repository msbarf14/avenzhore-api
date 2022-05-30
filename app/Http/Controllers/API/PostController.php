<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;


use App\Category;
use App\Post;
class PostController extends Controller
{
    public function listCategories(){
        try {
            $data = Category::all();
            return response()->json([
                'success' => true,
                'messages' => 'Categories data has been get',
                'data' => $data, 
             ],  200);
        } catch (\Exception $error) {
             return Response::json([
                'success' => false,
                'message' => 'Error when get list categories data',
                'errors' => $error->getMessage()
            ], 500);
        }
    } 

    public function listAllPosts() {
        try {
            $data = Post::with('category')->latest()->get();
            return response()->json([
                'success' => true,
                'messages' => 'Posts data has been get',
                'data' => $data, 
             ],  200);
        } catch (\Exception $error) {
             return Response::json([
                'success' => false,
                'message' => 'Error when get list Posts data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }

    public function postByCategory($category){
        try {
            $data = Category::where('id', $category)->with('post')->get();
            return response()->json([
                'success' => true,
                'messages' => 'Post Category data has been get',
                'data' => $data, 
             ],  200);
        } catch (\Exception $error) {
             return Response::json([
                'success' => false,
                'message' => 'Error when get list post Category data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }

    public function postHeadline($true) {
        try {
            $data = Post::where('headline', $true)->with('category')->latest()->paginate(4);
            return response()->json([
                'success' => true,
                'messages' => 'Posts data has been get',
                'data' => $data, 
             ],  200);
        } catch (\Exception $error) {
             return Response::json([
                'success' => false,
                'message' => 'Error when get list Posts data',
                'errors' => $error->getMessage()
            ], 500);
        }
    }
}
