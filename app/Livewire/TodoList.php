<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todo List')]

class TodoList extends Component
{
    public $todos = [];
    public $todo = '';

    public function updated($property, $value)
    {
        $this->$property = strtoupper($value);
    }

    public function mount()
    {
        $this->todos = [
            'Take out trash',
            'Do dishes',
        ];
    }

    public function add()
    {
        /* añade 'todo' a array 'todos' */
        $this->todos[] = $this->todo;

        /* vuelve a setear la variable a '' */
        // $this->todo = '';

        /* resetea variable 'todo' a estado inicial */
        $this->reset('todo');
    }

    public function delete($id)
    {
        $todo = TodoList::find($id);

        if ($todo) {
            $todo->delete();
        }

        $this->todos = TodoList::all();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
