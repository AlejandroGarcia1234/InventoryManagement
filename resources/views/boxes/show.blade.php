<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-700 leading-tight">
                {{ __('Cajas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-8 flex justify-center">
        <div class="max-w-3xl mx-auto px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800 dark:text-gray-700">
                    <label for="label" class="font-semibold">Etiqueta:</label>
                    <span class="text-gray-700">{{ $box->label }}</span>
                    <br>
                    <label for="location" class="font-semibold">Ubicación:</label>
                    <span class="text-gray-700">{{ $box->location }}</span>
    
                    @if (Session::get('success'))
                    <div class="alert alert-success mt-4 text-white bg-green-500 text-center">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                    @endif


                    <table class="w-full mt-8">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left">Imagen</th>
                                <th class="px-4 py-2 text-left">Nombre</th>
                                <th class="px-4 py-2 text-left">Caja</th>
                                <th class="px-4 py-2 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($box->items as $item)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">
                                    <div class="flex justify-center h-20 w-20">
                                        @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-2">{{ $item->name }}</td>
                                <td class="px-4 py-2">{{ $box->label }}</td>
                                <td class="px-4 py-2">
                                    <div class="flex space-x-4">
                                        <a href="{{ route('items.show', $item->id) }}" class="text-green-500 hover:underline">Ver</a>
                                        <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500 hover:underline">Editar</a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                   
                    <div class="flex justify-between mt-8">
                        <a href="{{ route('boxes.edit', $box->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Editar Caja</a>
                 
                        <form action="{{ route('boxes.destroy', $box->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Eliminar caja</button>
                        </form>
                 
                        <a href="{{ route('boxes.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">Volver a la lista</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
