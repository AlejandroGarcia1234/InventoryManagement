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
                        <h1 class="text-2xl font-semibold mb-4">Editar Ítem</h1>
                        <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nombre</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="name" id="name" value="{{ $item->name }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-semibold mb-2">Descripción</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="description" id="description" value="{{ $item->description }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-semibold mb-2">Precio</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="price" id="price" value="{{ $item->price }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="box" class="block text-gray-700 text-sm font-semibold mb-2">Box</label>
                                <select name="box_id" id="box" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Selecciona una box</option>
                                    @foreach ($boxes as $box)
                                    <option value="{{ $box->id }}">{{ $box->label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="picture" class="block text-gray-700 text-sm font-semibold mb-2">Imagen</label>
                                <input type="file" class="form-control-file" name="picture" id="picture">
                                <img src="{{ Storage::url($item->picture) }}" alt="picture" width="100" height="100">
                            </div>
                            <div class="flex justify-between">
                                <a href="{{ route('items.index') }}" class="text-blue-500 hover:underline">Volver</a>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
