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
        <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label >Title*</label>
              <input type="text" name="title" class="form-control" value="{{old('text', $post->title)}}" disabled>
            </div>
            <div class="form-group">
              <label >Content*</label>
              <textarea name="content" id="mytextarea" style="min-height: 70vh" class="form-control mceNonEditable" disabled>{{old('content', $post->content)}}</textarea>
            </div>
          </div>
          <div class="col-4">
            <div class="from-group mb-2">
              <label >Category</label>
              <input value="{{$post->category->name}}" disabled>
              
            </div>
            <div class="row">
              <div class="col-6">
                <div class="from-group">
                  <label >Type</label>
                  <input value="{{$post->type}}" disabled>

                </div>
              </div>
              <div class="col-6">
                <div class="from-group">
                  <label >Headline</label>
                  <input value="{{$post->headline}}" disabled>
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <label> Status Active</label>
              <input value="{{$post->active}}" disabled>
            </div>
            <hr>
             <!-- image -->
            <label>Picture</label>
            <div class="input-group  form-group mb-3">
              <input id="thumbnail" class="form-control" type="text" name="picture" placeholder="Image" value="{{$post->picture}}" disabled>
            </div>
            
            <div class="form-group">
              <label>Picture Description*</label>
             <textarea name="picture_description" class="form-control" disabled>{{$post->picture_description}}</textarea>
            </div>
          </div>
        </div>
       
        <div class="form-group">
          <a href="{{route('post')}}" class="btn btn-light">Kembali</a>
        </div>
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
    plugins: 'noneditable'
 });

</script>
@endpush




