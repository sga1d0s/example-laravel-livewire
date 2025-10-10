<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo List')]

class TodoList extends Component
{
    public $todo = "";

    public $todos = [
        'Take out trash',
        'Do dishes',
    ];

    public function updated($property, $value)
    {
        $this->$property = strtoupper($value);
    }

    public function add()
    {
        /* añade 'todo' a array 'todos' */
        $this->todos[] = $this->todo;
        /* resetea variable 'todo' a estado inicial */
        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
