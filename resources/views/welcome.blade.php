<x-app-layout>
    <x-propios.principal>
        @foreach ($posts as $item)
            <div
                class="w-2/4 mx-auto mb-6 bg-gray-300 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <img class="rounded-t-lg" src="{{ Storage::url($item->imagen) }}" alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $item->titulo }}
                    </h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $item->contenido }}
                    </p>
                    <span class="p-1 rounded w-auto bg-blue-400 mb-3 font-normal text-gray-800 dark:text-gray-400">
                        {{ $item->category->nombre }}
                    </span>
                    <p class="my-3 font-normal text-gray-700 dark:text-gray-400">
                        <b>USUARIO: </b>{{ $item->user->email }}
                    </p>
                </div>
            </div>
        @endforeach
        <div class="mt-2">
            {{ $posts->links() }}
        </div>
    </x-propios.principal>


</x-app-layout>
