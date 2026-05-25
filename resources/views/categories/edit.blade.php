<x-app-layout>

    <div class="p-6">

        <h2 class="text-xl font-bold mb-4">Edit Category</h2>

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')

            <input type="text"
                   name="name"
                   value="{{ $category->name }}"
                   class="border p-2 w-full">

            <button class="bg-green-600 text-white px-4 py-2 mt-3">
                Update
            </button>

        </form>

    </div>

</x-app-layout>