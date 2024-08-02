<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Display success message -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Change PATCH to PUT -->
                        <!-- Form fields for editing the user -->
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full" required>
                        </div>
                        <!-- Add more fields as needed -->
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
