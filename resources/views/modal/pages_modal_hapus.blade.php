@foreach ($pages as $p)
    <div class="modal fade" id="delete{{ $p->id }}" tabindex="-2" aria-labelledby="modalHapusPages"
        aria-hidden="true">
        <div class="modal-dialog text-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Pages</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--FORM PAGES-->
                    <form method="get" action="{{ url('/pages/destroy/' . $p->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="form-group mb-3">
                            <label>Judul Pages</label>
                            <p>{{ $p->pages_judul }}</p>

                        </div>
                        <button type="button" class="btn btn-warning" data-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                    <!--END FORM HAPUS PAGES-->
                </div>
            </div>
        </div>
    </div>
@endforeach
