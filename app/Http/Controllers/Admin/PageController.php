<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($id){
        $book = Book::findOrFail($id);
        $pages = Page::where('book_id', $book['id'])->orderBy('page_number')->get();
        return view('admin.page.index', compact('pages', 'book'));
    }
    public function create($id){
        $book = Book::findOrFail($id);
        $pages = Page::where('book_id', $book['id'])->orderBy('page_number')->get();
        return view('admin.page.create', compact('pages', 'book'));
    }

    public function store(Request $request,$id){
        $book = Book::findOrFail($id);
        $validated = $request->validate([
            'page_number' => ['required', 'integer'],
            'page_content' => ['required', 'string'],
        ]);
        $validated['book_id'] = $book->id;
        Page::create($validated);

        return redirect()->route('admin.book.pages', $book->id)->with('success', 'Шинээр хуудас амжилттай нэмлээ');
    }
    public function destroy($id){
        $page = Page::findOrFail($id);
        $book = Book::where('id',$page['book_id'])->first();
        $page -> delete();
        return redirect()->route('admin.book.pages', $book->id)->with('success', 'Хуудас амжилттай устгагдлаа');
    }
}
