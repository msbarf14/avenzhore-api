@extends('admin.layout.app')
@section('title', 'Halaman Utama')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="alert alert-light alert-dismissible fade show" role="alert">
    <strong>Selamat Datang,</strong> layanan yang anda gunakan saat ini masih dalam tahap pengembangan 🎉.
    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </a>
</div>
  {{-- header --}}
  <div class="page-header">
    <h2 class="pageheader-title">Dashboard / Halaman Utama </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Rekapitulasi data web ma'la</a></li>
            </ol>
        </nav>
    </div>
  </div>
  {{-- content --}}
  <div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-inline-block">
            <h5 class="text-muted">Post</h5>
            <h2 class="mb-0"> 0</h2>
          </div>
          <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
            <i class="fa fa-eye fa-fw fa-sm text-info"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-inline-block">
            <h5 class="text-muted">Masyayikh & Asatidz </h5>
            <h2 class="mb-0"> {{$totalTeacher}}</h2>
          </div>
          <div class="float-right icon-circle-medium  icon-box-lg  bg-primary-light mt-1">
            <i class="fa fa-user fa-fw fa-sm text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-inline-block">
            <h5 class="text-muted">Alumni</h5>
            <h2 class="mb-0">{{$totalAlumni}}</h2>
          </div>
          <div class="float-right icon-circle-medium  icon-box-lg  bg-secondary-light mt-1">
            <i class="fa fa-handshake fa-fw fa-sm text-secondary"></i>
          </div>
        </div>
      </div>
    </div>
    {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
      <div class="card">
        <div class="card-body">
          <div class="d-inline-block">
            <h5 class="text-muted">Total Earned</h5>
            <h2 class="mb-0"> $149.00</h2>
          </div>
          <div class="float-right icon-circle-medium  icon-box-lg  bg-brand-light mt-1">
            <i class="fa fa-money-bill-alt fa-fw fa-sm text-brand"></i>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
</div>


@endsection