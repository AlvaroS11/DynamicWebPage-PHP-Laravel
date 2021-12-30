<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
            
           
            
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-success />
                    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
                        @method('PUT')
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div class="grid grid-rows-3 gap-6">
                                <div>
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ auth()->user()->name }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ auth()->user()->email }}" autofocus />
                                </div>
                                <div>
                                    <x-label for="username" :value="__('Username (optional)')" />
                                    <x-input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ auth()->user()->username }}" autofocus />
                                </div>
                            </div>
                            <div class="grid grid-rows-3 gap-6">
                                <div>
                                    <x-label for="new_password" :value="__('New password')" />
                                    <x-input id="new_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password"
                                             autocomplete="new-password" />
                                </div>
                                <div>
                                    <x-label for="confirm_password" :value="__('Confirm password')" />
                                    <x-input id="confirm_password" class="block mt-1 w-full"
                                             type="password"
                                             name="password_confirmation"
                                             autocomplete="confirm-password" />
                                </div>
                                <div>
                                    <x-label for="birthday" :value="__('Birthday (optional)')" />
                                    <x-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" value="{{ auth()->user()->birthday }}" autofocus />
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="grid grid-rows-1 gap-6">
                            <div>
                                <x-label for="me" :value="__('About me (optional)')" />
                                <x-input id="me" class="block mt-1 w-full" type="text" name="me" value="{{ auth()->user()->me }}" autofocus />
                            </div>


                            <div class="grid grid-rows-2 gap-6">
                                <div>
                                    <x-label for="file_path" :value="__('Avatar(optional)')" />
                                    <x-input id="file_path" class="block mt-1 w-full" type="file" name="file_path" value="{{ auth()->user()->file_path }}" autofocus />
                                </div>
                            </div>

                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
