@props(['post'])


<article  class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <a href="/posts/{{$post->id}}">
            
                    <div class="py-6 px-5">
                        <div>
                        <!-- TERMINAR -->
                            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
                        </div>

                        <div class="mt-4 flex flex-col justify-between">

                        @foreach ($post->categories as $object)
                        <div class="space-x-2">
                            <a href="/categories/{{$object->slug}}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{$object->name}}</a>

                                <div class="mt-2 flex flex-col justify-between">
                                    <header>
                                        <div class="mt-4">
                                            <h1 class="text-3xl">
                                                {{$post->title}}
                                            </h1>
        
                                            <span class="mt-2 block text-gray-400 text-xs">
                                                Published <time> {{$object->created_at}}</time>
                                            </span>
                                        </div>
                                    </header>
        
                                    <footer class="flex justify-between items-center mt-8">
                                        <div class="flex items-center text-sm">
                                            <img src="/images/lary-avatar.svg" alt="Lary avatar">
                                            <div class="ml-3">
                                                @if ($post->user != null)
                                                <h5 class="font-bold">{{$post->user->name}}</h5>
                                                @endif
                                                <h6>Mascot at Laracasts</h6>
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
                        @endforeach
         </div>
        </a>
 </article>
