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

    public function kategori_hapus($id){

        $kategori = Category::find($id)->delete();

        return redirect('kategori')->with("sukses","Kategori berhasil dihapus");
    }

    public function kategori_edit($id){
        $kategori = Category::find($id);
        return view('dashboard.kategori_edit',['kategori' => $kategori]);
    }

     public function kategori_update($id, Request $data)

    {
    //form validasi
        $data->validate([
        'kategori_nama' => 'required'
        ]);

        $nama_kategori = $data->kategori_nama;
        //update kategori
        $kategori = Category::find($id);
        $kategori->kategori_nama = $nama_kategori;
        $kategori->save();

        return redirect('/kategori')->with("sukses","Kategori berhasil diubah");
        }
}
