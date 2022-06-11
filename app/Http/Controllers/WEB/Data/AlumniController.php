<?php

namespace App\Http\Controllers\Web\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;

class AlumniController extends Controller
{
    public function index(Request $request) {
        
        if ( $request['search']) {
            $alumni =  Member\Member::where('full_name', 'LIKE', '%'. $request['search'] . '%')->get();
        } else {
            $alumni =  Member\Member::paginate(20);
        }
        return view('admin.alumni.index', compact('alumni'));
    }

    public function store(Request $request) {

        $request->validate([
            'full_name' => 'required',
            'born_place' => 'required',
            'born_date' => 'required',
            'gender' => 'required',
        ]);
        Member\Member::create($request->all());
        return redirect()->back();
    }
}
