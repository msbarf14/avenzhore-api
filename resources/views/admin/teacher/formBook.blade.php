<!-- Modal -->
<div class="modal fade" id="formBooks" tabindex="-1" role="dialog" aria-labelledby="formBooksTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <form action="{{route('teacher.book.add', $teacher->id)}}" class="modal-content" method="POST">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select name="book_id" class="form-control">
          <option >Pilih data</option>
          @foreach ($books as $item)
              <option value="{{$item->id}}">{{$item->title}}</option>
          @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
</div>