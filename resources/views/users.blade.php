<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    
    
    <form method="POST" action="/admin/users/update" enctype="multipart/form-data">
        @csrf
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-success />
                    Select the User you want to promote to admin:

                    
                    <select name="id" id="id" required>>
                        @foreach (\App\Models\User::all() as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('id', $user->id) == $user->id ? 'selected' : '' }}
                                >{{ ucwords($user->name) }}</option>
                                
                        @endforeach
                        

                    </select>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-3">
                            {{ __('update') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</x-app-layout>

