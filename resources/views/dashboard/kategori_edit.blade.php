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
                    <a href="#" class="btn btn-sm btn-primary">Tambah Kategori</a>
                    <br />
                    <br />
                    <div class="card col-md-6">
                        <div class="card-header">
                            <h3 class="box-title">Kategori</h3>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-body">
                                    Edit Kategori
                                    <a href="{{ url('/kategori') }}" class="float-right btn btn-success btn-sm">
                                        Kembali</a>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">

                                            <form method="post" action="{{ url('/kategori/update/' . $kategori->id) }}">
                                                @csrf
                                                {{ method_field('PUT') }}
                                                <div class="form-group mb-3">

                                                    <label>Nama Kategori</label>
                                                    <input type="text" name="kategori" class="form-control"
                                                        value="{{ $kategori->kategori_nama }}">
                                                    @if ($errors->has('kategori'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('kategori') }}</strong>
                                                        </span>
                                                    @endif

                                                </div>
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </table>
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
