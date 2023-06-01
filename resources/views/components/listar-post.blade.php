<div>
    @if ($posts->count() == 0)
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay posts</p>
    @endif

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
        @foreach ($posts as $post)
            <a href={{route('posts.show',['post' => $post, 'user' => $post->user])}}>
                <img src={{asset('uploads') . '/' . $post->imagen}} alt={{$post->titulo}}>
            </a>
        @endforeach
    </div>

    <div class="my-10">
        {{$posts->links()}}
    </div>
</div>