<x-app-layout>

<div class="max-w-7xl mx-auto p-6">

    <!-- Top Bar -->
    <div class="flex justify-between items-center mb-8">

        <h1 class="text-3xl font-bold">
            Our Products
        </h1>

       
        <!-- <div class="relative group">

            <button class="bg-black text-white px-5 py-2 rounded-lg">
                Categories ▼
            </button>

           
            <div class="absolute left-0 mt-2 w-52 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-150 bg-white shadow-lg rounded-lg z-50">

                <a href="{{ route('shop') }}"
                class="block px-4 py-3 hover:bg-gray-100 border-b">
                    All Products
                </a>

                @foreach($categories as $category)

                    <a href="{{ route('shop.category', $category->id) }}"
                    class="block px-4 py-3 hover:bg-gray-100 border-b">
                        {{ $category->name }}
                    </a>

                @endforeach

            </div>

        </div> -->

    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($products as $product)

        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition duration-1000">

            <!-- Product Image -->
            <img src="{{ asset('uploads/products/'.$product->image) }}"
             class="w-[87%] h-[55%] object-cover mx-auto">

            <div class="p-5">

                <!-- Category -->
                <span class="text-sm text-blue-600 font-semibold">

                    {{ $product->category->name ?? '' }}

                </span>

                <!-- Product Name -->
                <h2 class="text-2xl font-bold mt-2 mb-2">
                    {{ $product->name }}
                </h2>

                <!-- Price -->
                <p class="text-green-600 font-bold text-xl mb-3">
                    ₹ {{ $product->price }}
                </p>

                <!-- Description -->
                <p class="text-gray-600 mb-5">
                    {{ Str::limit($product->description, 70) }}
                </p>

                <!-- Button -->
                <a href="{{ route('product.details', $product->id) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg inline-block">

                    View Details

                </a>

            </div>

        </div>

        @endforeach

    </div>

</div>

</x-app-layout>