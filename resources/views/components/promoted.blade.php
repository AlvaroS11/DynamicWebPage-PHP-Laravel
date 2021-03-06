@props(['post'])

<article class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    
                    <div class="flex-1 sm:mr-8">
                        
          

                     
                       @if (isset($post->imgs[0]))
                        <img src="{{asset('storage/postImages/'. $post->imgs[0]->file_path)}}" alt="Blog Post illustration" class="rounded-xl" width="400">
                        @endif
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
                            <div class="space-x-2">
  
                                <a href="/categories/<?= $post->categories->first()->slug;?>"
                                   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                   style="font-size: 10px"><?=$post->categories->first()->slug?></a>
                                    
                                
                            </div>

                            <div class="mt-4">
                                <h1 class="text-3xl">
                                    {{ $post -> title }}
                                </h1>

                                <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>1 day ago</time>
                                    </span>
                            </div>
                        </header>

                        <div class="text-sm mt-2">
                            <p>
                            {{ $post -> body }}
                            </p>

                            <p class="mt-4">
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <a href="/author/{{$post->user_id}}">
                            <div class="flex items-center text-sm">
                                @if ( !is_null($post->user->file_path))
                                <img src=" {{asset('storage/avatars/'. $post->user->file_path )}}" alt="AVATAR" width="40" height="40" >
                                @endif
                                <div class="ml-3">
                                    @if ($post->user != null)
                                                <h5 class="font-bold">{{$post->user->name}}</h5>
                                                <h6>{{$post->user->me}}</h6>
                                                @endif
                                    
                                   
                                </div>
                            </div>

                            <div class="hidden lg:block">
                                <a href="/posts/{{$post->id}}"
                                   class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                >ReadMore</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>