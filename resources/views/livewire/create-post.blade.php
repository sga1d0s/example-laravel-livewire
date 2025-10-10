<div>
    {{-- Post test --}}
    <h1>Create Post Component</h1>

    <div x-data="{ count: 0 }">
        <span x-text="count"></span>
    </div>

    <form wire:submit='save'>
        <div class="block">
            <label>
                <span>Title:</span>
                <input type="text" wire:model='title'>
                @error('title')
                    <em>{{ $message }}</em>
                @enderror
            </label>

            <label>
                <span>Text:</span>
                <input type="text" wire:model='text'>
                @error('text')
                    <em>{{ $message }}</em>
                @enderror
            </label>
            <button type="submit">Save</button>

        </div>


    </form>

    <div>
        @foreach ($posts as $post)
            <div>

            </div>
            <div wire:key='{{ $post->id }}' class="flex m-3">
                <li><strong>{{ $post->title }}</strong> - {{ $author }} - </li>

                <button wire:click='delete({{ $post->id }})' wire:confirm='¿Seguro que quieres eliminar?'
                    class="border p-1 rounded-lg">
                    Eliminar
                </button>
            </div>
        @endforeach
    </div>
</div>
