@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-capitalize">{{ $post->title }}</h2>
            <div class="d-flex fs-4 mb-2">
                <p class="text-secondary">by: <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none text-black">{{ $post->user->name }}</a> in category</p>
                <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-danger ms-2">{{$post->category->name }}</a>
            </div>

            <div style="max-height: 400px; overflow:hidden;">
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" alt="image" class="img-fluid my-2">
            @else
                <img src="http://source.unsplash.com/600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-2">
            @endif
            </div>

            <article class="my-3 fs-5">{!! $post->body !!}</article>
            {{-- {!! $post->body !!} Unprotected echo (html variables can be called) --}}
            <a class="btn btn-secondary" href="javascript:history.back()" role="button">Back</a>
        </div>
    </div>
</div>
@endsection