@foreach ($kategori as $k)
    <div class="modal fade" id="delete{{ $k->id }}" tabindex="-2"
        aria-labelledby="modalHapusCategory{{ $k->id }}" aria-hidden="true">
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
                    <form method="delete" action="{{ url('/kategori/hapus/' . $k->id) }}">
                        @csrf
                        {{ method_field('delete') }}
                        <div class="form-group mb-3">
                            <h4 class="modal-title btn btn-danger">Peringatan!!, menghapus kategori juga akan menghapus
                                artikel kategori
                                yang di hapus</h4>
                            <label>Nama Kategori</label>
                            <h3>{{ $k->kategori_nama }}</h3>

                        </div>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                    <!--END FORM HAPUS CATEGORY-->
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($kategori as $k)
    <div class="modal fade" id="edit{{ $k->id }}" tabindex="-1"
        aria-labelledby="modalEditCategory{{ $k->id }}" aria-hidden="true">

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
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </form>
                    <!--END FORM EDIT CATEGORY-->
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="modal fade" id="modalTambahCategory" tabindex="-1" aria-labelledby="modalTambahCategoryLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--FORM CATEGORY-->

                <form method="post" action="{{ url('/kategori/store') }}">
                    @csrf

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
