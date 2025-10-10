<div>
    {{-- Post test --}}
    <h1>Create Post Component</h1>

    {{-- acceso a propiedades del PHP con '$wire' --}}
    Current title <span x-text="$wire.title.toUpperCase()"></span>

    {{-- llamada a la función 'save()' del php --}}
    <button type="button" class="my-3" x-on:click="$wire.save()">submit</button>

    <form wire:submit='save'>
        <label>
            <span>Title:</span>
            <input type="text" wire:model='title'>
            @error('title')
                <em>{{ $message }}</em>
            @enderror
        </label>

        <label>
            <span>Text:</span>
            <textarea wire:model='text'></textarea>
            <small>
                Characters <span x-text="$wire.text.length"></span>
            </small>
            @error('text')
                <em>{{ $message }}</em>
            @enderror
        </label>

        <button type="submit">Save</button>
    </form>

    <div>
        @foreach ($posts as $post)
            <div class="post-item" wire:key="{{ $post->id }}">
                <li>
                    <strong>{{ $post->title }}</strong> — {{ $author }}
                </li>
                <li>
                    <strong>{{ $post->text }}</strong>
                </li>
                <button wire:click="delete({{ $post->id }})" wire:confirm="¿Seguro que quieres eliminar?">
                    Delete
                </button>
            </div>
        @endforeach
    </div>
</div>
