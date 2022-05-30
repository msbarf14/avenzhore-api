<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BookGenre;
use App\Book;
class BookController extends Controller
{
    // book section
    public function index(){
        $data = Book::with('genre')->latest()->get();
        $genreCount = BookGenre::count();
        
        // return $genreCount;
        // return $data;
        return view('admin.book.index', compact('data', 'genreCount'));
    }
  
    public function createBuku(){
        $genre = BookGenre::all();
        return view('admin.book.create', compact('genre'));
    }
    public function storeBook(Request $request) {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'picture' => 'required'
        ]);
        $book = new Book;
        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->author = $request->author;
        $book->des = $request->des;
        $book->genre_id = $request->genre_id;
        $book->picture = $request->picture;
        $book->save();
        if ($book->save()) {
            return redirect()->route('admin.book');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
        
    }

    public function editBuku($id){
        $genre = BookGenre::all();
        $book = Book::find($id);
        return view('admin.book.edit', compact('book', 'genre'));
    }
    public function updateBuku(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'picture' => 'required'
        ]);
        $book = Book::find($id);
        $book->title = $request->title;
        $book->synopsis = $request->synopsis;
        $book->author = $request->author;
        $book->des = $request->des;
        $book->genre_id = $request->genre_id;
        $book->picture = $request->picture;
        $book->save();
        if ($book->save()) {
            return redirect()->route('admin.book');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
        
    }
    public function destroyBook($id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->back();
    }
    
    // genre section 
    public function indexGenre(){
        $data = BookGenre::all();
        return view('admin.book.genre.index', compact('data'));
    }
    public function createGenre(){
        return view('admin.book.genre.create');
    }
    public function storeGenre(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $genre = new BookGenre;
        $genre->name = $request->name;
        $genre->save();

        if ($genre->save()) {
            return redirect()->route('admin.genre');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    public function editGenre($id){
        $data = BookGenre::find($id);
        return view('admin.book.genre.edit', compact('data'));
    }
    public function updateGenre(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);

        $genre =  BookGenre::find($id);
        $genre->name = $request->name;
        $genre->save();

        if ($genre->save()) {
            return redirect()->route('admin.genre');
        } else {
            return redirect()->back()->withErrors()->withInput();
        }
    }

    public function destroyGenre($id){
        $data = BookGenre::find($id);
        $data->delete();
        return redirect()->back();
    }
    // public function index(){}
}
