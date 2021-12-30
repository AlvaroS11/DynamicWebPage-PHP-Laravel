<!doctype html>

<title>XPrint</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-6">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.png" alt="XPrint Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 px-2 py-2">
                

                

                
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-0 sm:block">
                    @auth
                        
                    @if(auth()->user()->administrator==1)
                        
                        
                                              
                        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
                         <!--  Category -->
                        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">

                        <div x-data="{show: false}" @click.away="show = false">
                        <button @click = "show = ! show" class=" py-0 pl-3 pr-9 text-sm font-semibold w-full
                        lg:w-32 text-center flex lg:inline-flex"> 
                        <a> Hi, {{auth()->user()->name;}} !!</a>
                       
                    

                        
                         <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                        height="22" viewBox="0 0 22 22">
                       <g fill="none" fill-rule="evenodd">
                           <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                           </path>
                           <path fill="#222"
                                 d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                       </g>
                        </svg>
                     </button>
                    
                         
                   
                    
                        
                        <div x-show="show" class = " text-center py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50">
                       
                       <a href="{{ url('/dashboard') }}" class=" block text-sm leading-8 hover:bg-grey-300 focus:bg-blue-400 hover:text-white"
                       
                        >Dashboard</a>


                        
                        <a href="{{ url('/admin/posts/create') }}" class="block text-sm leading-8 hover:bg-grey-300 focus:bg-blue-400 hover:text-white"
       
                        >New Post</a>

                        <a href="{{ url('/profile') }}" class="block text-sm leading-8 hover:bg-grey-300 focus:bg-blue-400 hover:text-white"
                 
                        >My profile</a>

                        <a href="{{ url('/admin/users') }}" class="block text-sm leading-8 hover:bg-grey-300 focus:bg-blue-400 hover:text-white"
                       
                        >Promote User</a>

                        <a href="{{ url('/admin/index') }}" class="block text-sm leading-8 hover:bg-grey-300 focus:bg-blue-400 hover:text-white"
                       
                        >Edit Posts</a>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" class="block text-sm leading-8 hover:bg-grey-300 focus:bg-blue-400 hover:text-white"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                        
                            
                        </div>
                    @else
                        <a href="{{ url('/dashboard') }}" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Dashboard</a>
                    @endauth






                    @else
                        <a href="{{ route('login') }}" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Register</a>
                        @endif
                    @endauth
                </div>
                @endif

                
                
            </div>
        </nav>

        {{ $slot }}


        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox.png" width="30" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
</body>
