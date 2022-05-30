<div class="modal fade " id="userForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('user.store')}}" >
          @method('POST')
          @csrf
          <div class="form-group">
            <label for="inputNama">Nama Pengguna</label>
            <input type="text" class="form-control" name="name" id="inputEmail" aria-describedby="nameHelp"> 
          </div>
          <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
          </div>
          <div class="form-group">
            <label for="inputHakAkses">Hak Akses</label>
            <select name="role" class="form-control" id="inputHakAkses">
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="inputSatatus">status</label>
            <select name="status" class="form-control" id="inputSatatus">
              <option value="nonactive">Non Aktif</option>
              <option value="active">Aktif</option>
            </select>
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