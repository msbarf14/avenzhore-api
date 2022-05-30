<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Galery;
class GaleryController extends Controller
{
    public function index(){
        $data = Galery::paginate(10);
        return view('admin.galery.index', compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'picture' => 'required',
        ]);

        $galery = new Galery;
        $galery->title = $request->title;
        $galery->picture = $request->picture;
        $galery->isActive = true;
        $galery->save();

        if ($galery->save()) {
            return redirect()->route('admin.galery');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
        
    }
    public function destroy($id){
        $galery =  Galery::findOrFail($id);
        $galery->delete();
        return redirect()->back();
    }
}
