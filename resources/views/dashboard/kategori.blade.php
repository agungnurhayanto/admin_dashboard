@extends('layouts.main')
<!-- Content Wrapper. Contains page content -->
@section('kategori')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <small>Manajemen Kategori</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-warning float-left mb-1" data-toggle="modal"
                        data-target="#modalTambahCategory">Tambah Category</button>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Kategori</h3>

                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-body">
                                    @if (Session::has('sukses'))
                                        <div class="alert alert-success">
                                            {{ Session::get('sukses') }}
                                        </div>
                                    @endif

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="1%">NO</th>
                                                    <th>Kategori</th>
                                                    <th>Slug</th>
                                                    <th width="10%">OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($kategori as $k)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $k->kategori_nama }}</td>
                                                        <td>{{ $k->kategori_slug }}</td>

                                                        <td>
                                                            <a href="#" class="btn btn-warning btn-sm"
                                                                data-toggle="modal" data-target="#edit{{ $k->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ 'kategori/hapus/' . $k->id }}"
                                                                class="btn btn-danger btn-sm">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if ($kategori->hasPages())
                                            <div class="card-footer">
                                                {{ $kategori->links() }}
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


@endsection
@section('title', 'Web Company Profile')
