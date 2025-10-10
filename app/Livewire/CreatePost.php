<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Validate;

class CreatePost extends Component
{
    public $posts;

     /* variable require con alias */
    #[Validate('required|min:3')] 
    public $title = '';
 
    #[Validate('required|min:3', as: 'content')] 
    public $text = '';

    public function save()
    {
        $author = Auth::check() ? Auth::user()->name : null;

        /* forma de validar campos general */
        $this->validate();

        $post = Post::create([
            'title' => $this->title,
            'text' => $this->text,
        ]);

        $this->dispatch('post-created', author: $author);

        return redirect()->to('posts')
            ->with('status', 'Post created!');
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
            /* asigna el autor  */
            'author' => Auth::check() ? Auth::user()->name : null,
        ]);
    }
}
