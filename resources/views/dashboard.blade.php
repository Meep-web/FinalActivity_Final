<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <!-- Conditionally show admin controls -->
                    @if(auth()->user()->role === 'admin')
                        <div class="mb-4">
                            <!-- Example admin button -->
                            
                            <!-- Add more admin buttons or links here -->
                        </div>
                    @endif

                    @if(auth()->user()->role === 'admin')
                    <div class="mb-4">
                        <a href="{{ route('users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-xs font-semibold rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Create User
                        </a>
                    </div>
                @endif
                
                    <!-- Users Table -->
                    <div class="mt-6">
                        <table class="min-w-full divide-y divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                        Created At
                                    </th>
                                    @if(auth()->user()->role === 'admin')
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-900 uppercase tracking-wider">
                                            Actions
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                            {{ $user->created_at->format('M d, Y') }}
                                        </td>
                                        @if(auth()->user()->role === 'admin')
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-2">
                                                <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                                                    Edit
                                                </a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150 ease-in-out">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                        <!-- Pagination Controls -->
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
