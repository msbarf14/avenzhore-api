@extends('admin.layout.app')
@section('title', 'Alumni')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="page-header">
        <h2 class="pageheader-title">Data Alumni </h2>
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Table Alumni</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div> Data Alumni</div>
            <div class="d-flex align-items-center">
                <form action="{{route("alumni")}}" class="mr-2 d-flex">
                    <input type="text" class="form-control" name="search" placeholder="cari data ..." required>
                    <button type="submit" class="btn btn-sm btn-primary">cari</button>
                </form>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalCreateMember">
                    Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Nama Lengkap</th>
                            <th >TTL</th>
                            <th  class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumni as $key=>$item)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$item->full_name}}</td>
                            <td>{{$item->born_place}}, {{$item->born_date}}</td>
                            <td class="text-center">
                                <a href="{{route('alumni.detail', $item->id)}}"
                                    class="btn btn-warning btn-sm">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{ $alumni->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.alumni.partials.modalCreate')

@endsection