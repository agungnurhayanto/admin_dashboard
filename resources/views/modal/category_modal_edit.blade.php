@foreach ($kategori as $k)
    <div class="modal fade" id="edit1{{ $k->id }}" tabindex="-2" aria-labelledby="modalEditCategory"
        aria-hidden="true">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--FORM CATEGORY-->
                    <form method="post" action="{{ url('/kategori/update/' . $k->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group mb-3">

                            <label>Nama Kategori</label>
                            <input type="text" name="kategori_nama" class="form-control"
                                value="{{ $k->kategori_nama }}">
                            @if ($errors->has('kategori'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('kategori') }}</strong>
                                </span>
                            @endif

                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </form>
                    <!--END FORM EDIT CATEGORY-->
                </div>
            </div>
        </div>
    </div>
@endforeach
