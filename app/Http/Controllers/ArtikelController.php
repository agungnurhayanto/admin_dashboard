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

    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $gambar = $artikel->artikel_sampul; // ambil nama gambar dari database
        $artikel->delete();

        // hapus file gambar dari folder gambar/artikel jika ada
        if ($gambar && file_exists(public_path('gambar/artikel/' . $gambar))) {
            unlink(public_path('gambar/artikel/' . $gambar));
        }

        return response()->json([
            'success' => true,
            'message' => 'Artikel berhasil dihapus!!!',
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'artikel_judul' => 'required',
            'artikel_konten' => 'required',
            'artikel_kategori' => 'required',
            'artikel_status' => 'required',
            'artikel_sampul' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' =>
                    'Gagal menyimpan data, silakan lengkapi semua isian yang diperlukan!',
                'errors' => $validator->errors(),
            ]);
        }

        $artikel = new Artikel();
        $artikel->category_id = $request->artikel_kategori;
        $artikel->user_id = 1;
        $artikel->artikel_tanggal = date('Y-m-d H:i:s');
        $artikel->artikel_judul = $request->artikel_judul;
        $artikel->artikel_slug = Str::slug($request->input('artikel_judul'));
        $artikel->artikel_konten = $request->artikel_konten;
        $artikel->artikel_status = $request->artikel_status;

        if ($request->hasFile('artikel_sampul')) {
            $validator = Validator::make($request->all(), [
                'artikel_sampul' =>
                    'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' =>
                        'Gagal menyimpan data, file yang diupload harus berformat jpeg, png, jpg, gif, svg dan ukurannya tidak boleh melebihi 5 MB!',
                    'errors' => $validator->errors(),
                ]);
            }

            $file = $request->file('artikel_sampul');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar/artikel'), $fileName);
            $artikel->artikel_sampul = $fileName;
        }

        $artikel->save();

        if (!$artikel) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data, terjadi kesalahan!',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan!',
            'data' => $artikel,
        ]);
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
