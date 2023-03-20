<div class="modal fade" id="modalTambahPages" tabindex="-1" aria-labelledby="modalTambahPages" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pages</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pages/store" method="post">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="pages_judul" class="form-control"
                                placeholder="Masukkan judul pages.." value="{{ old('pages_judul') }}">
                            @error('pages_judul')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Pages Konten</label>
                            <br />
                            <textarea class="form-control" id="editor_tambah" name="pages_konten">{!! old('pages_konten') !!}</textarea>
                            @error('pages_konten')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor_tambah');
    </script>
