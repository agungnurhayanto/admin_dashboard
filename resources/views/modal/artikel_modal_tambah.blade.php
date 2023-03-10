 @dd('artikel');
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
                 <div class="box-body">
                     <form action="{{ '/artikel/store' }}" method="post">
                         @csrf
                         {{ method_field('POST') }}
                         <div class="form-group">
                             <label>Judul</label>
                             <input type="text" name="artikel_judul" class="form-control"
                                 placeholder="Masukkan judul artikel..">
                             @if ($errors->has('artikel_judul'))
                                 <span class="text-danger">
                                     <strong>{{ $errors->first('message') }}</strong>
                                 </span>
                             @endif
                         </div>
                 </div>
                 <div class="box-body">
                     <div class="form-group">
                         <label>Konten</label>

                         <br />
                         <textarea class="form-control" id="editor" name="artikel_konten">  </textarea>
                         @if ($errors->has('artikel_konten'))
                             <span class="text-danger">
                                 <strong>{{ $errors->first('message') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>
                 <div class="modal-body">
                     <div class="box box-primary">
                         <div class="box-body">
                             <div class="form-group">
                                 <label>Kategori</label>
                                 <select class="form-control" name="artikel_kategori">
                                     <option value="">- Pilih Kategori</option>
                                     @foreach ($kategori as $a)
                                         <option {{ old('kategori') == $a->id ? 'selected' : '' }}
                                             value="{{ $a->id }}">{{ $a->kategori_nama }}</option>
                                     @endforeach
                                 </select>

                                 <br />
                                 <div class="form-group">
                                     <label>Gambar Sampul</label>

                                     <input type="file" name="sampul">

                                 </div>
                                 <br />
                                 <input type="submit" name="status" value="Draft" class="btn btn-warning btn-block">
                                 <input type="submit" name="status" value="Publish" class="btn btn-success btn-block">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script src="{{ asset('AdminLTE/ckeditor/ckeditor.js') }}"></script>
 <script>
     CKEDITOR.replace('editor');
 </script>
