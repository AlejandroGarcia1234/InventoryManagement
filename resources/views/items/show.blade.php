<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-700 leading-tight">
                {{ __('Items') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-8 flex justify-center">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-700">
                    <div class="container">
                        <h1 class="text-2xl font-bold mb-4">{{ $item->name }}</h1>
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <div class="text-gray-800 dark:text-gray-200">{{ $item->name }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                            <div class="text-gray-800 dark:text-gray-200">{{ $item->description }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio</label>
                            <div class="text-gray-800 dark:text-gray-200">{{ $item->price }}€</div>
                        </div>
                        <div class="mb-4">
                            <label for="box_id" class="block text-gray-700 text-sm font-bold mb-2">Caja</label>
                            <div class="text-gray-800 dark:text-gray-200">{{ $item->box->label ?? 'Sin caja' }}</div>
                        </div>
                        <div class="mb-4">
                            <label for="picture" class="block text-gray-700 text-sm font-bold mb-2">Imagen</label>
                            @if ($item->picture)
                                <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                            @else
                                <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                            @endif
                        </div>
                        <div class="flex justify-between">
                            <a href="{{ route('items.edit', $item->id) }}" class="text-blue-800 font-bold">Editar</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-800 font-bold">Eliminar</button>
                            </form>
                            <a href="{{ route('items.index') }}" class="text-blue-500 hover:underline">Volver a la lista</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
