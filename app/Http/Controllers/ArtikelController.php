<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Pagination\Paginator;

class ArtikelController extends Controller
{
    public function index()
    {
        /*  $artikel = Artikel::join(
            'category',
            'artikel.artikel_kategori',
            '=',
            'category.id'
        )
            ->select('*')
            ->orderByDesc('artikel.id')
            ->paginate(10); */

        /*  $artikel = Artikel::with([
            'category' => function ($query) {
                $query->select('id', 'kategori_nama');
            },
        ])
            ->orderByDesc('id')
            ->paginate(10); */
        $artikel = Artikel::latest()->paginate(5);
        $kategori = Category::all();
        return view('dashboard.article', [
            'artikel' => $artikel,
            'kategori' => $kategori,
        ]);
    }

    public function artikel_hapus($id)
    {
        $artikel = Artikel::find($id);
        if ($artikel) {
            $artikel->delete();
            return redirect('article')->with(
                'success',
                'Artikel berhasil dihapus'
            );
        } else {
            return redirect('article')->with(
                'error',
                'Artikel tidak ditemukan'
            );
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artikel_judul' => 'required',
            'artikel_kategori' => 'required',
            'artikel_status' => 'required',
            'artikel_konten' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('article')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $form = new Artikel();
            $form->artikel_tanggal = date('Y-m-d H:i:s');
            $form->artikel_judul = $request->artikel_judul;
            $form->artikel_slug = Str::slug($request->input('artikel_judul'));
            $form->artikel_konten = $request->artikel_konten;
            if ($request->hasFile('artikel_sampul')) {
                $file = $request->file('artikel_sampul');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('gambar/artikel'), $fileName);
                $form->artikel_sampul = $fileName;
            }
            $form->artikel_author = 1;
            $form->artikel_kategori = $request->artikel_kategori;
            $form->artikel_status = $request->artikel_status;
            $form->save();

            return redirect('article')->with(
                'success',
                'Article berhasil Di tambahkan'
            );
        } catch (\Exception $e) {
            return redirect('article')->with('error', '' . $e->getMessage());
        }
    }
}
