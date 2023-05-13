<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::latest()->paginate(5);
        return view('dashboard.kategori', ['kategori' => $kategori]);
    }

    public function edit($id)
    {
        $kategori = Category::find($id);

        return response()->json([
            'data' => $kategori,
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $artikel = Artikel::where('category_id', $id);
        $artikel->delete();

        return response()->json([
            'success' => true,
            'message' =>
                'Kategori berhasil dihapus, beserta dengan artikel yang terkait!!!',
        ]);
    }

    public function create()
    {
        return view('dashboard.kategori_create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_nama' => 'required|min:2|unique:category',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' =>
                    'Gagal menyimpan data, nama kategori tidak boleh sama!',
                'errors' => $validator->errors(),
            ]);
        }

        $category = Category::create([
            'kategori_nama' => $request->kategori_nama,
            'kategori_slug' => Str::slug($request->input('kategori_nama')),
        ]);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' =>
                    'Gagal menyimpan data, nama kategori tidak boleh sama!',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan!',
            'data' => $category,
        ]);
    }

    public function show(Category $category)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data category',
            'data' => $category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori_nama' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = Category::findOrFail($id);

        $category->update([
            'kategori_nama' => $request->kategori_nama,
            'kategori_slug' => Str::slug($request->input('kategori_nama')),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data' => $category,
        ]);
    }
}
