<x-app-layout>

<div class="p-6">

<h2 class="text-xl font-bold mb-4">All Products</h2>

<table class="w-full border border-gray-300 text-center">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">Name</th>
            <th class="p-2 border">Category</th>
            <th class="p-2 border">Description</th>
            <th class="p-2 border">Price</th>
            <th class="p-2 border">Image</th>
            <th class="p-2 border">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr class="border">
            <td class="p-2 border">{{ $product->name }}</td>
            <td class="p-2 border">{{ $product->category->name ?? '' }}</td>
            <td class="p-2 w-1/3 border">{{ $product->description }}</td>
            <td class="p-2 border">{{ $product->price }}</td>

            <td class="p-2 border">
                @if($product->image)
                    <img src="{{ asset('uploads/products/'.$product->image) }}" width="80" class="mx-auto">
                @endif
            </td>

            <td class="p-2 border">
                <div class="flex justify-center gap-2">
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="bg-yellow-500 px-2 py-1 text-white">
                        Edit
                    </a>

                    @role('Admin')
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="bg-red-600 px-2 py-1 text-white">
                            Delete
                        </button>
                    </form>
                    @endrole
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>

</x-app-layout>