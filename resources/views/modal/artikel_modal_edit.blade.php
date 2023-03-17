@foreach ($artikel as $a)
    <div class="modal fade" id="edit{{ $a->id }}" tabindex="-1" aria-labelledby="modalEditArtikel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Artikel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/article/update/' . $a->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="artikel_judul" class="form-control"
                                    placeholder="Masukkan judul artikel.." value="{{ $a->artikel_judul }}">
                                @error('artikel_judul')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="editor_edit">Konten</label>
                                <br />
                                <textarea class="form-control" id="editor_edit" name="artikel_konten" required>{{ $a->artikel_konten }}</textarea>
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
                                                <option value="{{ $k->id }}"
                                                    {{ $a->category_id == $k->id ? 'selected' : '' }}>
                                                    {{ $k->kategori_nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor_edit');
</script>
