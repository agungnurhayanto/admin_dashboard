<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Validator;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::latest()->paginate(5);
        // $students = Student::latest()->paginate(5)
        return view('dashboard.kategori', ['kategori' => $kategori]);
    }

    public function kategori_hapus($id)
    {
        $kategori = Category::find($id)->delete();

        return redirect('kategori')->with(
            'success',
            'Kategori berhasil dihapus'
        );
    }

    public function kategori_edit($id)
    {
        $kategori = Category::find($id);
        return view('dashboard.kategori_edit', ['kategori' => $kategori]);
    }

    public function create()
    {
        return view('dashboard.kategori_create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kategori_nama' => 'required|min:2|unique:category',
            ]);

            Category::create([
                'kategori_nama' => $request->kategori_nama,
                'kategori_slug' => Str::slug($request->input('kategori_nama')),
            ]);

            return redirect('kategori')->with(
                'success',
                'Kategori berhasil Di tambahkan'
            );
        } catch (\Exception $e) {
            return redirect('kategori')->with('error', '' . $e->getMessage());
        }
    }

    public function kategori_update($id, Request $data)
    {
        //form validasi

        try {
            $data->validate([
                'kategori_nama' => 'required|min:2|unique:category',
            ]);

            $nama_kategori = $data->kategori_nama;
            //update kategori
            $kategori = Category::find($id);
            $kategori->kategori_nama = $nama_kategori;
            $kategori->kategori_slug = Str::slug($nama_kategori);
            $kategori->save();

            return redirect('/kategori')->with(
                'sukses',
                'Kategori berhasil diubah'
            );
        } catch (\Exception $e) {
            return redirect('kategori')->with(
                'error',
                'Nama Kategori tidak boleh sama: ' . $e->getMessage()
            );
        }
    }
}
