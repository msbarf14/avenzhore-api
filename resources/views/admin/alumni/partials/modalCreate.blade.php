  <!-- Modal -->
  <div class="modal fade" id="modalCreateMember" tabindex="-1" role="dialog" aria-labelledby="modalCreateMemberLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCreateMemberLabel">Tambah data alumni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('alumni.store')}}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="full_name" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="born_place" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="born_date" class="form-control" >
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="gender" class="form-control">
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>