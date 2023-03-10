<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::latest()->paginate(5);
        $kategori = Category::all();
        return view('dashboard.article',['artikel' => $artikel, 'kategori' => $kategori]);
    }
}
