@extends('layouts.main')

@section('container')
<h3 class="text-capitalize">Post <span class="text-danger">Categories</span></h3>

<div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-4 col-md-2 my-2">
            <div class="card text-white">
                <a href="/blog?category={{ $category->slug }}" class="text-decoration-none text-light" style="overflow:hidden;">
                  @if ($category->image)
                   <img src="{{ asset('storage/'.$category->image) }}" class="card-img" alt="{{ $category->slug }}" height="145">
                  @else
                   <img src="http://source.unsplash.com/600x450?{{ $category->name }}" class="card-img" alt="{{ $category->slug }}" height="145">
                  @endif
                  <div class="card-img-overlay d-flex align-items-center p-0">
                    <p class="card-title text-center flex-fill fs-5 p-2" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</p>
                  </div>
                </a>
            </div>
        </div>
      @endforeach
    </div>
</div>

<a class="btn btn-secondary mt-4" href="javascript:history.back()" role="button">Back</a>
@endsection