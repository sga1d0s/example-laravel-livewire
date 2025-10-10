<div>
    {{-- Todo list example --}}

    <form wire:submit='add'>
        <input type="text" wire:model.blur='todo'>
        <br>
        <div>
            <label for="add">{{ $todo }}</label>
            <button id="add" type="submit">Add</button>

        </div>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>
</div>
