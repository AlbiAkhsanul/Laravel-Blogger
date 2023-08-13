@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/categories/{{ $category->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$category->name) }}" required autofocus>
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug',$category->slug) }}" required autocomplete="off">
          @error('slug')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Category Image</label>
          @if ($category->image)
           <input type="hidden" name="oldImage" id="oldImage" value="{{ $category->image }}">
           <img src="{{ asset('storage/'.$category->image) }}" class="img-preview img-fluid mb-2 col-sm-5 d-block">
          @else
           <img class="img-preview img-fluid mb-2 col-sm-5">
          @endif
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
          <p class="fw-light fst-italic">*If no image uploaded random image will be generanted</p>
        </div>
        <button type="submit" class="btn btn-primary mt-3 mb-5">Update Category</button>
    </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;
  }
</script>
@endsection