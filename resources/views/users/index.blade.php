<x-app-layout>

<div class="p-6">

    <h2 class="text-2xl font-bold mb-4">All Users</h2>

    <table class="w-full border border-gray-300 text-center">

        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Role</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach($users as $user)

            <tr>

                <td class="border p-2">
                    {{ $user->name }}
                </td>

                <td class="border p-2">
                    {{ $user->email }}
                </td>

                <td class="border p-2">
                    {{ $user->roles->pluck('name')->implode(', ') }}
                </td>

                <td class="border p-2">

                    <!-- Edit -->
                    <a href="{{ route('users.edit', $user->id) }}"
                        class="bg-yellow-500 text-white px-2 py-1 rounded mr-2">
                        Edit
                    </a>

                    <!-- Assign Role -->
                    <a href="{{ route('users.roles', $user->id) }}"
                        class="bg-green-600 text-white px-2 py-1 rounded mr-2">
                         Assign Role
                    </a>

                    @unless($user->hasRole('Admin'))
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Are you sure you want to delete this user?')"
                                class="bg-red-600 text-white px-2 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    @endunless
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</x-app-layout>