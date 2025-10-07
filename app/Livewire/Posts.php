<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts;

    public function render()
    {
        $this->posts = Post::orderBy('title', 'desc')->get();
        return view('livewire.posts');
    }
}
