@extends('admin.layout.app')
@section('title', 'Edit Alumni')
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
        <h2 class="pageheader-title">Form Edit Alumni </h2>
        <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('alumni')}}" class="breadcrumb-link">Table
                            Data</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data </li>
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
        <div class="card-header">
            Form Edit
        </div>
        <div class="card-body">
            <form action="{{route('alumni.update', $alumni->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="inputNama">Tahun Masuk</label>
                    <input type="text" class="form-control form-control-lg" name="entry_year"
                        value="{{old('entry_year', $alumni->entry_year)}}">
                </div>
                <div class="form-group">
                    <label>Diteriman dikelas </label>
                    <input type="text" class="form-control form-control-lg" name="accepted_class"
                        value="{{old('accepted_class', $alumni->accepted_class)}}">
                </div>
                <small class="float-right"><b>Data Alumni</b></small>
                <div class="form-group">
                    <label for="inputNama">Nama lengkap</label>
                    <input type="text" class="form-control form-control-lg" name="full_name"
                        value="{{old('full_name', $alumni->full_name)}}">
                </div>
                <div class="form-group">
                    <label>Nomer Induk</label>
                    <input type="text" class="form-control form-control-lg" name="master_number"
                        value="{{old('master_number', $alumni->master_number)}}">
                </div>
                <div class="form-group">
                    <label>Tempat & Tanggal Lahir</label>
                    <div class="row justify-content-start">
                        <input type="text" class="form-control form-control-lg ml-3 col-5" name="birthplace"
                            value="{{old('birthplace', $alumni->birthplace)}}">
                        <input type="text" class="form-control form-control-lg ml-3 col-5" name="dateplace"
                            value="{{old('dateplace', $alumni->dateplace)}}">
                    </div>
                </div>
                <div class="form-group">
                    <label>Alamat </label>
                    <textarea type="text" class="form-control form-control-lg"
                        name="address">{{old('address', $alumni->address)}}</textarea>
                </div>
                <small class="float-right"><b>Data Wali</b></small>
                <div class="form-group">
                    <label>Nama Ayah</label>
                    <input type="text" class="form-control form-control-lg" name="fathers_name"
                        value="{{old('fathers_name', $alumni->fathers_name)}}">
                </div>
                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" class="form-control form-control-lg" name="mothers_name"
                        value="{{old('mothers_name', $alumni->mothers_name)}}">
                </div>
                <small class="float-right"> <b>Kontak</b></small>
                <div class="form-group">
                    <label> <i>"Data kontak Alumni dapat dikosongkan" </i> </label>
                </div>
                <div class="form-group">
                    <label>Hp</label>
                    <input type="text" class="form-control form-control-lg" name="hp"
                        value="{{old('hp', $alumni->hp)}}">
                </div>
                <div class="form-group">
                    <label>Whatsapp</label>
                    <input type="text" class="form-control form-control-lg" name="whatsapp"
                        value="{{old('whatsapp', $alumni->whatsapp)}}">
                </div>
                <div class="form-group">
                    <label>facebook</label>
                    <input type="text" class="form-control form-control-lg" name="facebook"
                        value="{{old('facebook', $alumni->facebook)}}">
                </div>
                <div class="form-group">
                    <label>instagram</label>
                    <input type="text" class="form-control form-control-lg" name="instagram"
                        value="{{old('instagram', $alumni->instagram)}}">
                </div>
                <hr>
                <div class="form-group">
                    <label>Pesan-pesan</label>
                    <textarea type="text" class="form-control form-control-lg"
                        name="word"> {{old('word', $alumni->word)}} </textarea>
                </div>

                <label>Image</label>
                <div class="input-group mb-3">
                    <input id="thumbnail" class="form-control" type="text" name="picture" placeholder="Image"
                        value="{{$alumni->picture}}">
                    <div class="input-group-append">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-outline-secondary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </div>
                </div>
                <img id="holder" style="margin-top:15px;max-height:100px;">
                <hr>
                <div class="form-group ">
                    <label>Lat & lang</label>
                    <div class="row justify-content-start">
                        <input type="text" id="inputLat" class="form-control form-control-lg ml-3 col-5" name="lat"
                            value="{{old('lat',  $alumni->lat)}}" placeholder="lat">
                        <input type="text" id="inputLang" class="form-control form-control-lg ml-3 col-5" name="lang"
                            value="{{old('lang',  $alumni->lang)}}" placeholder="lang">
                    </div>

                    <div id="map" style="height: 50vh;" class="mt-3 mb-3"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan perubahan</button>
                        <a href="{{route('user.edit', $alumni->user_id)}}" class="btn btn-primary">Pengaturan User</a>
                        <a href="{{route('alumni')}}" class="btn btn-light">Kembali</a>
                    </div>
            </form>
        </div>
    </div>

</div>

@endsection


@push('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');


    var lat = document.getElementById("inputLat").value;
    var lang = document.getElementById("inputLang").value;

    // Initialize the map and assign it to a variable for later use
    var map = L.map('map', {
        // Set latitude and longitude of the map center (required)
        center: [-7.258970269999963, 110.20111251300006],
        // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
        zoom: 6
    });


    // Create a Tile Layer and add it to the map
    //var tiles = new L.tileLayer('http://{s}.tile.stamen.com/watercolor/{z}/{x}/{y}.png').addTo(map);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var searchControl = new L.esri.Controls.Geosearch().addTo(map);

    var results = new L.LayerGroup().addTo(map);

    searchControl.on('results', function (data) {
        results.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
            results.addLayer(
                L.marker(data.results[i].latlng, {
                    draggable: true
                }).on('click', function (e) {
                    console.log(e.latlng.lat)
                    document.getElementById('inputLat').value = e.latlng.lat
                    document.getElementById('inputLang').value = e.latlng.lng
                    // console.log('lang ='+e.latlng[0].lang)
                })

            );
        }
    });

    setTimeout(function () {
        $('.pointer').fadeOut('slow');
    }, 3400);

</script>
@endpush
