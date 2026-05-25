<x-app-layout>

    <div class="p-6">

        <h2 class="text-2xl font-bold mb-4">All Categories</h2>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 text-left">

                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3 border">ID</th>
                        <th class="p-3 border">Name</th>
                        <th class="p-3 border">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $category)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3 border">
                                {{ $category->id }}
                            </td>

                            <td class="p-3 border">
                                {{ $category->name }}
                            </td>

                            <td class="p-3 border">
                                <div class="flex gap-2">

                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="bg-yellow-500 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>

                                    
                                   @role('Admin')
                                <form action="{{ route('categories.destroy', $category->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded">
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

    </div>

</x-app-layout>