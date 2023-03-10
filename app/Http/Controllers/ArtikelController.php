<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Pagination\Paginator;
use Validator;
use Exception;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->paginate(5);
        $kategori = Category::all();
        return view('dashboard.article', [
            'artikel' => $artikel,
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'artikel_judul' => 'required|min:2|artikel',
                'artikel_slug' => 'required',
                'artikel_konten' => 'required',
                'artikel_kategori' => 'required',
                'artikel_status' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect('article')
                    ->withErrors($validator)
                    ->withInput();
            }

            $artikel = Artikel::create([
                'artikel_judul' => $request->artikel_judul,
                'artikel_slug' => Str::slug($request->input('artikel_judul')),
                'artikel_konten' => $request->artikel_konten,
                'artikel_sampul' => 1,
                'artikel_author' => 1,
                'artikel_kategori' => $request->artikel_kategori,
                'artikel_status' => $request->artikel_status,
            ]);

            return redirect('article')->with(
                'success',
                'Article berhasil Di tambahkan'
            );
        } catch (\Exception $e) {
            return redirect('article')->with('error', '' . $e->getMessage());
        }
    }
}
