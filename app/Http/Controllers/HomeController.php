<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $books = Book::latest()->paginate(12);
        $categories = Category::all();
        $pages = Page::all();
        return view('home', compact('books','categories','pages'));
    }
    public function all(){
        $books = Book::latest()->paginate(30);
        $categories = Category::all();
        $pages = Page::all();
        return view('books', compact('books','categories','pages'));
    }
    public function search(Request $request){
        $validated = $request->validate([
            'search' => 'required',
        ]);
        $books = Book::where('title', 'like', "%{$validated['search']}%")->paginate(30);
        $categories = Category::all();
        return view('books', compact('books','categories'));
    }
    public function filter(Request $request){
        $category = $request->input('category_id');
        $books = Book::where('category_id', $category)->latest()->paginate(30);
        $categories = Category::all();
        return view('books', compact('books','categories'));
    }
}
