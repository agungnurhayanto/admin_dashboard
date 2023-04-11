@extends('layouts.main')
<!-- Content Wrapper. Contains page content -->
@section('pengguna')
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
                        data-target="#modalTambahPengguna">Tambah Pengguna Baru</button>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Pengguna</h3>
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
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Username</th>
                                                    <th>Level</th>
                                                    <th>Status</th>
                                                    <th width="10%">OPSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($pengguna as $p)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $p->name }}</td>
                                                        <td>{{ $p->email }}</td>
                                                        <td>{{ $p->username }}</td>
                                                        <td>{{ $p->user_level }}</td>
                                                        <td>{{ $p->user_status == 1 ? 'Aktif' : 'Non Aktif' }}</td>

                                                        <td>
                                                            <a href="#" class="btn btn-warning btn-sm"
                                                                data-toggle="modal" data-target="#edit{{ $p->id }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $p->id }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @if ($pengguna->hasPages())
                                            <div class="card-footer">
                                                {{ $pengguna->links() }}
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
    @include('modal.pengguna_modal_tambah')
    @include('modal.pengguna_modal_hapus')

@endsection
@section('title', 'Web Company Profile')
