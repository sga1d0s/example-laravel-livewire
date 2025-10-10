<?php
// app/Livewire/Posts.php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Title;

/* Component atribute */
#[Title('Posts')]

class Posts extends Component
{
    // public $posts;

    /* public function mount()
    {
        $this->posts = Post::orderBy('id', 'asc')->get();
    }
 */
    public function render()
    {
        return view('livewire.posts', [
            'posts' => Post::all()
        ]);
    }
}