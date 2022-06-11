<!-- Modal -->
<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-labelledby="modalContactLabel" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="modalContactLabel">Kontak Alumni</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('alumni.contact.store', $member->id)}}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-body">
              <div class="form-group">
                <label>Tipe</label>
                <select name="type" class="form-control">
                    <option value="whatsapp">Whatasapp</option>
                    <option value="facebook">facebook</option>
                    <option value="instagram">Instagram</option>
                </select>
              </div>
              <div class="form-group">
                <label >Link/Nomer</label>
                <input type="text" name="field" class="form-control">
                <small id="emailHelp" class="form-text text-muted">Masukkan link pada halaman profil, dan masukkn nomer untuk whatsapp</small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>