@extends('admin.layout.app')
@section('title', 'users')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <!-- Header page -->
  <div class="page-header">
    <h2 class="pageheader-title">Categories</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Rubrik</a></li>
                <li class="breadcrumb-item"><a href="{{route('category')}}" class="breadcrumb-link">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Categories</li>
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
    <div class="card-header">Edit Kategori 
    </div>
    <div class="card-body">
        <form action="{{route('category.update', $category->id)}}" method="put">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label> Nama Kategori </label>
            <input type="text" name="name" class="form-control col-8" value="{{$category->name}}">
          </div>
          <div class="btn-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('category')}}" class="btn btn-light">Kembali</a>
          </div>
        </form>
    </div>
  </div>
</div>

@endsection
