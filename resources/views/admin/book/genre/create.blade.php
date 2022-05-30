@extends('admin.layout.app')
@section('title', 'Form Genre')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">Data Genre </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item "> <a href="{{route('admin.book')}}" class="breadcrumb-link">Table Genre</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Form Data</li>
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
      <form action="{{route('admin.genre.store')}}" method="POST">
        @csrf
        <!-- Name -->
        <div class="form-group">
          <label for="inputName">Nama Genre Buku*</label>
          <input type="text" class="form-control form-control-lg"  name="name" value="{{old('full_name')}}"> 
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('admin.book')}}" class="btn btn-light">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  $('#lfm').filemanager('image');
</script>
@endpush




