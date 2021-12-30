@props(['faq'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $faq->title }}</h3>

            <p class="text-xs">
                Posted
                <time>{{ $faq->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $faq->body }}
        </p>
    </div>
</article>