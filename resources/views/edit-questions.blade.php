<x-layout>
 
 
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
                    <x-success class="text-center"/>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                   
                            @foreach ($faq as $f)
                                <tr>
                                    <form method="POST" action="/admin/faq/update/{{$f->id}}" enctype="multipart/form-data">
                                        @csrf
                                    <p><b> QUESTION </b></p>
                                    <div class="mb-6">
                                        <input class="border border-gray-200 p-2 w-full rounded"
                                        name="title"
                                        id="title"
                                        value="{{$f->title}}"
                                        required> {{old('title')}}
                                     </div>
                                
                                    <div class="mb-6">
                                    <input class="border border-gray-200 p-4 w-full rounded"
                                    name="body"
                                    id="body"
                                    value="{{$f->body}}"
                                  
                                    required> {{old('body')}}
                                    </div>
                                    <x-button>Update</x-form.button>
                                    </form>
                                 

                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>


