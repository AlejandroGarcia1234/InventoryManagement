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
                    @if (Session::get('success'))
                    <div class="bg-green-300 text-white mt-2 py-2 px-4 rounded">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                    @endif

                    <div class="flex justify-center mb-4">
                        <a href="{{ route('items.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nuevo Item</a>
                    </div>

                    <div class="flex justify-center mb-4">
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-200" placeholder="Buscar..." id="searchInput">
                    </div>
                   
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Imagen</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Caja</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>
                                <td class="px-4 py-2">
                                    <div class="flex justify-center h-20 w-20">
                                        @if ($item->picture)
                                        <img src="{{ asset(Storage::url($item->picture)) }}" alt="{{ $item->name }}" class="h-20 w-20">
                                        @else
                                        <img src="https://via.placeholder.com/150" alt="{{ $item->name }}" class="h-20 w-20">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex justify-center h-20 w-20">{{ $item->name }}</div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex justify-center h-20 w-20">
                                        @isset($item->box)
                                        {{ $item->box->label }}
                                        @else
                                        No tiene caja
                                        @endisset
                                    </div>
                                </td>
                                <td class="flex py-4 space-x-4">
                                    <a href="{{ route('items.show', $item->id) }}" class="text-green-500">Ver</a>
                                    <a href="{{ route('items.edit', $item->id) }}" class="text-blue-500">Editar</a>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Eliminar</button>
                                    </form>
                                    @if ($item->loans()->whereNull('returned_date')->first())
                                        <a href="{{ route('loans.show', $item->loans()->whereNull('returned_date')->first()->id) }}" class="text-orange-600 hover:text-orange-900 focus:outline-none focus:underline">Ver Préstamo</a>
                                    @else
                                        <a href="{{ route('loans.create', ['item_id' => $item->id]) }}" class="text-yellow-600 hover:text-green-900 focus:outline-none focus:underline">Prestar</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        let searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('input', function() {
            let searchValue = this.value.toLowerCase();
            let tableRows = document.querySelectorAll('table tbody tr');

            tableRows.forEach(function(row) {
                let itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                let boxLabel = row.querySelector('td:nth-child(3)').textContent.toLowerCase();

                if (itemName.includes(searchValue) || boxLabel.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
