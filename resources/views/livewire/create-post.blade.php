<div>
    {{-- Post test --}}
    <h1>Create Post Component</h1>

    {{-- acceso a propiedades del PHP con '$wire' --}}
    Current title <span x-text="$wire.title.toUpperCase()"></span>

    {{-- llamada a la función 'save()' del php --}}
    <button type="button" class="my-3" x-on:click="$wire.save()">submit</button>

    <form wire:submit='save'>
        <div class="flex flex-col items-left space-y-3 w-40">
            <label>
                <span>Title:</span>
                <input type="text" wire:model='title'>
                @error('title')
                    <em>{{ $message }}</em>
                @enderror
            </label>

            <label>
                <span>Text:</span>
                <textarea type="text" wire:model='text'></textarea>
                <small>Characters
                    {{-- contar las letras con método length --}}
                    <span x-text="$wire.text.length"></span>
                </small>
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
