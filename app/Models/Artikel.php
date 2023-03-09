<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = "artikel";
    protected $fillable = [
        "id",
        "artikel_tanggal", "artikel_judul", 'artikel_slug',
        'artikel_konten', 'artikel_sampul', 'artikel_author',
        'artikel_kategori', 'artikel_status'
    ];
}
