<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pages extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $fillable = ['id', 'pages_judul', 'pages_slug', 'pages_konten'];

    public function slug()
    {
        return Str::slug($this->pages_slug);
    }
}
