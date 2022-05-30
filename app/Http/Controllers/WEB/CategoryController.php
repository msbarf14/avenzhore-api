<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.post.postCategory.index', compact('categories'));
    }

    public function store(Request $request) {
        
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category = new Category;
        $category->name = $request->name;

        $category->save();
        if ($category->save()) {
            return redirect()->back();
        } else {
           return redirect()->back()->withErrors();
        }
    }
    
    public function edit($id) {
        $category = Category::find($id);
        // return $category;
        return view('admin.post.postCategory.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        
      
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category =  Category::find($id);
        $category->name = $request->name;
        $category->save();
        if ($category->save()) {
            return redirect('/home/post/category');
        } else {
           return redirect()->back()->withErrors();
        }
    }


    public function destroy($id) {
        $category =  Category::find($id);
        $category->delete();
        return redirect()->back();
    }

    
}
