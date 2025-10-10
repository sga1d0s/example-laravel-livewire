<div>
    {{-- Todo list example --}}

    <form wire:submit='add'>
        <input type="text" wire:model.live.debounce='todo'>
        <br>
        <div>
            <label for="add">{{ $todo }}</label>
            <button id="add" type="submit">Add</button>

        </div>
    </form>

    <ul>
        @foreach ($todos as $todo)
            <div class="todo-item" {{-- wire:key='{{ $todo->index }}' --}}>
                <li>{{ $todo }}</li>
                <button type="button" wire:click='{{-- delete({{ $todo->index }}) --}}'>Delete</button>
            </div>
        @endforeach
    </ul>
</div>
