<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('users.create') }}" class="underline text-indigo-600 hover:text-indigo-900">Add new user</a>
                    <table class="min-w-full divide-y divide-gray-200 border mt-4">
                        <thead>
                            <tr>
                                <th class ="px-6 py-3" bg-gray-50 text-left >
                                    <span class="text-xs leading-4 font-medium uppercase tracking-wide">Id</th>
                                
                                <th class ="px-6 py-3" bg-gray-50 text-left >
                                    <span class="text-xs leading-4 font-medium uppercase tracking-wide">First Name</th>
                            
                                <th class ="px-6 py-3" bg-gray-50 text-left >
                                    <span class="text-xs leading-4 font-medium uppercase tracking-wide">Last Name</th>
                                
                                <th class ="px-6 py-3" bg-gray-50 text-left >
                                    <span class="text-xs leading-4 font-medium uppercase tracking-wide">Email</th>
                                
                                <th class ="px-6 py-3" bg-gray-50 text-left ></th>       
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                            @foreach ($users as $user)
                                <tr class="bg-white">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->id }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->first_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->last_name }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form method="POST" class= "inline" 
                                            action="{{ route('users.destroy', $user->id) }}" 
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>

                                    <!-- Edit and delete buttons... -->


                                </tr>
                            @endforeach
                            <!-- More users... -->
                        </tbody>    
                   </table>
                    <!-- Pagination links... -->
                    <div>
                        <td colspan="5" class="px-6 py-4 whitespace-nowrap">
                            {{ $users->links() }}

                    </div>
                </div>
            </div>  
        </div>
    </div>
</x-app-layout>
