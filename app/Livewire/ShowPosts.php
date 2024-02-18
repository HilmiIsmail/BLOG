<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    use WithFileUploads;

    public string $campo = "id";
    public string $orden = "desc";
    public string $buscar = "";

    //show
    public bool $openShowModal = false;
    public Post $post;

    #[On('crearOK')] // evento para actualizar la pagina y mostrar el post creado
    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
            ->where(function ($q) {
                $q->where('titulo', 'like', "%" . $this->buscar . "%")
                    ->orWhere('disponible', 'like', "%" . $this->buscar . "%");
            })
            ->orderBy($this->campo, $this->orden)
            ->paginate(5);
        return view('livewire.show-posts', compact('posts'));
    }

    /* ORDENAR */
    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }

    /* SEARCH */
    public function updatingBuscar()
    {
        $this->resetPage();
    }

    /* BORRAR */
    public function pedirConfirmacion(Post $post)
    {
        $this->authorize('delete', $post);
        $this->dispatch('confirmarBorrar', $post->id);
    }
    #[On('borrarOK')]
    public function delete(Post $post)
    {
        $this->authorize('delete', $post);
        if (basename($post->imagen) != 'noimagen.png') {
            Storage::delete($post->imagen);
        }
        $post->delete();
        $this->dispatch("mensaje", "Post eliminado correctamente");
    }

    /* UPDATE */

    /* DETALLE */
    public function detalle(Post $miPost)
    {
        $this->post = $miPost;
        $this->openShowModal = true;
    }
    public function cancelarDetalle()
    {
        $this->reset(["openShowModal", "post"]);
    }
}
