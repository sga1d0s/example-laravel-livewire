<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;

class CreatePost extends Component
{
    public $title;
    public $text;
    public $posts;

    public function save()
    {
        Post::create([
            'title' => $this->title,
            'text' => $this->text,
        ]);

        return redirect()/* ->to('posts')
        ->with('status', 'Post created!') */;
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
        }

        $this->posts = Post::all();
    }

    public function render()
    {
        $this->posts = Post::orderBy('title')->get();
        
        return view('livewire.create-post')->with([
            'author' => Auth::user()->name,
        ]);
    }
}
