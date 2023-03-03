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
                    <a href="#" class="btn btn-sm btn-primary">Buat artikel baru</a>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Artikel</h3>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-body">

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

                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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
                                            </tbody>
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
