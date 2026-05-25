<x-app-layout>



<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h2 class="text-2xl font-bold mb-4">Create Category</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-3">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <input type="text"
               name="name"
               placeholder="Category Name"
               class="border p-2 w-full mb-3 rounded">

        @error('name')
            <p class="text-red-500 text-sm">{{ $message }}</p>
        @enderror

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Save Category
        </button>
    </form>

</div>



</x-app-layout>