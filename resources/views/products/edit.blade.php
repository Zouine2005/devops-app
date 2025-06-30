<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Modifier le produit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Nom</label>
                    <input type="text" name="name" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $product->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                    <textarea name="description" rows="4" class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ $product->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-white">Prix (MAD)</label>
                    <input type="number" name="price" step="0.01" class="mt-1 block w-full rounded border-gray-300 shadow-sm" value="{{ $product->price }}" required>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Annuler</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
