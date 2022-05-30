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
    <h2 class="pageheader-title">Data Masyayikh & Asatidz </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                <li class="breadcrumb-item active" aria-current="page">Table Masyayikh & Asatidz</li>
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
      <button type="button" class="btn btn-light btn-rounded float-right" data-toggle="modal" data-target="#userForm">
        Tambah User
      </button>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered table-sm user">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col" width="150">Opsi</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $key=>$item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->role}}</td>
            <td >
              <form action="{{route('user.destroy', $item->id)}}" >
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                <a href="{{route('user.edit', $item->id)}}" class="btn btn-primary btn-sm">Edit</a>
              </form>  
            </td>
            <td>
              <form action="{{route('user.status', $item->id)}}" method="POST">
                @csrf
                @if ($item->status === 'active')
                    <button type="submit" name="status" class="btn btn-success rounded" value="deactive">o</button>
                @elseif($item->status === 'deactive')
                  <button type="submit" name="status" class="btn btn-dark rounded" value="active">o</button>
                @else

                @endif
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