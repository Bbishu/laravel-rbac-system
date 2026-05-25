<x-app-layout>

    <div class="p-6">

        @role('Manager|Admin')

            <!-- Categories -->
            <a href="{{ route('categories.index') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded me-2">
                📂 Categories
            </a>

            <!-- Add Category -->
            <a href="{{ route('categories.create') }}"
               class="bg-green-600 text-white px-4 py-2 rounded me-2">
                ➕ Add Category
            </a>

            <!-- Products -->
            <a href="{{ route('products.index') }}"
               class="bg-purple-600 text-white px-4 py-2 rounded me-2">
                🛒 Products
            </a>

            <!-- Add Product -->
            <a href="{{ route('products.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded me-2">
                ➕ Add Product
            </a>

        @endrole

        @role('Admin')

            <!-- Users -->
            <a href="{{ route('users.index') }}"
            class="bg-red-600 text-white px-4 py-2 rounded me-2">
                👤 Users
            </a>

        @endrole

     @role('Customer')

        <div class="bg-[#f5f5f3] h-[700px] py-16 px-6">
            <!-- Heading -->
            <div class="flex justify-between items-center mb-10">

                <div>

                    <p class="uppercase tracking-[4px] text-sm text-gray-500 mb-3">
                        Shop By Category
                    </p>

                    <h1 class="text-5xl font-bold">
                        The <span class="italic">edit.</span> For everyone.
                    </h1>

                </div>

                <div class="flex items-center gap-6">

                    <p class="text-gray-400 tracking-[4px] text-sm">

                        {{ count($categories) < 10 ? '0'.count($categories) : count($categories) }}
                        / Categories

                    </p>

                    <a href="{{ route('shop') }}"
                    class="font-semibold border-b border-black pb-1">

                        View All →

                    </a>

                </div>

            </div>


            <!-- Categories -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">

                @foreach($categories as $category)

                    <a href="{{ route('shop.category', $category->id) }}"
                    class="relative h-[300px] bg-black overflow-hidden group rounded-sm">

                        <!-- Background Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-b from-gray-700 via-black to-black
                                    group-hover:scale-110 duration-500">
                        </div>

                        <!-- Big Category Text -->
                        <div class="absolute inset-0 flex items-center justify-center">

                            <h2 class="text-5xl font-bold text-white opacity-10 uppercase tracking-[6px]">

                                {{ $category->name }}

                            </h2>

                        </div>

                        <!-- Bottom Content -->
                        <div class="absolute bottom-6 left-6 right-6 flex justify-between items-end">

                            <div>

                                <p class="text-sm tracking-[4px] text-gray-300 uppercase mb-2">

                                    0{{ $loop->iteration }} /
                                    CATEGORY

                                </p>

                                <h2 class="text-4xl font-bold text-white">

                                    {{ $category->name }}

                                </h2>

                            </div>

                            <!-- Arrow -->
                            <div class="w-14 h-14 border border-white flex items-center justify-center text-white
                                        group-hover:bg-blue-500 group-hover:border-blue-500 transition-all duration-300">

                                →

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    @endrole

    </div>

</x-app-layout>