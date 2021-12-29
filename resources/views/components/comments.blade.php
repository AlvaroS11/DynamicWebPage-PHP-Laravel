@props(['comment', 'post'])

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src=" {{asset('storage/avatars/'. $comment->user->file_path )}}" alt="AVATAR" width="40" height="40"class="rounded-full" alt="User picture" width="30" height="30" >

    </div>

    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ $comment->user->username }}</h3>

            <p class="text-xs">
                Posted
                <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>