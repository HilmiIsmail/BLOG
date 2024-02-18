<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearPost extends Component
{
    use WithFileUploads;

    public bool $openCrearModal = false;

    //aquí debe poner los mismos nombres que hemos puesto en wire:model en  el formulario de creación
    #[Validate(['nullable', 'image', 'max:2048'])]
    public $imagen;

    #[Validate(['required', 'string', 'min:3', 'unique:posts,titulo'])]
    public string $titulo = "";

    #[Validate(['required', 'string', 'min:10'])]
    public string $contenido = "";

    #[Validate(['nullable'])]
    public string $disponible = "";

    #[Validate(['required', 'exists:categories,id'])]
    public string $categoria = "";


    public function render()
    {
        $categorias = Category::select('nombre', 'id')->orderBy('nombre')->get();
        return view('livewire.crear-post', compact('categorias'));
    }

    public function store()
    {
        $this->validate();
        Post::create([
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'imagen' => ($this->imagen) ? $this->imagen->store('posts') : 'posts/noimagen.png',
            'disponible' => ($this->disponible) ? "SI" : "NO",
            'category_id' => $this->categoria,
            'user_id' => Auth::user()->id // este es el id del usuario autenticado
        ]);
        $this->dispatch('mensaje', 'El post se ha creado correctamente'); // para mostrar un mensaje con toast
        $this->dispatch('crearOK')->to(ShowPosts::class); //para refresh  la tabla posts
        $this->cancelCrearModal();
    }

    public function cancelCrearModal()
    {
        $this->reset(['openCrearModal', 'titulo', 'contenido', 'disponible', 'imagen', 'categoria']);
    }
}
