<x-layout>

    
            <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
                <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                    <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                      
                      
                      
                        <p class="max-w-6xl mx-auto mt-6 mt-4 block relative inline-flex items-center" style="flex-shrink: 0;max-width:800px">
                        <x-img-slider :post="$post" />
                    </p>
                       
    
                        <p class="mt-4 block text-gray-400 text-xs">
                            Published <time> {{$post-> created_at}}</time>
                        </p>
    
                        <div class="flex items-center lg:justify-center text-sm mt-4">
                          
                           @if ( !empty($post->user->file_path))
                           <img src=" {{asset('storage/avatars/'. $post->user->file_path )}}" alt="AVATAR" width="40" height="40" >
                           @endif
                           
                            
                            <div class="ml-3 text-left">
                                
                                <h5 class="font-bold">{{$post->user->name}}</h5>
                                
                            </div>
                        </div>
                    </div>
    
                    <div class="col-span-8">
                        <div class="hidden lg:flex justify-between mb-6">
                            <a href="/"
                                class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current"
                                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>
    
                                Back to Posts
                            </a>
    
                    
  

                         @foreach ($post -> categories as $object)        
                     <a href="/categories/{{$object->slug}}"
                      class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                          style="font-size: 10px">{{$object->name}}</a>
                         @endforeach

                         
                        </div>
    
                        <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                            {{$post -> title}}
                        </h1>
                        <div class="space-y-4 lg:text-lg leading-loose">
                           {{$post -> body}}
                        </div>
                    </div>

                    @auth
                    
                    <div class="col-span-8 col-start-5 mt-10 space-y-6">
                    
                        <form method="POST" action="/posts/{{ $post->id }}/comments">
                            @csrf
                
                            <header class="flex items-center">
                                <img src=" {{asset('storage/avatars/'. $post->user->file_path )}}" alt="AVATAR" width="40" height="40"class="rounded-full" alt="User picture" width="30" height="30" >
                                <h2 class="ml-4">Want to comment?</h2>
                            </header>
                
                            <div class="mt-6">
                                <textarea name="body" rows="4" placeholder="You can write your comment here!"  class="w-full text-sm focus:outline-none focus:ring bg-gray-100" required></textarea>
                
                                @error('body')
                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                
                            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                                <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                        Submit
                                    </button>
                            </div>
                        </form>
                    </div>
                    
                    
                @else
                    <div class="col-span-4 col-start-5 mt-10 space-y-6">
                        <a href="/login" class="hover:underline"> <em> Log in to leave a comment </em></a>
                    </div>    
                    @endauth


                    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach ($post->comments as $comment)
                            <x-comments :comment="$comment" :post="$post" />
                        @endforeach
                    </section>

                </article>
            </main>
    
           
        </section>

    

</x-layout>