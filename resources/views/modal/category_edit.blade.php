 <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="modalEditCategory" aria-hidden="true">
     <div class="modal-dialog text-center">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Edit Category</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <input type="hidden" name="id" id="id">
                 <!--FORM CATEGORY-->
                 <div class="form-group">
                     <label for="name" class="control-label">Nama Kategori</label>
                     <input type="text" class="form-control" id="kategori_nama-edit">
                     <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-kategori-nama-edit"></div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                     <button type="button" class="btn btn-primary" id="update_category">UPDATE</button>
                 </div>
                 </form>
                 <!--END FORM EDIT CATEGORY-->
             </div>
         </div>
     </div>
 </div>
