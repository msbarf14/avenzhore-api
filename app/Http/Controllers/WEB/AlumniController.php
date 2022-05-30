<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Alumni;
use App\User;
class AlumniController extends Controller
{
    // index
    public function index() {
        $alumni = Alumni::all();
        return view('admin.alumni.index', compact('alumni'));
    }
    // create
    public function create() {
        return view('admin.alumni.create');
    }
    // store
    public function store(Request $request) {

        // return $request->all();
        $request->validate([
            'full_name' => 'required',
            'master_number' => 'required',
            'birthplace' => 'required',
            'dateplace' => 'required',            
        ]);
    
        
        $alumni = new Alumni;
        if ($alumni->user_id == null) {
            $user = new User;
            $user->name = $request['full_name'];
            $inputEmail = str_replace(' ', '_', $user->name);
            $user->email = $inputEmail.'@avenzhore.space';
            $user->password = Hash::make($request['password']);
            $user->status = 'deactive';
            $user->role = 'user';
            $user->save();
        }
        
        $alumni->user_id = $user->id;
        $alumni->entry_year = $request['entry_year'];
        $alumni->full_name = $request['full_name'];
        $alumni->master_number = $request['master_number'];
        $alumni->birthplace = $request['birthplace'];
        $alumni->dateplace = $request['dateplace'];
        $alumni->fathers_name = $request['fathers_name'];
        $alumni->mothers_name = $request['mothers_name'];
        $alumni->address = $request['address'];
        $alumni->hp = $request['hp'];
        $alumni->whatsapp = $request['whatsapp'];
        $alumni->facebook = $request['facebook'];
        $alumni->instagram = $request['instagram'];
        $alumni->accepted_class = $request['accepted_class'];
        $alumni->word = $request['word'];
        $alumni->picture = $request['picture'];
        // maps
        $alumni->lat = $request['lat'];
        $alumni->lang = $request['lang'];
        

        $alumni->save();

        if ($alumni->save() && $user->save()) {
            $notification = array(
                'message' => 'Data '.$alumni->full_name.' berhasil ditambahkan !', 
                'alert-type' => 'success'
            );
            return redirect()->route('alumni')->with($notification);
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }
    // edit
    public function edit($id) {
        $alumni = Alumni::where('id', $id)->first();
        return view('admin.alumni.edit', compact('alumni'));
    }
    // update
    public function update(Request $request, $id) {
        $request->validate([
            'full_name' => 'required',
            'master_number' => 'required',
            'birthplace' => 'required',
            'dateplace' => 'required',            
        ]);
    
        $alumni = Alumni::findOrFail($id);

        $alumni->entry_year = $request['entry_year'];
        $alumni->full_name = $request['full_name'];
        $alumni->master_number = $request['master_number'];
        $alumni->birthplace = $request['birthplace'];
        $alumni->dateplace = $request['dateplace'];
        $alumni->fathers_name = $request['fathers_name'];
        $alumni->mothers_name = $request['mothers_name'];
        $alumni->address = $request['address'];
        $alumni->hp = $request['hp'];
        $alumni->whatsapp = $request['whatsapp'];
        $alumni->facebook = $request['facebook'];
        $alumni->instagram = $request['instagram'];
        $alumni->accepted_class = $request['accepted_class'];
        $alumni->word = $request['word'];
        $alumni->picture = $request['picture'];
        // map
        $alumni->lat = $request['lat'];
        $alumni->lang = $request['lang'];
        $alumni->save();

        if ($alumni->save()) {
            $notification = array(
                'message' => 'Data '.$alumni->full_name.' berhasil diubah !', 
                'alert-type' => 'info'
            );
            return redirect()->route('alumni')->with($notification);
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    public function detail($id){
        $alumni = Alumni::where('id', $id)->with('user')->first();
        return view('admin.alumni.detail', compact('alumni'));
    }
    

    public function destroy($id) {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();
        $user  = User::findOrFail($alumni->user_id);
        $user->delete();
        $notification = array(
            'message' => 'Data '.$alumni->full_name.' berhasil dihapus !', 
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);        
    }

    
}
