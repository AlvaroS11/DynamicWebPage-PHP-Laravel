<x-layout>
 
    <section class="max-w-lg mx-auto">
        <p> CREATE NEW POST </p>
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <input class="border border-gray-200 p-2 w-full rounded"
                name="title"
                id="title"
                required> {{old('title')}}

                
            
             </div>

            <div class="mb-6">
            <input class="border border-gray-200 p-4 w-full rounded"
            name="body"
            id="body"
            required> {{old('body')}}
            </div>


            <div class="grid grid-rows-2 gap-6">
                <div>
                    <x-label for="file_path" :value="__('Add files')" />
                    <x-input id="file_path" class="block mt-1 w-full" type="file" name="file_path" value="{{ auth()->user()->file_path }}" autofocus />
                </div>
            </div>


            <div class="mb-6 ml-7">
            <select name="category_id1" id="category_id" required>
                <option>
                        None
                    </option>
                        
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            <select name="category_id2" id="category_id" class="ml-5" required>
                <option>
                    None
                </option>
                        
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            <select name="category_id3" id="category_id" class="ml-5" required>
                <option>
                    None
                </option>
                        
                @foreach (\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </select>
        </div>


            <x-button>Publish</x-form.button>
        </form>
    </section>
</x-layout>