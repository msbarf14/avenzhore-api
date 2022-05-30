<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
        $data = User::with('alumni')->get();
        // return $data;
        return view('admin.user.index', compact('data'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
    
        $user = new User;

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->role = $request['role'];
        $user->status = $request['status'];
    
        $user->save();
        if ($user->save()) {
            return redirect()->back();
        } else {
           return redirect()->back()->withErrors();
        }
    }


    public function edit($id) {
        $user = User::find($id);
        
        return view('admin.user.edit', compact('user'));
    }


    public function update(Request $request,$id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);
    
        $user = User::findOrFail($id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        if($request['password']){
            $user->password = Hash::make($request['password']);
        }
        $user->role = $request['role'];
        $user->status = $request['status'];
    
        $user->save();
        if ($user->save()) {
            return redirect()->route('user');
        } else {
           return redirect()->back()->withErrors();
        }
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
    public function status(Request $request, $id){
        $user = User::findOrFail($id);
        $user->status = $request["status"];
        $user->save();
        if ($user->save()) {
            if ($user->status === "active") {
                  $notification = array(
                    'message' => 'Data '.$user->name.' '.$user->status, 
                    'alert-type' => 'info'
                );
            } else {
                  $notification = array(
                    'message' => 'Data '.$user->name.' '.$user->status, 
                    'alert-type' => 'warning'
                );
            }
            return redirect()->route('user')->with($notification);
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }
}
