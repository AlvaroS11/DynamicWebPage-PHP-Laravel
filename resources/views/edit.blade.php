<x-layout>
 
    <section class="max-w-lg mx-auto">
        <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
                    <x-success class="text-center"/>

        <p> You are editing the post:  <b> <em>{{$post->title}} </em> </b></p>
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <input class="border border-gray-200 p-2 w-full rounded"
                name="title"
                id="title"
                value="{{$post->title}}"
                required> {{old('title')}}
             </div>

            <div class="mb-6">
            <input class="border border-gray-200 p-4 w-full rounded"
            name="body"
            id="body"
            value="{{$post->body}}"
          
            required> {{old('body')}}
            </div>
            
            


            <div class="grid grid-rows-2 gap-6">
                <div>
                    <x-label for="file_path" :value="__('Add files')" />
                    <x-input id="file_path" class="block mt-1 w-full" type="file" name="file_path" value="{{ auth()->user()->file_path }}" autofocus />
                </div>
            </div>

    
  <!-- Write your comments here   
                    {{--}}  
            <div class="mb-6 ml-7">
            <select name="category_id1" id="category_id" required>
                <option>
                        None
                    </option>
                 
                @foreach (\App\Models\Category::all() as $category)
                    @if(isset($post->categories[0]))
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->categories[0]->id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                    @else
                        <option
                         value="{{ $category->id }}"
                         {{ old('category_id') == $category->id ? 'selected' : '' }}
                         >{{ ucwords($category->name) }}</option>
                    @endif
                @endforeach
            </select>

            <select name="category_id2" id="category_id" class="ml-5" required>
                <option>
                    None
                </option>
                        
                @foreach (\App\Models\Category::all() as $category)
                @if(isset($post->categories[1]))
                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $post->categories[0]->id) == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                    @else
                    <option
                     value="{{ $category->id }}"
                     {{ old('category_id') == $category->id ? 'selected' : '' }}
                     >{{ ucwords($category->name) }}</option>
                @endif
            @endforeach
            </select>

            <select name="category_id3" id="category_id" class="ml-5" required>
                <option>
                    None
                </option>
                        
                @foreach (\App\Models\Category::all() as $category)
                     @if(isset($post->categories[2]))
                          <option
                          value="{{ $category->id }}"
                         {{ old('category_id', $post->categories[0]->id) == $category->id ? 'selected' : '' }}
                         >{{ ucwords($category->name) }}</option>
                         @else
                         <option
                          value="{{ $category->id }}"
                          {{ old('category_id') == $category->id ? 'selected' : '' }}
                          >{{ ucwords($category->name) }}</option>
                     @endif
                @endforeach
            </select>
        </div>
    --}}
--> 

            <x-button>Update</x-form.button>
        </form>
        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($post->imgs as $img)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    <img src=" {{asset('storage/postImages/'. $img->file_path )}}" alt="Post Img" width="40" height="40" >
                                    
                                    <p>{{ $img->file_path}}</p>
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form method="POST" action="/admin/imgs/{{ $img->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')

                                <button class="text-xs text-red-400">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</x-layout>