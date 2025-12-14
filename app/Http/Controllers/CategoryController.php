<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // READ: Menampilkan semua kategori
    public function index()
{
    $categories = Category::all(); // Mendapatkan semua kategori
    return view(view: 'categories.index', data: compact(var_name: 'categories'));
}

    // CREATE: Form tambah kategori (untuk view)
    public function create()
    {
        return view('categories.create');
    }

    // STORE: Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Category added successfully', 'data' => $category], 201);
    }

    // READ: Menampilkan detail kategori
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    // UPDATE: Form edit kategori (untuk view)
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // UPDATE: Update kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Category updated successfully', 'data' => $category], 200);
    }

    // DELETE: Hapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}