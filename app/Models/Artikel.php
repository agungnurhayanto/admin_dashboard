<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $fillable = [
        'id',
        'artikel_tanggal',
        'artikel_judul',
        'artikel_slug',
        'artikel_konten',
        'artikel_sampul',
        'artikel_author',
        'artikel_kategori',
        'artikel_status',
    ];

    public function slug()
    {
        return Str::slug($this->artikel_slug);
    }

    /* public function category()
    {
        return $this->belongsTo(Category::class, 'id');
    } */
}
