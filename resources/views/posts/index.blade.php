{{-- @dd($posts) --}}

@extends('layouts.main')

@section('container')

@if ($posts->count() > 0)
 <div class="nav-scroller bg-body shadow-sm">
     <nav class="nav" aria-label="Secondary navigation">
         <?php $count = 0; ?>
         @foreach ($categories as $category)
             <?php if($count > 10) break; ?>
             <a class="nav-link {{ ($categorySlug == $category->slug) ? 'active' : '' }}" href="/blog?category={{ $category->slug }}">{{ $category->name }}</a>
             <?php $count++; ?>
         @endforeach
     </nav>
 </div>
 
 <main class="container">
 @php
  if ($posts[0]->image) {
    $post0Image = asset('storage/'.$posts[0]->image);
  } else {
    $post0Image = 'http://source.unsplash.com/1600x400?'. $posts[0]->category->name;
  } 
 @endphp
 <div class="py-4 py-md-5 px-0 mb-4 rounded text-body-emphasis bg-body-secondary" style="background-image: url('{{ $post0Image }}'); overflow:hidden;">
  <div class="py-2 px-4" style="width: 100%; background-color: rgba(0,0,0,0.7)">
    <div class="col-lg-8 px-0 text-white">
      <h1 class="display-4 fst-italic">{{ $posts[0]->title }}</h1>
      <p class="lead my-3">{{ $posts[0]->exercpt }}</p>
      <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-danger fs-5 mt-2">Read More</a>
    </div>
  </div>
 </div>   

 <div class="row mb-2">
   <?php $count = 0; ?>
   @foreach ($posts->skip(4) as $post)
   <?php if($count >= 4) break; ?>
   <div class="col-md-6">
     <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative" id="secondaryPost">
       <div class="col p-4 d-flex flex-column position-static">
         <a href="/blog?category={{ $post->category->slug }}"><strong class="d-inline-block mb-2 text-primary-emphasis">{{ $post->category->name }}</a></strong>
         <h3 class="mb-0">{{ $post->title }}</h3>
         <div class="mb-1 text-body-secondary">{{ $post->created_at->diffForHumans() }}</div>
         <p class="card-text mb-auto">{{ $post->exercpt }}</p>
         <a href="/blog/{{ $post->slug }}" class="text-danger text-decoration-none fs-5 mt-2">
           Read More
         </a>
       </div>
       <div class="col-auto d-none d-lg-block">
        <div style="max-width:300px; overflow:hidden;">
          @if ($post->image)  
            <img src="{{ asset('storage/'.$post->image) }}"  alt="img" style="height:400px">
          @else
            <img src="http://source.unsplash.com/600x900?{{ $post->category->name }}"  alt="img" style="height:400px">    
          @endif
        </div>
       </div>
     </div>
   </div>
   <?php $count++; ?>
   @endforeach
 </div>
 
 <div class="row g-5">
   <div class="col-md-8">
     <h3 class="d-flex pb-4 mt-3 fst-italic border-bottom">
      @if ($writer != null || $categoryName != null)
        All Recent Posts 
        @if ($writer != null)
          @while (strlen($writer) > 15)
           <?php $writer = preg_replace('/\W\w+\s*(\W*)$/', '$1', $writer) ;?>
          @endwhile
          {{-- Limit name without butchering the name --}}
          by <div class="text-danger ms-2">{{ $writer }}&nbsp</div>
        @endif 
        @if ($categoryName != null)
          in <div class="text-danger ms-2">{{ $categoryName }}</div>
        @endif
      @else
        Trending Right Now
      @endif
     </h3>
     <hr>
     <?php $count = 0; ?>
     @foreach ($posts->skip(1) as $post)
     <?php if($count >= 3) break; ?>
     <article class="blog-post">
       <strong class="d-inline-block text-primary-emphasis">{{ $post->category->name }}</strong>
       <h2 class="display-5 link-body-emphasis mb-1">{{ $post->title }}</h2>
       <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none text-danger">{{ $post->user->name }}</a></p>
       <div style="max-height: 400px; max-width:60%; overflow:hidden;">
        @if ($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" alt="image" class="img-fluid my-2">
        @else
            <img src="http://source.unsplash.com/600x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid my-2">
        @endif
       </div>
       <article class="my-3 fs-6">{!! $post->body !!}</article>
       {{-- {!! $post->body !!} Unprotected echo (html variables can be called) --}}
     </article>
     <?php $count++; ?>
     <hr>
     @endforeach
   </div>

   <div class="col-md-4">
     <div class="position-sticky" style="top: 2rem;">
       <div class="p-4 mb-3 bg-body-tertiary rounded">
        @if ($writer != null)
          <h4 class="fst-italic d-flex"><img src="http://source.unsplash.com/600x600?selfie-potrait" alt="" width="35" height="35" class="rounded-circle me-2"><span>@</span>{{ $writerUsername }}</h4>
          <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam doloremque temporibus officiis dolor      praesentium consequuntur quas quia, veniam ex suscipit ullam voluptate modi excepturi, qui fugiat obcaecati blanditiis,     assumenda totam?.</p>
        @else
          <h4 class="fst-italic">News</h4>
          <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam doloremque temporibus officiis dolor        praesentium consequuntur quas quia, veniam ex suscipit ullam voluptate modi excepturi, qui fugiat obcaecati blanditiis,       assumenda totam?.</p>
          @endif
       </div>
 
       <div>
         <?php $count = 0; ?>
         @foreach ($posts->skip(8) as $post)
         <?php if($count >= 3) break; ?>
          <ul class="list-unstyled">
             <li>
               <a class="d-flex flex-column gap-3 col-8 col-lg-10 mx-auto mx-md-0 align-items-start py-3 link-body-emphasis text-decoration-none border-top" href="/blog/{{ $post->slug }}">
                 <div style="max-height: 220px; overflow:hidden;">
                   @if ($post->image)  
                     <img src="{{ asset('storage/'.$post->image) }}"  alt="img" width="300">
                   @else
                     <img src="http://source.unsplash.com/800x600?{{ $post->category->name }}" alt="img" width="100%">   
                   @endif
                 </div>
                 <div class="col-lg-8">
                   <h6 class="mb-0">{{ $post->title }}</h6>
                   <small class="text-body-secondary">{{ $post->created_at->diffForHumans() }} in <span class="text-danger">{{ $post->category->name }}</span></small>
                 </div>
               </a>
             </li>
          </ul>
         <?php $count++; ?>
         @endforeach
       </div>
 
       <div class="p-4">
         <h4 class="fst-italic">Elsewhere</h4>
         <ol class="list-unstyled">
           <li><a href="https://github.com/AlbiAkhsanul" class="text-black"><i class="bi bi-github fs-2"></i></a></li>
           <li><a href="https://instagram.com/albi.a.h24" class="text-black"><i class="bi bi-instagram fs-2"></i></a></li>
           <li><a href="https://www.linkedin.com/in/albi-akhsanul-hakim-9760b2261" class="text-black"><i class="bi bi-linkedin fs-2"></i></a></li>
         </ol>
       </div>
     </div>
   </div>
 </div>

 <div>
    {{$posts->links()}}
 </div> 
@else
<h2 class="text-center text-body-secondary">No Posts Found</h2>
@endif
@endsection