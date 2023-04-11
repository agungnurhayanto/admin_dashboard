<div class="modal fade" id="modalTambahPengguna" tabindex="-1" aria-labelledby="modalTambahPengguna" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM PENGGUNA-->
                <form action="/pages/store" method="post">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            aria-describedby="nameHelp">
                        @if ($errors->has('name'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            aria-describedby="emailHelp" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="usernameHelp">
                        @if ($errors->has('username'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                            placeholder="Masukkan password pengguna..">
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="user_level">
                            <option value="">- Pilih Level -</option>
                            <option value="admin">Admin</option>
                            <option value="penulis">Penulis</option>
                        </select>
                        @if ($errors->has('level'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('user_level') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="user_status">
                            <option value="">- Pilih Status -</option>
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                        @if ($errors->has('status'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('user_status') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                <!--END FORM TAMBAH PENGGUNA-->
            </div>
        </div>
    </div>
</div>
