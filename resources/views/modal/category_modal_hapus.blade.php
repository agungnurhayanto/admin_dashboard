@foreach ($kategori as $k)
<div class="modal fade" id="delete{{ $k->id }}" tabindex="-1" aria-labelledby="modalHapusCategory" aria-hidden="true">
    <div class="modal-dialog text-center">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM CATEGORY-->
                <form method="get" action="{{ url('/kategori/hapus/' . $k->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group mb-3">
                        <label>Nama Kategori</label>
                        <p>{{ $k->kategori_nama }}</p>

                    </div>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </form>
                <!--END FORM TAMBAH CATEGORY-->
            </div>
        </div>
    </div>
</div>
@endforeach