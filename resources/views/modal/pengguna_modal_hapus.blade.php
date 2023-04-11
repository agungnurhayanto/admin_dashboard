@foreach ($pengguna as $p)
    <div class="modal fade" id="delete{{ $p->id }}" tabindex="-2" aria-labelledby="modalHapusPengguna"
        aria-hidden="true">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--FORM PENGGUNA-->
                    <form method="get" action="{{ url('/pengguna/destroy/' . $p->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group mb-3">
                            <label>Nama Pengguna / User</label>
                            <p>{{ $p->name }}</p>

                        </div>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                    <!--END FORM HAPUS PENGGUNA-->
                </div>
            </div>
        </div>
    </div>
@endforeach
