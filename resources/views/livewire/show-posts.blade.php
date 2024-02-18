<x-propios.principal>
    <div class="flex w-full mb-1 items-center">
        <div class="flex-1">
            <x-input type="search" placeholder="Buscar..." class="w-3/4" wire:model.live='buscar' /><i
                class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div>
            @livewire('crear-post')
        </div>
    </div>
    @if (count($posts))
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        INFO
                    </th>
                    <th scope="col" class="px-6 py-3">
                        IMAGEN
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click='ordenar("titulo")'>
                        <i class="fa-solid fa-sort mr-2"></i>TITULO
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click='ordenar("disponible")'>
                        <i class="fa-solid fa-sort mr-2"></i>DISPONIBLE
                    </th>
                    <th scope="col" class="px-6 py-3 cursor-pointer" wire:click='ordenar("category_id")'>
                        <i class="fa-solid fa-sort mr-2"></i>CATEGORIA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr
                        class="bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="px-6 py-4">
                            <button wire:click='detalle({{ $item->id }})'>
                                <i class="fas fa-info text-xl"></i>
                            </button>
                        </th>
                        <td scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="{{ Storage::url($item->imagen) }}" alt="">
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->titulo }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <button @class([
                                    'h-4 w-4 mr-2 rounded-full',
                                    'bg-green-500 ' => $item->disponible == 'SI',
                                    'bg-red-500' => $item->disponible == 'NO',
                                ])></button> {{ $item->disponible }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->category->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click='pedirConfirmacion({{ $item->id }})'
                                class="fas fa-trash text-xl text-red-500"></button>
                            <button class="fas fa-edit text-xl text-blue-500"></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="p-4 my-2 text-gray-100  bg-slate-600 rounded">No hay posts <i
                class="fa-regular fa-face-frown ms-1"></i></p>
    @endif
    <div class="mt-2">
        {{ $posts->links() }}
    </div>
    {{-- MODAL DETALLE --}}
    @isset($post)
        <x-dialog-modal wire:model='openShowModal'>
            <x-slot name="title">
                INFOS POST
            </x-slot>
            <x-slot name="content">
                <div class=" w-full mx-auto lg:max-w-full lg:flex">
                    <img src="{{ Storage::url($post->imagen) }}"
                        class="h-72 w-full lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
                    </img>
                    <div
                        class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <span class="p-1 rounded-full w-auto bg-blue-400 font-normal text-gray-700 dark:text-gray-400">
                                {{ $post->category->nombre }}
                            </span>
                            <div class="text-gray-900 font-bold text-xl my-2">
                                {{ $post->titulo }}
                            </div>
                            <p class="text-gray-700 text-base">
                                {{ $post->contenido }}
                            </p>
                        </div>
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full mr-4" src="{{ Storage::url($post->imagen) }}"
                                alt="">
                            <div class="text-sm">
                                <p class="text-gray-900 leading-none">{{ $post->user->name }}</p>
                                <p class="text-gray-600"><b>Creado </b>{{ $post->created_at->diffForHumans() }}</p>
                                <p class="text-gray-600"><b>Actualizado </b>{{ $post->updated_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <button wire:click='cancelarDetalle'
                    class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Cancelar</button>
            </x-slot>
        </x-dialog-modal>
    @endisset

    {{-- FIN MODAL DETALLE --}}
</x-propios.principal>
