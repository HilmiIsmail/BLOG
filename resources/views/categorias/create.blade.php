<x-app-layout>
    <x-propios.principal>
        <div class="w-2/3 mx-auto bg-slate-300 p-4 rounded-xl">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div>
                    <label for="nombre"
                        class="block mt-3 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nombre de categoria..." />
                    @error('nombre')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="descripcion"
                        class="block  text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                    <textarea type="text" id="descripcion" rows="10" name="descripcion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Descripcion de categoria...">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-row-reverse my-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-save"></i> GUARDAR
                    </button>
                    <button type="reset"
                        class="mx-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-paintbrush"></i> LIMPIAR
                    </button>
                    <a href="{{ route('categories.index') }}"
                        class="mr-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-xmark"></i> CANCELAR</a>
                </div>
            </form>
        </div>

    </x-propios.principal>
</x-app-layout>
