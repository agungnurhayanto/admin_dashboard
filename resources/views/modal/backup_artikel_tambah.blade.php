    <div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="modalTambahArtikel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-tambah-artikel" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input id="artikel-judul" type="text" name="artikel_judul" class="form-control"
                                    placeholder="Masukkan judul artikel.." value="{{ old('artikel_judul') }}">
                                @error('artikel_judul')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_judul">
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Konten</label>
                                <br />
                                <textarea class="form-control artikel-konten" name="artikel_konten" id="artikel-konten">{!! old('artikel_konten') !!}</textarea>
                                @error('artikel_konten')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-artikel_konten">
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control" name="category" id="category-item">
                                            <option value="">- Pilih Kategori</option>
                                            @foreach ($kategori as $k)
                                                <option {{ old('category') == $k->id ? 'selected' : '' }}
                                                    value="{{ $k->id }}">{{ $k->kategori_nama }}</option>
                                            @endforeach
                                        </select>
                                        <div class="alert alert-danger mt-2 d-none" role="alert"
                                            id="alert-artikel_category">
                                            <br />
                                            <div class="form-group">
                                                <label>Gambar Sampul</label>
                                                <input type="file" name="artikel_sampul" id="artikel-sampul">
                                                @if (isset($gambar_error))
                                                    {{ $gambar_error }}
                                                @endif

                                                {{ $errors->first('artikel_sampul') }}
                                                <div class="alert alert-danger mt-2 d-none" role="alert"
                                                    id="alert-artikel_sampul">
                                                </div>
                                                <br />
                                                {{--  <input type="button" name="artikel_status" value="Draft"
                                            class="btn btn-warning btn-block" id="store-artikel-draft">
                                        <input type="button" name="artikel_status" value="Publish"
                                            class="btn btn-success btn-block" id="store-artikel">  --}}


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button> -->
                                    <button type="button" class="btn btn-primary" id="store-artikel"
                                        value="draft">DRAFT</button>
                                    <button type="button" class="btn btn-primary" id="store-artikel"
                                        value="publish">PUBLISH</button>
                                </div>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('artikel-konten');

        // menambahkan id secara dinamis pada elemen textarea
        var editorTextarea = document.querySelector('.artikel-konten');
        var editorId = 'editor-' + Math.floor(Math.random() * 100000);
        editorTextarea.id = editorId;
    </script>
