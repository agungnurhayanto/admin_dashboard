<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    public function index(){
        $kategori = Category::latest()->paginate(5);
       // $students = Student::latest()->paginate(5)
        return view('dashboard.kategori',['kategori' => $kategori]);
    }
}
