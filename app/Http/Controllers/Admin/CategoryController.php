<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(CategoryRequest $request){
        $validated = $request->validated();
        Category::create($validated);

        return redirect()->route('admin.category')->with('success', 'Шинээр төрөл амжилттай нэмлээ');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $validated = $request->validated();
        $category->update($validated);
        return redirect()->route('admin.category')->with('success', 'Төрөл амжилттай шинэчлэгдлээ');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category -> delete();
        return redirect()->route('admin.category')->with('success', 'Төрөл амжилттай устгагдлаа');
    }
}
