<x-app-layout>

<div class="p-6">

    <h2 class="text-2xl font-bold mb-4">
        Assign Role
    </h2>

    <div class="bg-white shadow p-6 rounded w-1/2">

        <h3 class="mb-4 text-lg">
            User: {{ $user->name }}
        </h3>

        <form method="POST"
              action="{{ route('users.roles.update', $user->id) }}">

            @csrf

            <label class="block mb-2 font-bold">
                Select Role
            </label>

            <select name="role"
                    class="w-full border rounded p-2 mb-4">

                @foreach($roles as $role)

                    <option value="{{ $role->name }}"
                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>

                        {{ $role->name }}

                    </option>

                @endforeach

            </select>

            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded">

                Update Role

            </button>

        </form>

    </div>

</div>

</x-app-layout>