<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Préstamos') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Nuevo Préstamo</h1>
                    <hr class="mb-6">
                    <form action="{{ route('loans.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="item_id" class="block mb-2 text-gray-700 font-bold">Item</label>
                        <select class="form-select w-full mb-4" name="item_id" id="item_id" required>
                            <option value="">Selecciona un ítem</option>
                            @foreach ($items as $item)
                                <option value="{{ $item->id }}" {{ old('item_id', isset($selectedItem) ? $selectedItem : '') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="due_date" class="block mb-2 text-gray-700 font-bold">Fecha de devolución esperada</label>
                        <input type="date" class="form-input w-full mb-4" name="due_date" id="due_date" required>
                        <hr class="mb-6">
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Crear préstamo</button>
                            <a href="{{ route('items.index') }}" class="bg-blue-100 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Volver a la página principal sin crear nada</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
