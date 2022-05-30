@extends('admin.layout.app')
@section('title', 'Detail Masyayikh & Asatidz')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">Detail Masyayikh & Asatidz </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                <li class="breadcrumb-item "> <a href="{{route('teacher')}}" class="breadcrumb-link">Table Masyayikh & Asatidz</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
            </ol>
        </nav>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <img src="{{$teacher->picture}}" class="img-thumbnail">
        </div>
      </div>
      <!--List Books -->
      <div class="card">
        <div class="card-header ">
          <div class="row">
            <h5 class="col-6">Mata Pelajaran</h5>
            <div class="col-6">
              <button type="button" class=" btn btn-light btn-xs float-right" data-toggle="modal" data-target="#formBooks">
                <i class="fas fa-plus-square"></i>&nbsp; Tambah
              </button>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if (!empty($teacher->booksDetail)) 
              <ul class="list-group list-group-flush">
                @foreach ($teacher->booksDetail as $item)
                  <li class="list-group-item">
                    
                    <div class="row">
                      <img src="{{$item->book->picture}}" alt="" srcset="" width="100" class="col-4">
                      <div class="col-8">
                        <h3 >{{$item->book->title}}</h3>
                        <p>Penulis/penerbit: {{!empty($item->book->author) ? $item->book->author : '-'}}</p>
                      </div>
                    </div>
                    <a href="{{route('teacher.book.destroy', $item->id)}}" class="btn btn-xs float-right"><i class="fas fa-trash"></i> Hapus</a>
                  </li>
                @endforeach
              </ul>
          @else
          Mata pelajaran kosong
          @endif
        </div>
      </div>
    </div>
      <div class="col-8">
          <div class="card">
              <div class="card-body"> 
                  <div class="form-group">
                    <label for="inputName">Nama Lengkap</label>
                    <input type="text" class="form-control form-control-lg"  name="full_name" value="{{old('full_name', $teacher->full_name)}}" disabled> 
                  </div>
                  <div class="form-group">
                    <label>Tempat & Tanggal Lahir</label>
                    <div class="row justify-content-start">
                      <input type="text" class="form-control form-control-lg ml-3 col-5" name="birthplace" value="{{old('birthplace',  $teacher->birthplace)}}" placeholder="tempat" disabled> 
                      <input type="text" class="form-control form-control-lg ml-3 col-5" name="dateplace" value="{{old('dateplace',  $teacher->dateplace)}}" placeholder="tanggal" disabled> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Alamat </label>
                    <textarea type="text" class="form-control form-control-lg" name="address" disabled>{{old('address', $teacher->address)}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Riwayat Singkat </label>
                    <textarea type="text" class="form-control form-control-lg" name="histories" style="height: 40vh;" disabled>{{old('histories', $teacher->histories)}}</textarea>
                  </div>
                  <a href="{{route('teacher')}}" class="btn btn-light">Kembali</a>
              </div>
          </div>
      </div>
  </div>
  @include('admin.teacher.formBook')
</div>
@endsection

@section('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  $('#lfm').filemanager('image');
</script>
@endsection




