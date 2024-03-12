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
                    @if (Session::get('success'))
                    <div class="alert alert-success mt-2 text-white bg-green-300 text-center">
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                    @endif

                    <div class="flex justify-center mb-4">
                        <a href="{{ route('boxes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Nueva Box</a>
                    </div>

                    <table class="w-full table-fixed">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="w-1/3 px-6 py-3 text-left">Etiqueta</th>
                                <th class="w-1/3 px-6 py-3 text-left">Ubicación</th>
                                <th class="w-1/3 px-6 py-3 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($boxes as $box)
                            <tr class="border-b border-gray-200">
                                <td class="px-6 py-4">{{ $box->label }}</td>
                                <td class="px-6 py-4">{{ $box->location }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-4">
                                        <a href="{{ route('boxes.show', $box->id) }}" class="text-green-500 hover:underline">Ver</a>
                                        <a href="{{ route('boxes.edit', $box->id) }}" class="text-blue-500 hover:underline">Editar</a>
                                        <form action="{{ route('boxes.destroy', $box->id) }}" method="post">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
