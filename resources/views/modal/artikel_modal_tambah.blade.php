<div class="modal fade" id="modalTambahArtikel" tabindex="-1" aria-labelledby="modalTambahArtikel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/article/store" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="artikel_judul" class="form-control"
                                placeholder="Masukkan judul artikel.." value="{{ old('artikel_judul') }}">
                            @error('artikel_judul')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Konten</label>
                            <br />
                            <textarea class="form-control" id="editor_tambah" name="artikel_konten">{!! old('artikel_konten') !!}</textarea>
                            @error('artikel_konten')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="category">
                                        <option value="">- Pilih Kategori</option>
                                        @foreach ($kategori as $k)
                                            <option {{ old('category') == $k->id ? 'selected' : '' }}
                                                value="{{ $k->id }}">{{ $k->kategori_nama }}</option>
                                        @endforeach
                                    </select>

                                    <br />
                                    <div class="form-group">
                                        <label>Gambar Sampul</label>
                                        <input type="file" name="artikel_sampul">
                                        @if (isset($gambar_error))
                                            {{ $gambar_error }}
                                        @endif

                                        {{ $errors->first('artikel_sampul') }}

                                    </div>
                                    <br />
                                    <input type="submit" name="artikel_status" value="Draft"
                                        class="btn btn-warning btn-block">
                                    <input type="submit" name="artikel_status" value="Publish"
                                        class="btn btn-success btn-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor_tambah');
    </script>
