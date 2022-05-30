@extends('admin.layout.app')
@section('title', 'Form Post')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="page-header">
    <h2 class="pageheader-title">Create Post </h2>
    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Main Data</a></li>
                <li class="breadcrumb-item "> <a href="{{route('post')}}" class="breadcrumb-link">Table Post</a> </li>
                <li class="breadcrumb-item active" aria-current="page">Form Data</li>
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
    <div class="card-body"> 
      <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label >Title*</label>
              <input type="text" name="title" class="form-control" value="{{old('text')}}">
            </div>
            <div class="form-group">
              <label >Content*</label>
              <textarea name="content" id="mytextarea" style="min-height: 70vh">{{old('content')}}</textarea>
            </div>
          </div>
          <div class="col-4">
            <div class="from-group mb-2">
              <label >Category</label>
              <select name="category_id" class="form-control">
                @foreach ($categories as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="from-group">
                  <label >Type</label>
                  <select name="type" class="form-control">
                    <option value="general">General</option>
                    <option value="photo">Photo</option>
                    <option value="video">Video</option>
                  </select>
                </div>
              </div>
              <div class="col-6">
                <div class="from-group">
                  <label >Headline</label>
                  <select name="headline" class="form-control">
                    <option value="N" >No</option>
                    <option value="Y">Yes</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <label> Status</label>
              <select name="active" class="form-control">
                <option value="Y">Yes</option>
                <option value="N">No</option>
              </select>
            </div>
            <hr>
             <!-- image -->
            <label>Picture</label>
            <div class="input-group  form-group mb-3">
              <input id="thumbnail" class="form-control" type="text" name="picture" placeholder="Image">
              <div class="input-group-append">
              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-outline-secondary">
                  <i class="fa fa-picture-o"></i> Choose
                </a>
              </div>
            </div>
            
            <div class="form-group">
              <label>Picture Description*</label>
             <textarea name="picture_description" class="form-control"></textarea>
            </div>
          </div>
        </div>
       
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{route('post')}}" class="btn btn-light">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="https://cdn.tiny.cloud/1/9jiuub0yeltmy314m1f20vxhcjl189eu9w0gnslbvwo2s2i7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
 $('#lfm').filemanager('image');
  tinymce.init({
    selector: '#mytextarea',
 });
</script>
@endpush




