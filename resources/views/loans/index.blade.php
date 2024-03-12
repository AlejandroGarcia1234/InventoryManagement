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
                    
                    @if (Session::has('success'))
                    <div class="alert alert-success mt-2 text-white bg-green-300 text-center">
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                    @endif
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Usuario
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ítem
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de préstamo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de devolución
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de retorno
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($loans as $loan)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $users->find($loan->user_id)->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $items->find($loan->item_id)->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loan->checkout_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $loan->due_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-center text-sm font-medium text-gray-900">
                                        @if ($loan->returned_date === null)
                                            @if ($loan->user_id === Auth::id())
                                            <form action="{{ route('loans.update', $loan->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-blue-600 hover:underline focus:outline-none">
                                                   Marcar como devuelto
                                                </button>
                                            </form>
                                            @else
                                            <span class="text-red-600">No devuelto</span>
                                            @endif
                                        @else
                                            {{ $loan->returned_date }}
                                        @endif
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
