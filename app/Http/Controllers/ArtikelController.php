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
            'artikel_status' => 'required',
            'artikel_konten' => 'required',
            'artikel_sampul' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('article')
                ->withErrors($validator)
                ->with(
                    'error',
                    'Ada salah satu inputan yang kelewat !! Biasanya file gambar'
                )
                ->withInput();
        }
        try {
            $form = new Artikel();
            $form->artikel_tanggal = date('Y-m-d H:i:s');
            $form->category_id = $request->category;
            $form->user_id = 1;
            $form->artikel_judul = $request->artikel_judul;
            $form->artikel_slug = Str::slug($request->input('artikel_judul'));
            $form->artikel_konten = $request->artikel_konten;
            if ($request->hasFile('artikel_sampul')) {
                $file = $request->file('artikel_sampul');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('gambar/artikel'), $fileName);
                $form->artikel_sampul = $fileName;
            }
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

    public function update(Request $request, $id)
    {
        //form validasi
        $validator = Validator::make($request->all(), [
            'artikel_judul' => 'required',
            'artikel_konten' => 'required',
            'artikel_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $article = Artikel::findOrFail($id);
            $article->artikel_tanggal = date('Y-m-d H:i:s');
            $article->category_id = $request->category;
            $article->user_id = 1;
            $article->artikel_judul = $request->artikel_judul;
            $article->artikel_slug = Str::slug(
                $request->input('artikel_judul')
            );
            $article->artikel_konten = $request->artikel_konten;
            if ($request->hasFile('artikel_sampul')) {
                $file = $request->file('artikel_sampul');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('gambar/artikel'), $fileName);
                $article->artikel_sampul = $fileName;
            }
            $article->artikel_status = $request->artikel_status;
            $article->save();

            return redirect()
                ->route('article.index', $id)
                ->with('success', 'Article berhasil diubah');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Article gagal diubah: ' . $e->getMessage());
        }
    }
}
