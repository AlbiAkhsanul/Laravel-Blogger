<div class="container d-flex">
    <div class="col-lg-9">
       <h3 class="d-flex mt-3">
           All Recent Posts 
       @if ($user != null)
           by <div class="text-danger ms-2">{{ $user->name }}</div>
       @endif 
       @if ($category != null)
           in <div class="text-danger ms-2">{{ $category->name }}</div>
       @endif
       </h3>
   
       @if ($posts->count() > 0)
        <div class="card mb-3">
           <img src="http://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="master-card-img">
           <div class="card-body">
           <a href="/blog/{{ $posts[0]->slug }}" class="card-title text-decoration-none text-black fs-2 mb-2">{{ $posts[0]->title }}</a>
            <div class="d-flex fs-4 text-secondary">
               by: 
               <a href="/blog?user={{ $posts[0]->user->username }}" class="text-black text-decoration-none mx-2">
                   {{ $posts[0]->user->name }} 
               </a>
               in
               <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-danger text-decoration-none ms-2">
                  {{ $posts[0]->category->name }}
               </a>
            </div>
               <p class="card-text text-body-secondary fs-6">{{ $posts[0]->created_at->diffForHumans() }}</p>
   
               <p class="card-text fs-5">{{ $posts[0]->exercpt }}</p>
               
               <a href="/blog/{{ $posts[0]->slug }}" class="btn btn-danger fs-5">Read More</a>
           </div>
        </div>
        
        <div class="container">
           <div class="row">
               @foreach ($posts->skip(1) as $post)
               <div class="col-md-4">
                   <div class="card mb-3" style="height:35rem">
                       <a href="/blog?category={{ $post->category->slug }}" class="btn btn-sm text-white mb-3 position-absolute" style="width:fit-content; background-color: rgba(206, 17, 17, 0.7)">{{ $post->category->name }}</a>
                       <img src="http://source.unsplash.com/600x450?{{ $post->category->name }}" class="card-img-top" alt="card-img">
                       <div class="card-body d-flex flex-column ">
                           <a href="/blog/{{ $post->slug }}" class="card-title text-decoration-none text-black"><h5>{{ $post->title }}</h5></a>
                           <small>
                               <div class="d-flex">
                                   <p>by:</p>
                                   <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none text-danger ms-1">
                                     @while (strlen($post->user->name) > 15)
                                       <?php $post->user->name = preg_replace('/\W\w+\s*(\W*)$/', '$1', $post->user->name) ;?>
                                     @endwhile
                                     {{  $post->user->name }}
                                   </a>
                                   <p class="card-text text-body-secondary ms-1">{{ $post->created_at->diffForHumans() }}</p>
                               </div>
                           </small>
                           <p class="card-text">{{ mb_strimwidth( $post->exercpt , 0, 140, "...") }}</p>
                           <a href="/blog/{{ $post->slug }}" class="btn text-danger mt-auto text-start">Read More</a>
                       </div>
                   </div>
               </div>
               @endforeach
           </div>
        </div>
        
        <div>
         {{$posts->links()}}
        </div>
       
       @else
       <h2 class="text-center text-body-secondary">No Posts Found</h2>
       @endif
    </div>
   
    <div class="container">
       @switch($content)
           @case('category')
               {{-- Other Categories --}}
               <p class="fs-3">Other <span class="text-danger">Categories</span></p>
               @foreach ( $categories as $category )
                 @if ( $category->slug !== $slug)
                   <a href="/blog?category={{ $category->slug }}" class="btn btn-danger btn-sm mb-1">{{ $category->name }}</a>
                 @endif
               @endforeach
               <hr class="bg-danger border-2 border-top border-danger">
               <p class="mt-3">
               Cant Find What You're Looking For?
               <a href="/categories" class="btn btn-outline-danger btn-sm mt-1">
                   More Categories
               </a>
               </p>
               @break
           @default
               {{-- Categories --}}
               <p class="text-danger fs-3">Categories</p>
               @foreach ( $categories as $category )
                 <a href="/blog?category={{ $category->slug }}" class="btn btn-danger btn-sm mb-1">{{ $category->name }}</a>
               @endforeach
               <hr class="bg-danger border-2 border-top border-danger">
               <p class="mt-3">
               Cant Find What You're Looking For?
               <a href="/categories" class="btn btn-outline-danger btn-sm mt-1">
                   More Categories
               </a>
               </p>
   
               @if ($content === 'user')
                   {{-- User Profile --}}
                   <div class="card text-bg-light mt-4" style="max-width: 18rem;">
                       <div class="card-header">@<span>{{$user->username}}</span></div>
                       <div class="card-body">
                         <i class="bi bi-person-circle fs-1"></i>
                         <h5 class="card-title">{{$user->name}}</h5>
                         <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam sapiente placeat ipsa distinctio aliquid eum officia nostrum reiciendis incidunt, illo est, adipisci cumque tenetur nulla dolore maiores odio amet rem.</p>
                       </div>
                   </div>
               @endif 
       @endswitch
    </div>
</div>