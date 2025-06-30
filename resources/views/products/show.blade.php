<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Détails du produit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <div class="mb-4">
                    <strong class="text-gray-700 dark:text-white">Nom :</strong>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700 dark:text-white">Description :</strong>
                    <p>{{ $product->description }}</p>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700 dark:text-white">Prix :</strong>
                    <p>{{ number_format($product->price, 2) }} MAD</p>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('products.edit', $product) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Modifier</a>
                    <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Retour</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
