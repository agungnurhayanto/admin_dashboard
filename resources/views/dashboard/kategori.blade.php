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
                    <button type="button" class="btn btn-success float-left mb-1" data-toggle="modal"
                        data-target="#modalTambahCategory">Buat Category Baru</button>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Kategori Article</h3>
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
                                                            <a href="#" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $k->id }}">
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
    @include('modal.category_modal_tambah')
    @include('modal.category_modal_edit')
    @include('modal.category_modal_hapus')
@endsection
@section('title', 'Web Company Profile')
