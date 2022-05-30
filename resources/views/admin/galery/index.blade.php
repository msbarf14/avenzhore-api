@extends('admin.layout.app')
@section('title', 'users')
@push('style')
<link type="text/css" rel="stylesheet" href="{{asset('vendor/lightgallery/css/lightgallery.css')}}" /> 
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <!-- Header page -->
  <div class="page-header">
    <h2 class="pageheader-title">Galeri </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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
  <!-- Table Data -->
  <div class="card">
    <div class="card-header">Data Alumni 
      <button type="button" class="btn btn-light btn-rounded float-right" data-toggle="modal" data-target="#galeryform">
        Tambah galery
      </button>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered table-sm user">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>Image</th>
            <th scope="col">Tile</th>
            <th scope="col" width="150">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key=>$item)
          <tr>
            <th width="100" scope="row">{{++$key}}</th>
            <th width="100">
              <a href="{{$item->picture}}">
                <img src="{{$item->picture}}" alt="{{$item->title}}" class="img-responsive" width="100">
              </a>
            </th>
            <td>{{$item->title}}</td>
            <td >
              <form action="{{route('admin.galery.destroy', $item->id)}}" >
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @include('admin.galery.create')
</div>

@endsection
@push('script')
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
  <script>

    $('#lfm').filemanager('image');
  </script>
@endpush