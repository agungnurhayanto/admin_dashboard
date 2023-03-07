<div class="modal fade" id="modalTambahCategory" tabindex="-1" aria-labelledby="modalTambahCategory" aria-hidden="true">
    <div class="modal-dialog text-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM CATEGORY-->
                <form action="{{ '/kategori/store' }}" method="post">
                    @csrf
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="">Nama Category</label>
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama"
                            aria-describedby="emailHelp">
                        @if ($errors->has('kategori'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('kategori') }}</strong>
                            </span>
                        @endif

                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>
                <!--END FORM TAMBAH CATEGORY-->
            </div>
        </div>
    </div>
</div>
