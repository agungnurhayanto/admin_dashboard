<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Validator;
use Exception;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::latest()->paginate(5);
        return view('dashboard.pages', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pages_judul' => 'required',
            'pages_konten' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('pages')
                ->withErrors($validator)
                ->with('error', 'Ada salah satu inputan yang kelewat !!')
                ->withInput();
        }
        try {
            $form = new Pages();
            $form->pages_judul = $request->pages_judul;
            $form->pages_slug = Str::slug($request->input('pages_judul'));
            $form->pages_konten = $request->pages_konten;
            $form->save();

            return redirect('pages')->with(
                'success',
                'Pages berhasil Di tambahkan'
            );
        } catch (\Exception $e) {
            return redirect('pages')->with('error', '' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        $pages = Pages::find($id);
        if ($pages) {
            $pages->delete();
            return redirect('pages')->with(
                'success',
                'Pages Berhasil di hapus'
            );
        } else {
            return redirect('pages')->with('error', 'Pages Tidak di temukan');
        }
    }

    public function update(Request $request, $id)
    {
        //form validasi
        $validator = Validator::make($request->all(), [
            'pages_judul' => 'required',
            'pages_konten' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        try {
            $pages = Pages::findOrFail($id);

            $pages->pages_judul = $request->pages_judul;
            $pages->pages_slug = Str::slug($request->input('pages_judul'));
            $pages->pages_konten = $request->pages_konten;
            $pages->save();

            return redirect()
                ->route('pages.index', $id)
                ->with('success', 'Pages berhasil diubah');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Pages gagal diubah: ' . $e->getMessage());
        }
    }
}
