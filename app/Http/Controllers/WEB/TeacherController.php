<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Teacher;
use App\User;
use App\Teacherbook;
use App\Book;
class TeacherController extends Controller
{
    public function index(){
        $teacher = Teacher::all();
        return view('admin.teacher.index', compact('teacher'));
    }
    public function create(){
        return view('admin.teacher.create');
    }
    public function store(Request $request) {

        $teacher = new Teacher;
        if ($teacher->user_id == null) {
            $user = new User;
            $user->name = $request['full_name'];
            $inputEmail = str_replace(' ', '_', $user->name);
            $user->email = $inputEmail.'@ma-la.com';
            $user->password = Hash::make($request['password']);
            $user->status = 'deactive';
            $user->role = 'user';
            $user->save();
        }
        
        $teacher->user_id = $user->id;
        $teacher->picture = $request['picture'];
        $teacher->full_name = $request['full_name'];
        $teacher->birthplace = $request['birthplace'];
        $teacher->dateplace = $request['dateplace'];
        $teacher->address = $request['address'];
        $teacher->studies = $request['studies'];
        $teacher->histories = $request['histories'];
        $teacher->save();

        if ($teacher->save() && $user->save()) {
            $notification = array(
                'message' => 'Data '.$teacher->full_name.' berhasil ditambahkan !', 
                'alert-type' => 'success'
            );
            return redirect()->route('teacher')->with($notification);
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }
    public function edit($id) {
        $teacher = Teacher::where('id', $id)->first();
        return view('admin.teacher.edit', compact('teacher'));
    } 
    public function update(Request $request, $id) {

        $teacher = Teacher::findOrFail($id);
        $teacher->picture = $request['picture'];
        $teacher->full_name = $request['full_name'];
        $teacher->birthplace = $request['birthplace'];
        $teacher->dateplace = $request['dateplace'];
        $teacher->address = $request['address'];
        $teacher->studies = $request['studies'];
        $teacher->histories = $request['histories'];
        $teacher->save();

        if ($teacher->save() ) {
            $notification = array(
                'message' => 'Data '.$teacher->full_name.' berhasil diubah !', 
                'alert-type' => 'info'
            );
            return redirect()->route('teacher')->with($notification);
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    public function detail($id){
        $teacher = Teacher::with('booksDetail.book')->where('id', $id)->first();
        $books = Book::all();

        // return $teacher;
        return view('admin.teacher.detail', compact('teacher', 'books'));
    }
    public function destroy($id){
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        $user  = User::findOrFail($teacher->user_id);
        $user->delete();
        $notification = array(
            'message' => 'Data '.$teacher->full_name.' berhasil dihapus !', 
            'alert-type' => 'warning'
        );
        return redirect()->route('teacher')->with($notification);

    }

    public function addBooks(Request $request, $guruId){
        $request->validate([
            'book_id' => 'required',
        ]);
        $book = new Teacherbook;
        $book->teacher_id = $guruId;
        $book->book_id = $request->book_id;
        $book->save();
        if ($book->save()) {
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors();
        }
        
    }

    public function destroyBook($id) {
        $book = Teacherbook::find($id);
        $book->delete();
        return redirect()->back();
    }
    
}
