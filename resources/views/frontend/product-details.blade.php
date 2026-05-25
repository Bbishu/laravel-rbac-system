<x-app-layout>

<div class="max-w-6xl mx-auto p-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white shadow rounded-xl p-6">

        <!-- Product Image -->
        <div>

            <img src="{{ asset('uploads/products/'.$product->image) }}"
                 class="w-full rounded-xl">

        </div>

        <!-- Product Details -->
        <div>

            <h1 class="text-4xl font-bold mb-4">
                {{ $product->name }}
            </h1>

            <p class="text-2xl text-green-600 font-bold mb-4">
                ₹ {{ $product->price }}
            </p>

            <p class="text-gray-700 leading-7 mb-6">
                {{ $product->description }}
            </p>

            <div class="mb-4">

                <span class="font-bold">
                    Category:
                </span>

                {{ $product->category->name ?? '' }}

            </div>

            <!-- Buttons -->
            <div class="flex gap-4">

                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg">
                    Add To Cart
                </button>

                <button class="bg-green-600 text-white px-6 py-3 rounded-lg">
                    Buy Now
                </button>

            </div>

        </div>

    </div>

</div>

</x-app-layout>