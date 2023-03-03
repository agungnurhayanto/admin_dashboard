@extends('layouts.main')
@section('pages')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Pages
                <small>Manajemen Halaman Website</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#" class="btn btn-sm btn-primary">Buat halaman baru</a>
                    <br />
                    <br />
                    <div class="card">
                        <div class="card-header">
                            <h3 class="box-title">Pages</h3>
                        </div>
                        <div class="card-body">
                            <div class="box box-primary">
                                <div class="box-header">
                                </div>
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="1%">NO</th>
                                                <th>Judul Halaman</th>
                                                <th>URL Slug</th>
                                                <th width="15%">OPSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>#</td>
                                                <td>#</td>
                                                <td>#</td>
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
        </section>
    </div>
    </div>
    </div>
@endsection

@section('title', 'Web Company Profile')
