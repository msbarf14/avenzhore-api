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
    <h2 class="pageheader-title">Data Buku</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table Buku</li>
            </ol>
        </nav>
    </div>
  </div>

  <!-- Table Data -->
  <div class="card">
    <div class="card-header">Data Buku
      <div class="float-right ">
      
        <a href="{{route('admin.genre')}}" class="btn btn-light btn-xs"><i class="fas fa-table"></i> Genre</a>
        @if ($genreCount == 0)
        <a href="#" class="btn btn-light btn-xs" onclick="window.alert('Data genre kosong, Tambahkan Genre')"><i class="fas fa-plus-square"></i> Tambah Buku</a>
        @else
        <a href="{{route('admin.book.create')}}" class="btn btn-light btn-xs"><i class="fas fa-plus-square"></i> Tambah Buku</a>
        @endif
      </div>
      {{-- <button type="button" class="btn btn-light btn-rounded float-right" data-toggle="modal" data-target="#userForm">
        Tambah User
      </button> --}}
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered table-sm user">
        <thead>
          <tr>
            <th scope="col" width="50">#</th>
            <th scope="col">Judul buku</th>
            <th scope="col">Penulis/Penerbit</th>
            <th scope="col" width="150">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key=>$item)
          <tr>
            <td>{{++$key}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->author}}</td>
            <td>
              <form action="{{route('admin.book.destroy', $item->id)}}" >
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                <a href="{{route('admin.book.edit', $item->id)}}" class="btn btn-primary btn-sm">Edit</a>
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
@include('admin.user.create')
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