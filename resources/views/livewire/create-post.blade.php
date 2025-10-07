<div>
    {{-- Post test --}}
    <h1>Create Post Component</h1>
    {{--     <div>
        <h2>Title: {{ $title }}</h2>
    </div> --}}
    <span>Author: {{ $author }}</span>

    <form wire:submit='save'>
        <label for="title">Title:</label>
        <input type="text" id="title" wire:model='title'>

        <label for="text" id="text">Text:</label>
        <input type="text" id="text" wire:model='text'>

        <button type="submit">Save</button>
    </form>

    <div>
        @foreach ($posts as $post)
            <div>

            </div>
            <div wire:key='{{ $post->id }}' class="flex m-3">
                <h3 class="p-3">{{ $post->title }}</h3>
                <p class="p-3">{{ $post->text }}</p>

                <button wire:click='delete({{ $post->id }})'
                    style=" color: red; border: none; cursor: pointer;">
                    Eliminar
                </button>
            </div>
        @endforeach
    </div>
</div>
