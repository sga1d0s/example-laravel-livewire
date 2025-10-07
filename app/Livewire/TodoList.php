<?php
 
namespace App\Livewire;
 
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
 
class TodoList extends Component
{
    public $todos = [];
 
    public $todo = '';
 
    public function mount()
    {
        $this->todos = Auth::user()->todos; 
    }
 
    // ...
}