<x-app-layout>

<div class="p-6">

    <h2 class="text-2xl font-bold mb-4">
        Edit User
    </h2>

    <div class="bg-white shadow p-6 rounded w-1/2">

        <form method="POST"
              action="{{ route('users.update', $user->id) }}">

            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">

                <label class="block font-bold mb-2">
                    Name
                </label>

                <input type="text"
                       name="name"
                       value="{{ $user->name }}"
                       class="w-full border rounded p-2">

            </div>

            <!-- Email -->
            <div class="mb-4">

                <label class="block font-bold mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ $user->email }}"
                       class="w-full border rounded p-2">

            </div>

            <!-- Submit -->
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">
                Update User
            </button>

        </form>

    </div>

</div>

</x-app-layout>