@extends('admin.layout.app')
@section('title', 'Form Alumni')
@push('style')
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
<script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
@endpush
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">{{$alumni->full_name}}</h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
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
    <div class="card-header ">
        <p class="text-capitalize">Tambahkan Alamat</p>
    </div>
    <div class="card-body"> 
      <form action="{{route('alumni.address.store')}}" method="POST">
        @csrf
        <div class="form-group">
          <label >Alamat</label>
          <input type="text" class="form-control form-control-lg"  name="address"> 
          <small>masukkan mana jalan, nomer rumah atau patokan terdekat</small>
        </div>
        <div id="map" style="height: 50vh;" class="mt-3 mb-3"></div>
        
        <div class="form-group ">
          <label>Lat & lang</label>
          <div class="row justify-content-start">
            <input type="text" id="inputLat" class="form-control form-control-lg ml-3 col-5" name="latitude" placeholder="latitude"> 
            <input type="text" id="inputLang" class="form-control form-control-lg ml-3 col-5" name="longitude" placeholder="longitude"> 
        </div> 

        <div class="form-group mt-2">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('alumni')}}" class="btn btn-light">Back</a>
        </div>
      </form>
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
    center: [-7.258970269999963, 110.20111251300006],
    // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
    zoom: 6
});

L.control.scale().addTo(map);

// Create a Tile Layer and add it to the map
//var tiles = new L.tileLayer('http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png').addTo(map);
L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  var searchControl = new L.esri.Controls.Geosearch().addTo(map);

  var results = new L.LayerGroup().addTo(map);

  searchControl.on('results', function(data){
    results.clearLayers();
    for (var i = data.results.length - 1; i >= 0; i--) {
      results.addLayer(
        L.marker(data.results[i].latlng, {draggable: true}).on('click', function(e){
          console.log(e.latlng.lat)
          document.getElementById('inputLat').value = e.latlng.lat
          document.getElementById('inputLang').value = e.latlng.lng
          // console.log('lang ='+e.latlng[0].lang)
        })
        
      );
    }
  });

setTimeout(function(){$('.pointer').fadeOut('slow');},3400);


</script>
@endpush




