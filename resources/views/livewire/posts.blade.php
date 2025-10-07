<div>
    @foreach ($posts as $post)
        <div wire:key='{{ $post->id }}'>
            <div wire:key='{{ $post->id }}' class="flex">
                <h3 class="p-3">{{ $post->title }}</h3>
                <p class="p-3">{{ $post->text }}</p>
            </div>
        </div>
    @endforeach
</div>
