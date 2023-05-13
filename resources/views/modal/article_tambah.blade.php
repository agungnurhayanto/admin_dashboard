<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH ARTIKEL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="control-label">Artikel Judul</label>
                    <input type="text" class="form-control" id="artikel_judul">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_judul"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Artikel konten</label>
                    <textarea class="form-control artikel-konten" name="artikel_konten" id="konten">{!! old('artikel_konten') !!}</textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_konten"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Category Artikel</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">- Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option {{ old('category') == $k->id ? 'selected' : '' }} value="{{ $k->id }}">
                                {{ $k->kategori_nama }}</option>
                        @endforeach
                    </select>

                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_kategori"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Artikel Status</label>
                    <select class="form-control" name="artikel_status" id="artikel_status">
                        <option value="">- Pilih Kategori</option>
                        <option value="Publish">- Publish</option>
                        <option value="Draft">- Draft</option>
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_status"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Gambar Artikel</label>
                    <input type="file" name="artikel_sampul" id="artikel_sampul">
                    @if (isset($gambar_error))
                        {{ $gambar_error }}
                    @endif

                    {{ $errors->first('artikel_sampul') }}
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_sampul">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store-artikel">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>


<script>
    // mengambil element modal-dialog dengan class modal-lg
    var modalDialog = document.querySelector('.modal-lg');
    // mencari textarea dengan class artikel-konten di dalam modal-dialog
    var editorTextarea = modalDialog.querySelector('.artikel-konten');
    // menambahkan id secara dinamis pada elemen textarea
    var editorId = 'editor-' + Math.floor(Math.random() * 100000);
    editorTextarea.id = editorId;
    // mengganti textarea dengan CKEditor
    CKEDITOR.replace(editorId);
</script>
