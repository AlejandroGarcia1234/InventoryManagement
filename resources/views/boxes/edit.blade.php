<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-700 leading-tight">
                {{ __('Cajas') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-8 flex justify-center">
        <div class="max-w-lg mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md">
                <div class="p-6 text-gray-800 dark:text-gray-700">
                    <h1 class="text-xl font-semibold">Editar Caja</h1>
                    <hr class="my-4">
                    <form action="{{ route('boxes.update',$box->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="label" class="block text-sm font-medium text-gray-700">Etiqueta</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="label" id="label" value="{{ $box->label }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="location" class="block text-sm font-medium text-gray-700">Ubicación</label>
                            <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="location" id="location" value="{{ $box->location }}" required>
                        </div>
                        <hr class="my-4">
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                        </div>
                    </form>
                    <div class="mt-4 text-sm text-gray-600">
                        <a href="{{ route('boxes.index') }}" class="text-blue-500 hover:underline">Volver a la página principal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
