@extends('admin.layout.app')
@section('title', 'Masyayikh & Asatidz')
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/buttons.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/select.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('template/assets/vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
    <div class="card">
        <div class="card-header">
            Data masyayikh
            <a href="{{route('teacher.create')}}" class="btn btn-sm btn-light btn-rounded float-right">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered table-sm teacher">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">TTL</th>
                        <th scope="col" class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teacher as $key=>$item)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$item->full_name}}</td>
                        <td>{{$item->birthplace, $item->dateplace}}</td>
                        <td class="text-center">
                            <form action="{{route('teacher.destroy', $item->id)}}" class="btn-group">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                                <a href="{{route('teacher.edit', $item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{route('teacher.detail', $item->id)}}"
                                    class="btn btn-warning btn-sm">Detail</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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