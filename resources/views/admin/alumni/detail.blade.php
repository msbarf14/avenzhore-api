@extends('admin.layout.app')
@section('title', 'Detail Alumni')
@push('style')
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
      <h2 class="pageheader-title">Detail Alumni </h2>
      <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                  <li class="breadcrumb-item "><a href="{{route('alumni')}}" class="breadcrumb-link">Table Data</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Detail Alumni</li>
              </ol>
          </nav>
      </div>
  </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{$alumni->picture}}" class="img-thumbnail">
                </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div id="map" style="height: 50vh;" class="mt-3 mb-3"></div>
              </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="inputNama">Tahun Masuk</label>
                            <input type="text" class="form-control form-control-lg" name="entry_year"
                                value="{{old('entry_year', $alumni->entry_year)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Diteriman dikelas </label>
                            <input type="text" class="form-control form-control-lg" name="accepted_class"
                                value="{{old('accepted_class', $alumni->accepted_class)}}" disabled>
                        </div>
                        <small class="float-right"><b>Data Alumni</b></small>
                        <div class="form-group">
                            <label for="inputNama">Nama lengkap</label>
                            <input type="text" class="form-control form-control-lg" name="full_name"
                                value="{{old('full_name', $alumni->full_name)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nomer Induk</label>
                            <input type="text" class="form-control form-control-lg" name="master_number"
                                value="{{old('master_number', $alumni->master_number)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Tempat & Tanggal Lahir</label>
                            <div class="row justify-content-start">
                                <input type="text" class="form-control form-control-lg ml-3 col-5" name="birthplace"
                                    value="{{old('birthplace', $alumni->birthplace)}}" disabled>
                                <input type="text" class="form-control form-control-lg ml-3 col-5" name="dateplace"
                                    value="{{old('dateplace', $alumni->dateplace)}}" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <textarea type="text" class="form-control form-control-lg" name="address"
                                disabled>{{old('address', $alumni->address)}}</textarea>
                        </div>
                        <small class="float-right"><b>Data Wali</b></small>
                        <div class="form-group">
                            <label>Nama Ayah</label>
                            <input type="text" class="form-control form-control-lg" name="fathers_name"
                                value="{{old('fathers_name', $alumni->fathers_name)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Ibu</label>
                            <input type="text" class="form-control form-control-lg" name="mothers_name"
                                value="{{old('mothers_name', $alumni->mothers_name)}}" disabled>
                        </div>
                        <small class="float-right"> <b>Kontak</b></small>
                        <div class="form-group">
                            <label> <i>"Data kontak Alumni dapat dikosongkan" </i> </label>
                        </div>
                        <div class="form-group">
                            <label>Hp</label>
                            <input type="text" class="form-control form-control-lg" name="hp"
                                value="{{old('hp', $alumni->hp)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Whatsapp</label>
                            <input type="text" class="form-control form-control-lg" name="whatsapp"
                                value="{{old('whatsapp', $alumni->whatsapp)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>facebook</label>
                            <input type="text" class="form-control form-control-lg" name="facebook"
                                value="{{old('facebook', $alumni->facebook)}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>instagram</label>
                            <input type="text" class="form-control form-control-lg" name="instagram"
                                value="{{old('instagram', $alumni->instagram)}}" disabled>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Pesan-pesan</label>
                            <textarea type="text" class="form-control form-control-lg" name="word"
                                disabled> {{old('word', $alumni->word)}} </textarea>
                        </div>
                        <a href="{{route('alumni')}}" class="btn btn-primary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    var lat = '{{$alumni->lat}}';
    var lang = '{{ $alumni->lang }}';
    var addrs = '{{$alumni->address}}';
    $(document).ready(function () {
        console.log(lat);
    });
    // Initialize the map and assign it to a variable for later use
    var map = L.map('map', {
        // Set latitude and longitude of the map center (required)
        center: [lat,lang],
        // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
        zoom: 15
    });


    // Create a Tile Layer and add it to the map
    //var tiles = new L.tileLayer('http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png').addTo(map);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lang]).addTo(map)
    .bindPopup(addrs);
</script>
@endpush