<x-layout>
    
    <div class="text-center bg-blue-100 text-lg">
       <b> Frequently asked questions </b>
    </div>
    <section class="col-span-8 col-start-5 mt-10 space-y-6">
                        @foreach ($faqs as $comment)
                            <x-questions :faq="$comment" />
                        @endforeach
                    </section>
</x-layout>