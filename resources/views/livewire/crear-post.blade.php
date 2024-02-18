<div>
    <button wire:click="$set('openCrearModal', true)"
        class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        <i class="fas fa-add mr-2"></i>NUEVO
    </button>

    <x-dialog-modal wire:model='openCrearModal'>
        <x-slot name="title">
            NUEVO POST
        </x-slot>

        <x-slot name="content">
            <div class="mb-5">
                <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título</label>
                <input type="titulo" id="titulo" wire:model='titulo'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Titulo de post..." />
                <x-input-error for="titulo" />
            </div>
            <div class="mb-5">
                <label for="contenido"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                <textarea type="contenido" id="contenido" rows="4" wire:model='contenido'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Contenido de post..."></textarea>
                <x-input-error for="contenido" />
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponible</label>
                <input id="disponible" type="checkbox" value="" wire:model='disponible'
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disponible" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">SI</label>
                <x-input-error for="disponible" />
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                <select id="categoria" wire:model='categoria'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Seleccione una categoría....</option>
                    @foreach ($categorias as $item)
                        <option value="{{ $item->id }}"> {{ $item->nombre }} </option>
                    @endforeach
                </select>
                <x-input-error for="categoria" />
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                <div class="h-96 w-full rounded bg-gray-300 relative">
                    @if ($imagen)
                        <img src="{{ $imagen->temporaryUrl() }}" class="bg-cover bg-no-repeat bg-center w-full h-full">
                    @endif
                    <input type="file" hidden accept="image/*" id="imagenC" wire:model='imagen'>
                    <label for="imagenC" class="absolute bottom-2 right-2 p-2 bg-gray-400 rounded-xl">
                        Upload <i class="fa-solid fa-upload"></i><br>
                    </label>
                </div>
                <x-input-error for="imagen" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <button wire:click='cancelCrearModal'
                class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                CANCELAR
            </button>
            <button wire:click='store'
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                GUARDAR
            </button>
        </x-slot>
    </x-dialog-modal>

</div>
