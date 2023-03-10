@extends('layouts.main')
@section('article')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Artikel
                <small>Manajemen Artikel</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success  float-left mb-1" data-toggle="modal"
                        data-target="#modalTambahArtikel">Buat Artikel Baru</button>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Artikel</h3>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-body">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success') }}

                                        </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error') }}

                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="1%">NO</th>
                                                    <th>Tanggal</th>
                                                    <th>Artikel</th>
                                                    <th>Author</th>
                                                    <th>Kategori</th>
                                                    <th width="10%">Gambar</th>
                                                    <th>Status</th>
                                                    <th width="15%">OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($artikel as $a)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $a->artikel_tanggal }}</td>
                                                        <td>{{ $a->artikel_judul }}</td>
                                                        <td>{{ $a->artikel_author }}</td>
                                                        <td>{{ $a->artikel_kategori }}</td>
                                                        <td>{{ $a->artikel_sampul }}</td>
                                                        <td>{{ $a->artikel_status }}</td>
                                                        <td><img width="100%" class="img-responsive" src="#"></td>
                                                        <td>

                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-success btn-sm"> <i
                                                                    class="fa fa-eye"></i></a>

                                                            <a href="#" class="btn btn-warning btn-sm"> <i
                                                                    class="fa fa-edit"></i>
                                                            </a>

                                                            <a href="#" class="btn btn-danger btn-sm"> <i
                                                                    class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if ($artikel->hasPages())
                                            <div class="card-footer">
                                                {{ $artikel->links() }}
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
        </section>
    </div>
    </div>
    </div>
    @include('modal.artikel_modal_tambah')
@endsection
@section('title', 'Web Company Profile')
