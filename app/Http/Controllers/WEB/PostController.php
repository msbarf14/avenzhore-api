<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
class PostController extends Controller
{
    public function index() {
        $posts = Post::with('category')->latest()->get();
        // return $posts;
        return view('admin.post.index', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'picture' => 'required',
            'picture_description' => 'required',
            'type' => 'required',
            'active' => 'required',
            'headline' => 'required',
        ]);

        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->picture = $request->picture;
        $post->picture_description = $request->picture_description;
        $post->type = $request->type;
        $post->active = $request->active;
        $post->headline = $request->headline;
        $post->hits = 0;
        $post->author= Auth::user()->name;
        $post->save();
        
        if ( $post->save()) {
            return redirect('/home/post');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    public function edit($id) {
        $post = Post::where('id', $id)->first();
        $categories = Category::all();
        // return $post;
        return view('admin.post.edit', compact('post', 'categories'));
        
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'picture' => 'required',
            'picture_description' => 'required',
            'type' => 'required',
            'active' => 'required',
            'headline' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->picture = $request->picture;
        $post->picture_description = $request->picture_description;
        $post->type = $request->type;
        $post->active = $request->active;
        $post->headline = $request->headline;
        $post->hits = 0;
        $post->author= Auth::user()->name;
        $post->save();
        
        if ( $post->save()) {
            return redirect('/home/post');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    public function detail($id) {
        $post = Post::with('category')->where('id',$id)->first();
        return view('admin.post.detail', compact('post'));

    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        if ( $post->delete()) {
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

}
