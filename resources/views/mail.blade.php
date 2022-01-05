<x-layout>   
    <h2 class="font-semibold text-xl text-center text-gray-800  sm:px-6 lg:px-8 lg:py-8">
        {{ __('Emails') }}
    </h2>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
                    <x-success class="text-center"/>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($mail as $received)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                             
                                                <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    

                                                    <div>
                                                        <header class="mb-4">
                                                            <h1 class="font-bold">{{ $received->name }}</h3>
                                                
                                                            <p class="text-xs">
                                                                Phone: 
                                                                <h2 class="font-bold">{{ $received->phone }}</h3>
                                                            </p>
                                                            <p class="text-md">
                                                                Subject: 
                                                                <h3 class="font-bold">{{ $received->subject }}</h3>
                                                            </p>
                                                        </header>
                                                
                                                        <p>
                                                            {{ $received->message }}
                                                        </p>

                                                        <p class="text-xs">
                                                            Email: 
                                                            <h4 class="font-bold">{{ $received->email }}</h4>
                                                        </p>

                                                        <p class="text-xs">
                                                            Sent on: 
                                                            <time>{{ $received->created_at->diffForHumans() }}</time>
                                                        </p>
                                                    </div>

                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <form method="POST" action="/admin/emails/{{ $received->id }}">
                                                            @csrf
                                                            @method('DELETE')
                
                                                            <button class="text-xs text-red-400">Delete</button>
                                                        </form>
                                                    </td>
                                                </article>
                                                </a>
                                            </div>
                                        </div>
                                    </td>

                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>