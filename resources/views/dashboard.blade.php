<x-app-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="p-4 rounded-xl w-1/2 mx-auto flex flex-column justify-around items-center">
            <a href="{{ route('categories.index') }}"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Gestionar
                Categorias</a>
            <a href="{{ route('show.posts') }}"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Gestionar
                Posts</a>
        </div>
    </div>
</x-app-layout>
