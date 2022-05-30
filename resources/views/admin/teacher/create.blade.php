@extends('admin.layout.app')
@section('title', 'Form Masyayikh & Asatidz')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">Data Masyayikh & Asatidz </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                <li class="breadcrumb-item "> <a href="{{route('teacher')}}" class="breadcrumb-link">Table Masyayikh & Asatidz</a> </li>
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
      <form action="{{route('teacher.store')}}" method="POST">
        @csrf
        <!-- Full Name -->
        <div class="form-group">
          <label for="inputName">Nama Lengkap</label>
          <input type="text" class="form-control form-control-lg"  name="full_name" value="{{old('full_name')}}"> 
        </div>
        <!-- TTL -->
        <div class="form-group">
          <label>Tempat & Tanggal Lahir</label>
          <div class="row justify-content-start">
            <input type="text" class="form-control form-control-lg ml-3 col-5" name="birthplace" value="{{old('birthplace')}}" placeholder="tempat"> 
            <input type="text" class="form-control form-control-lg ml-3 col-5" name="dateplace" value="{{old('dateplace')}}" placeholder="tanggal"> 
          </div>
        </div>
        <!-- Address -->
        <div class="form-group">
          <label>Alamat </label>
          <textarea type="text" class="form-control form-control-lg" name="address">{{old('address')}}</textarea>
        </div>
        <!-- mapel -->
        <div class="form-group">
          <label >Mata Pelajaran</label>
          @for ($i=0; $i <= 6; $i++)
            <input type="text" name="studies[{{ $i }}][name]" class="form-control form-control-lg mb-1" value="{{ old('studies['.$i.'][name]') }}" >
          @endfor
        </div>
        <!-- history -->
        <div class="form-group">
          <label>Riwayat Singkat </label>
          <textarea type="text" class="form-control form-control-lg" name="histories">{{old('histories')}}</textarea>
        </div>
        <!-- image -->
        <label>Image</label>
        <div class="input-group mb-3">
          <input id="thumbnail" class="form-control" type="text" name="picture" placeholder="Image">
          <div class="input-group-append">
           <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-outline-secondary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </div>
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
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
<script>
  $('#lfm').filemanager('image');
</script>
@endpush




