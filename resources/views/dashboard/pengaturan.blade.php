@extends('layouts.main')
@section('pengguna')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Pengaturan
                <small>Update Pengaturan Website</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title"></h3>
                        </div>
                        <div class="box-body">
                            <form method="post" action="#" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Nama Website</label>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan nama website.." value="#">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Website</label>
                                        <input type="text" name="deskripsi" class="form-control"
                                            placeholder="Masukkan deskripsi .." value="#">

                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Logo Website</label>
                                        <input type="file" name="logo">
                                        <small>Kosongkan jika tidak ingin mengubah logo</small>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Link Facebook</label>
                                        <input type="text" name="link_facebook" class="form-control"
                                            placeholder="Masukkan link facebook .." value="#">

                                    </div>

                                    <div class="form-group">
                                        <label>Link Twitter</label>
                                        <input type="text" name="link_twitter" class="form-control" </div>

                                        <div class="form-group">
                                            <label>Link Instagram</label>
                                            <input type="text" name="link_instagram" class="form-control"
                                                placeholder="Masukkan link_instagram .." value="#">

                                        </div>

                                        <div class="form-group">
                                            <label>Link Github</label>
                                            <input type="text" name="link_github" class="form-control"
                                                placeholder="Masukkan link_github .." value="#">

                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-success" value="Simpan">
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
