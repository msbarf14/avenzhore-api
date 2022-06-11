<?php

namespace App\Http\Controllers\WEB\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member\Address;
use App\Models\Member\Member;

class AddressController extends Controller
{
    public function create($alumniId){
        $alumni = Member::where('id', $alumniId)->first();
        return view('admin.alumni.address.create', compact('alumni'));
    }
    public function store(Request $request) {
        return $request;
    }
}
