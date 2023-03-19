@extends('layouts.main')

@section('title', 'Web Company Profile')

@section('pages')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <small>Manajemen Pages</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success float-left mb-1" data-toggle="modal"
                        data-target="#modalTambahPages">Tambah Pages Baru</button>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Pages</h3>
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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%">NO</th>
                                                <th>Judul Pages</th>
                                                <th>Slug Pages</th>
                                                <th width="15%">OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($pages as $p)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $p->pages_judul }}</td>
                                                    <td>{{ $p->pages_slug }}</td>

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
                                    @if ($pages->hasPages())
                                        <div class="card-footer">
                                            {{ $pages->links() }}
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
@endsection
