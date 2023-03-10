<div class="modal fade" id="modalTambahArtikel" tabindex="-1" aria-labelledby="modalTambahArtikel" aria-hidden="true">
    <div class="modal-dialog text-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM CATEGORY-->
                <form action="{{ '/artikel/store' }}" method="post">
@csrf
                    {{ method_field('POST') }}
                    <div class="form-group">
                        <label for="">Judul Artikel</label>
                        <input type="text" class="form-control" id="artikel_judul" name="artikel_judul"
                            aria-describedby="emailHelp">
                        @if ($errors->has('artikel'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('artikel') }}</strong>
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
