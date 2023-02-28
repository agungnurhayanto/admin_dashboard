@extends('layouts.main')
@section('pengguna')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Pengguna
                <small>Pengguna Website</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#" class="btn btn-sm btn-primary">Buat pengguna baru</a>
                    <br />
                    <br />
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Pengguna</h3>
                        </div>
                        <div class="box-body">
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

                                    <tr>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>#</td>
                                        <td>
                                            #
                                        </td>
                                        <td>
                                            <a href="#"> <i class="fa fa-pencil"></i> </a>
                                            <a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i>
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

@endsection
@section('title', 'Web Company Profile')
