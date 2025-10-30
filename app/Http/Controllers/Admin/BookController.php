<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        $categories = Category::all();
        return view('admin.book.index', compact('books', 'categories'));
    }

    public function create(){
        $books = Book::all();
        $categories = Category::all();
        return view('admin.book.create', compact('books', 'categories'));
    }

    public function store(BookRequest $request){
        $validated = $request->validated();
        if(request()->hasFile('cover')){
            $validated['cover'] = request()->file('cover')->store('images', 'public');
        }
        Book::create($validated);

        return redirect()->route('admin.book')->with('success', 'Шинээр ном амжилттай нэмлээ');
    }

    public function edit($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.book.edit', compact('book', 'categories'));
    }

    public function update(BookRequest $request, $id){
        $book = Book::findOrFail($id);
        $validated = $request->validated();
        if(request()->hasFile('cover')){
            $validated['cover'] = request()->file('cover')->store('images', 'public');
        }
        $book->update($validated);

        return redirect()->route('admin.book')->with('success', 'Ном амжилттай шинэчлэгдлээ');
    }

    public function destroy($id){
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.book')->with('success', 'Ном амжилттай устгагдлаа');
    }

    public function search(Request $request){
        $validated = $request->validate([
            'search' => 'required',
        ]);
        $books = Book::where('title', 'like', "%{$validated['search']}%")->get();

        return view('admin.book.index', compact('books'));
    }
}
