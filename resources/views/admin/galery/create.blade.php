<div class="modal fade " id="galeryform" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('admin.galery.store')}}" >
          @method('POST')
          @csrf
          <div class="form-group">
            <label for="inputNama">Title</label>
            <input type="text" class="form-control" name="title" id="inputEmail" aria-describedby="nameHelp"> 
          </div>
          <label>Image</label>
          <div class="input-group mb-3">
            <input id="thumbnail" class="form-control" type="text" name="picture" placeholder="Image">
            <div class="input-group-append">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-outline-secondary">
                <i class="fa fa-picture-o"></i> Choose
              </a>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>