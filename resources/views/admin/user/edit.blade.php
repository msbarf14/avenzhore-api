@extends('admin.layout.app')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">Form User </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Credential</a></li>
                <li class="breadcrumb-item"><a href="{{route('user')}}" class="breadcrumb-link">Table User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
    <div class="card-header">Edit Data User</div>
    <div class="card-body">               
      <form action="{{route('user.update', $user->id)}}" method="PUT">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label for="inputNama">Nama Pengguna</label>
          <input type="text" class="form-control" name="name" value="{{$user->name}}" id="inputEmail" aria-describedby="nameHelp"> 
        </div>
        <div class="form-group">
          <label for="inputEmail">Email address</label>
          <input type="email" class="form-control" name="email" value="{{$user->email}}" id="inputEmail" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password"  id="exampleInputPassword1">
        </div>
        <div class="form-group">
          <label for="inputHakAkses">Hak Akses</label>
          <select name="role" class="form-control" id="inputHakAkses">
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="form-group">
          <label for="inputSatatus">status</label>
          <select name="status" class="form-control" id="inputSatatus">
            <option value="nonactive">Non Aktif</option>
            <option value="active">Aktif</option>
          </select>
        </div>
        <div class="bnt-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('user')}}" class="btn btn-light">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
@include('admin.user.create')
@endsection




