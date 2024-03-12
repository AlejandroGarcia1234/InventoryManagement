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
                    <h1 class="text-black text-2xl font-semibold">Añadir nuevo Ítem</h1>
                    <hr class="my-4">
                    <form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="name" id="name" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="description" id="description" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="price" id="price" required>
                        </div>
                        <hr class="my-4">
                        <div class="mb-4">
                            <label for="box" class="block text-sm font-medium text-gray-700">Box ID</label>
                            <select name="box_id" id="box" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="">Selecciona una box</option>
                                @foreach ($boxes as $box)
                                <option value="{{ $box->id }}">{{ $box->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="my-4">
                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-700">Imagen</label>
                            <input type="file" class="form-control-file" name="picture" id="picture">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Añadir</button>
                        </div>
                    </form>
                    <div class="mt-4">
                        <a href="{{ route('items.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Volver a la página principal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
