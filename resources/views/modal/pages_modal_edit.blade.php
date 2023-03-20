@foreach ($pages as $p)
    <div class="modal fade" id="edit{{ $p->id }}" tabindex="-1" aria-labelledby="modalEditPages" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/pages/update/' . $p->id) }}" method="post">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="pages_judul" class="form-control"
                                    placeholder="Masukkan judul Pages.." value="{{ $p->pages_judul }}">
                                @error('pages_judul')
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
                                <textarea class="form-control" id="editor_edit{{ $p->id }}" name="pages_konten" required>{{ $p->pages_konten }}</textarea>
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
    </div>
    <script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor_edit{{ $p->id }}');
    </script>
@endforeach
