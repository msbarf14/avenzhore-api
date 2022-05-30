@extends('admin.layout.app')
@section('title', 'Rubrik')
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
    <h2 class="pageheader-title">Post / Rubrik</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Rubrik</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table Post</li>
            </ol>
        </nav>
    </div>
  </div>

  <!-- Table Data -->
  <div class="card">
    <div class="card-header">Data Post 
      <a href="{{route('post.create')}}"  class="btn btn-light btn-rounded float-right">
        Tambah
      </a>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered table-sm user">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category</th>
            <th scope="col" width="700">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Headline</th>
            <th scope="col">Active</th>
            <th scope="col" width="150">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $key=>$item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->category->name}} </td>
            <td>{{$item->title}} (seen {{$item->hits}})</td>
            <td>{{$item->type}}</td>
            <td>{{$item->headline}}</td>
            <td>{{$item->active}}</td>
            <td >
              <form action="{{route('post.destroy', $item->id)}}" class="btn-group">
                @method("DELETE")
                @csrf
                <a href="{{route('post.detail', $item->id)}}" class="btn btn-dark btn-xs"><i class="fas fa-search"></i></a>
                <button type="submit" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></button>
                <a href="{{route('post.edit', $item->id)}}" class="btn btn-warning btn-xs"><i class="fas fa-pen-square"></i></a>
              </form>  
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Modal -->
@include('admin.post.postCategory.create')
@endsection
@push('script')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{asset('template/assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template/assets/vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/assets/vendor/datatables/js/data-table.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
@endpush