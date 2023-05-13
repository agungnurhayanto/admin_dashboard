@extends('layouts.main')

@section('container')
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
                    <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-article">Tambah Artikel</a>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Artikel</h3>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Artikel</th>
                                                <th>Author</th>
                                                <th>Kategori</th>
                                                <th width="10%">Gambar</th>
                                                <th>Status</th>
                                                <th width="15%">OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-artikel">
                                            @foreach ($artikel as $a)
                                                <tr id="index_{{ $a->id }}">
                                                    <td>{{ date('d/m/Y H:i', strtotime($a->artikel_tanggal)) }}</td>
                                                    <td>
                                                        {{ $a->artikel_judul }}
                                                        <br />
                                                        <small class="text-muted">
                                                            {{ url('') . '/' . $a->artikel_slug }}
                                                        </small>
                                                    </td>
                                                    <td>{{ $a->user_id }}</td>
                                                    <td>{{ $a->category ? $a->category->kategori_nama : '' }}</td>
                                                    <td>
                                                        @if ($a->artikel_sampul)
                                                            <img width="100%" class="img-responsive"
                                                                src="{{ url('') . '/gambar/artikel/' . $a->artikel_sampul }}">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($a->artikel_status == 'publish')
                                                            <span class='badge bg-success'>Publish</span>
                                                        @else
                                                            <span class='badge bg-danger'>Draft</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-success btn-sm"> <i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                                            data-target="#edit{{ $a->id }}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" id="btn-delete-article"
                                                            data-id="{{ $a->id }}" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-trash"></i></a>
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
            </div>
        </section>
    </div>
    @include('modal.article_tambah')
@endsection

@section('title', 'Web Company Profile')
