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
            {{-- <div class="card">
                <div class="card-body">
                    <img src="{{$alumni->picture}}" class="img-thumbnail">
                </div>
            </div> --}}
            <h3>Lokasi</h3>
            <div class="card">
              <div>
                <div id="map" style="height: 30vh;"></div>
              </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-cener">

                        <h3 class="text-muted">Data diri alumni</h3>
                        <h3 class="text-primary">{{$gender == 'male' ? 'Avenzhore 39' : 'Avrealzoixia 25'}}</h3>
                    </div>
                    <hr>
                    <div>
                        <label class="text-sm text-secondary">Nama Lengkap</label>
                        <h4 class="font-bold">{{$full_name}}</h4>
                    </div>
                    <div>
                        <label class="text-sm text-secondary">Tempat & Tanggal Lahir</label>
                        <h4 class="font-bold">{{$born_place}}, {{$born_date}}</h4>
                    </div>
                    <div>
                        <label class="text-sm text-secondary">Jenis Kelamin</label>
                        <h4 class="font-bold">{{$gender == 'male' ? 'Laki-laki' : 'Perempuan'}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    // Initialize the map and assign it to a variable for later use
    var map = L.map('map', {
        // Set latitude and longitude of the map center (required)
        center: [-7.1128316,113.6536184],
        // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
        zoom: 15
    });


    // Create a Tile Layer and add it to the map
    //var tiles = new L.tileLayer('http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png').addTo(map);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lang]).addTo(map)
    // .bindPopup(addrs);
</script>
@endpush