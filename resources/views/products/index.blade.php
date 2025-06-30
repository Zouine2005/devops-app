<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Liste des produits
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('products.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Ajouter un produit</a>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700">
                            <th class="px-4 py-2">Nom</th>
                            <th class="px-4 py-2">Description</th>
                            <th class="px-4 py-2">Prix</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->description }}</td>
                                <td class="px-4 py-2">{{ number_format($product->price, 2) }} MAD</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('products.show', $product) }}" class="text-blue-500 hover:underline">Voir</a>
                                    <a href="{{ route('products.edit', $product) }}" class="text-yellow-500 hover:underline ml-2">Modifier</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Supprimer ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-4">Aucun produit trouvée.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
