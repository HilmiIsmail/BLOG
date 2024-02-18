<x-app-layout>
    <x-propios.principal>
        <div class="flex flex-row-reverse mb-2">
            <a href="{{ route('categories.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ NUEVO</a>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripcion
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nombre }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->descripcion }}
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('categories.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('categories.edit', $item) }}"><i
                                            class="fa-solid fa-pen-to-square text-blue-400 text-xl"></i> </a>
                                    <button type="submit"><i
                                            class="fa-solid text-red-400 fa-trash text-xl"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $categorias->links() }}
            </div>
        </div>
    </x-propios.principal>
</x-app-layout>
