@props(['post'])


<article  class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <a href="/posts/{{$post->id}}">
            
                    <div class="py-6 px-5">
                        <div>
                        <!-- TERMINAR -->
                        @if ( !empty($post->imgs[0]))
                        <img src="{{asset('storage/postImages/'. $post->imgs[0]->file_path)}}" alt="Blog Post illustration" class="rounded-xl">
                        @endif
                       
                        </div>

                        <div class="mt-4 flex flex-col justify-between">

                       
                        <div class="space-x-2">
                            @foreach ($post->categories as $category)
                            <a href="/categories/{{$category->slug}}" 
                            class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold" >
                            {{$category -> name}}
                            </a>
                            @endforeach
                                
                                <a style="font-size: 10px">{{$post->name}}</a>

                                <div class="mt-2 flex flex-col justify-between">
                                    <header>
                                        <div class="mt-4">
                                            <h1 class="text-3xl">
                                                {{$post->title}}
                                            </h1>
        
                                            <span class="mt-2 block text-gray-400 text-xs">
                                                Published <time> {{$post->created_at->diffForHumans()}}</time>
                                            </span>
                                        </div>
                                    </header>
        
                                    <footer class="flex justify-between items-center mt-8">
                                        <div class="flex items-center text-sm">
                                            @if ( !is_null($post->user->file_path))
                                            <img src=" {{asset('storage/avatars/'. $post->user->file_path )}}" alt="AVATAR" width="40" height="40" >
                                            @endif
                                            <div class="ml-3">
                                                @if ($post->user != null)
                                                <h5 class="font-bold">{{$post->user->name}}</h5>
                                                <h6> {{$post->user->me}}</h6>
                                                @endif
                                                
                                            </div>
                                        </div>
        
                                        <div>
                                            <a href="/posts/{{$post->id}}"
                                               class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8" >
                                                Read More
                                            </a>
                                        </div>
                                    </footer>
                                </div>

                      </div>
                                     
                        </div>
                 
         </div>
        </a>
 </article>
