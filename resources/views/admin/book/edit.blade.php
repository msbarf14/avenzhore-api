@extends('admin.layout.app')
@section('title', 'Form Edit Buku')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">Edit Data Buku </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item "> <a href="{{route('admin.book')}}" class="breadcrumb-link">Table Buku</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Form Edit Data</li>
            </ol>
        </nav>
    </div>
  </div>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <div class="card">
    <div class="card-body"> 
      <form action="{{route('admin.book.update', $book->id)}}" method="POST">
        @csrf
        <!-- Full Name -->
        <div class="form-group">
          <label for="inputName">Judul Buku*</label>
          <input type="text" class="form-control form-control-lg"  name="title" value="{{old( 'title', $book->title)}}"> 
        </div>
        <!-- genre -->
        <div class="form-group">
          <label for="inputName">Genre*</label>
          <select name="genre_id" class="form-control">
            @foreach ($genre as $item)
            <option disabled>Old Genre</option>
              @if ($book->genre_id == $item->id)
               <option value="{{$item->id}}">{{$item->name}}</option>
              @endif
              <option disabled>Genre</option>
              <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
        </div>
         <!-- synopsis -->
         <div class="form-group">
          <label for="inputName">Pengarang / Penerbit</label>
          <input type="text" class="form-control form-control-lg"  name="author" value="{{old('author', $book->author)}}"> 
        </div>
          <!-- synopsis -->
          <div class="form-group">
            <label for="inputName">Sinopsis singkat</label>
            <input type="text" class="form-control form-control-lg"  name="synopsis" value="{{old('synopsis', $book->synopsis)}}"> 
          </div>
           <!-- synopsis -->
           <div class="form-group">
            <label for="inputName">Deskripsi</label>
            <textarea name="des" id="mytextarea" style="min-height: 70vh">{{old('des', $book->des)}}</textarea>
          </div>
        <!-- image -->
        <label>Image</label>
        <div class="input-group mb-3">
          <input id="thumbnail" class="form-control" type="text" name="picture" placeholder="Image" value="{{$book->picture}}">
          <div class="input-group-append">
           <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-outline-secondary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('teacher')}}" class="btn btn-light">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="https://cdn.tiny.cloud/1/9jiuub0yeltmy314m1f20vxhcjl189eu9w0gnslbvwo2s2i7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  $('#lfm').filemanager('image');
  tinymce.init({
    selector: '#mytextarea',
 });
</script>
@endpush




