
    <x-layout>
     
    @include('header')

       
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
         <x-promoted :post="$posts[0]"/>
 
            <div class="lg:grid lg:grid-cols-2">
            @foreach ($posts->skip(1) as $model)
            <x-card :post="$model" class="col-span-2"/>
            @endforeach
            

            <div class="lg:grid lg:grid-cols-3">
            </div> 
           
        @else
            <p class="text-center"> NO PRODUCTS YET. PLEASE TRY LATER. </p>
        @endif

        
            
        </main>


        </x-layout>
