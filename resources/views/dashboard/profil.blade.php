@extends('layouts.main')
@section('container')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profil
                <small>Update Profil Pengguna</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Update Profil</h3>
                        </div>
                        <div class="box-body">
                            <form method="post" action="#">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan nama .." value="#">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="Masukkan email .." value="#" </div>
                                    </div>
                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-success" value="Update">
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('title', 'Web Company Profile')
