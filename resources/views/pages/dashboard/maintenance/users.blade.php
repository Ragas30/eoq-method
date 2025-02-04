@extends('layout.layout_dashboard')

@section('title', 'Maintenance | Toko Bangunan YD')

@section('heading', 'Data Users')

@section('content')

    <div class="flex justify-between">
        <button class="bg-primary px-3 py-1 h-fit rounded text-white font-semibold" onclick="showAddModal()">Add
            User</button>
        <div>
            <label for="limit" class="mr-2">Tampilkan</label>
            <select name="limit" id="limit" class="border border-gray-400 rounded-md px-2 py-1" onchange="updateTable()">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <table class="w-full table-auto mt-4">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Username</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody id="userTable">
            @foreach ($data as $index => $user)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ ($data->currentPage() - 1) * $data->perPage() + $loop->index + 1 }}</td>
                    <td class="px-4 py-2">{{ $user->username }}</td>
                    <td class="px-4 py-2">{{ Str::upper($user->role) }}</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition"
                            onclick="showEditModal(this)" data-json='{{ json_encode($user) }}'>
                            Edit
                        </button>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="ml-2 bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition"
                                onclick="return confirm('Are you sure you want to delete this data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $data->links() }}
    </div>

    <!-- Add User Modal -->
    <dialog id="add" class="absolute top-0 right-0 bottom-0 left-0 over rounded-xl shadow-sm">
        <div class="w-96 p-4 border border-black rounded-xl bg-white">
            <h2 class="text-lg font-bold mb-2">Add User</h2>
            <form method="POST" action="{{ route('users.store') }}" class="flex flex-col gap-2 w-full">
                @csrf
                <div>
                    <label for="Username" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" name="username"
                        class="w-full p-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="Password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" name="password"
                        class="w-full p-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="Role" class="block text-gray-700 font-semibold">Role</label>
                    <select name="role"
                        class="w-full p-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="admin">Admin</option>
                        <option value="pimpinan">Pimpinan</option>
                        <option value="pelanggan">Pelanggan</option>
                    </select>
                </div>
                <button type="submit" class="bg-green-600 text-white py-2 mt-4 rounded-lg hover:bg-green-700 transition">
                    Save User
                </button>
                <button type="button" class="bg-gray-500 text-white py-2 mt-2 rounded-lg hover:bg-gray-600 transition"
                    onclick="closeAddModal()">
                    Close
                </button>
            </form>
        </div>
    </dialog>

    <!-- Edit User Modal -->
    <dialog id="edit" class="absolute top-0 right-0 bottom-0 left-0 rounded-xl shadow-sm">
        <div class="w-96 p-4 border border-black rounded-xl bg-white">
            <h2 class="text-lg font-bold mb-2">Edit User</h2>
            <form id="editForm" method="POST" class="flex flex-col gap-2 w-full">
                @csrf
                @method('PUT')
                <div>
                    <label for="Username" class="block text-gray-700 font-semibold">Username</label>
                    <input id="username_edit" type="text" name="username"
                        class="w-full p-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="Password" class="block text-gray-700 font-semibold">Password</label>
                    <input id="password_edit" type="password" name="password"
                        class="w-full p-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="Role" class="block text-gray-700 font-semibold">Role</label>
                    <select id="role_edit" name="role"
                        class="w-full p-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="admin">Admin</option>
                        <option value="pimpinan">Pimpinan</option>
                        <option value="pelanggan">Pelanggan</option>
                    </select>
                </div>
                <button type="submit" class="bg-green-600 text-white py-2 mt-4 rounded-lg hover:bg-green-700 transition">
                    Save User
                </button>
                <button type="button" class="bg-gray-500 text-white py-2 mt-2 rounded-lg hover:bg-gray-600 transition"
                    onclick="closeEditModal()">
                    Close
                </button>
            </form>
        </div>
    </dialog>

    <script>
        function showAddModal() {
            const modal = document.querySelector("#add");
            modal.showModal();
        }

        function showEditModal(btn) {
            const modal = document.getElementById("edit");
            modal.showModal();

            const user = JSON.parse(btn.getAttribute("data-json"));
            console.log(user);

            document.getElementById("editForm").setAttribute("action", `user/${user.id}`);
            document.getElementById("username_edit").value = user.username;
            document.getElementById("password_edit").value = user.password;
            document.getElementById("role_edit").value = user.role;
        }

        function closeAddModal() {
            const modal = document.getElementById("addModal");
            modal.close();
            modal.classList.add('hidden');
        }

        function closeEditModal() {
            const modal = document.getElementById("editModal");
            modal.close();
            modal.classList.add('hidden');
        }
    </script>

@endsection
