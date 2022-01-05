<x-layout>
    <div class="container mt-5">
               
        <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />
        <x-success class="text-center"/>
        <form action="" method="post" action="{{ route('contact') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf

            <div class="mb-6">
                Name
                <input class="border border-gray-200 p-4 w-full rounded"
                name="name"
                id="name"
                required> {{old('name')}}
                </div>
                <div class="mb-6">
                    Email
                    <input class="border border-gray-200 p-4 w-full rounded"
                    name="email"
                    id="email"
                    required> {{old('email')}}
                </div>
                Phone
                <div class="mb-6">
                    <input class="border border-gray-200 p-4 w-full rounded"
                    name="phone"
                    id="phone"
                    required> {{old('phone')}}
                </div>
                Subject
                <div class="mb-6">
                    <input class="border border-gray-200 p-4 w-full rounded"
                    name="subject"
                    id="subject"
                    required> {{old('subject')}}
                </div>
                <div class="mb-6">
                    Message
                    <input class="border border-gray-200 p-4 w-full rounded"
                    name="message"
                    id="message"
                    required> {{old('message')}}
                </div>
            </div>
                

                <x-button>Send</x-form.button>
        </form>
    </div>
</x-layout>


