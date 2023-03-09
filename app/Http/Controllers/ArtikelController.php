<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Validator;
use Exception;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::latest()->paginate(5);
        return view('dashboard.article', ['artikel' => $artikel]);
    }
}
