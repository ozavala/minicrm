<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-guest-layout>
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                
                        <!-- Title -->
                        <h3 class='text-xl font-semibold my-4 mt-4'><strong>Task Information</strong></h3>
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="titke" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required  autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                
                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="desciption" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                
                        <!-- Deadline AT -->
                        <div class="mt-4">
                            <x-input-label for="deadline_at" :value="__('Deadline AT')" />
                            <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at"
                            min="{{ today()->format('Y-m-d') }}" :value="old('deadline_at')" required autofocus autocomplete="contact_phone_number" :value="old('deadline_at')" required autocomplete="deadline_at" />
                            <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" /><x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                        </div>
                
                        <!-- Assigned User-->
                        <div class="mt-4">
                            <x-input-label for="user_id" :value="__('Assigned User')" />
                            <select
                                class="block mt-1 w-full border gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="user_id" id="user_id" >
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        @selected(old('user_id')== $user->id)>{{ $user->first_name }} . ' '  {{ $user->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>
                
                        <!-- Assigned Client -->
                        <div class="mt-4">
                            <x-input-label for="client_id" :value="__('Assigned Client')" />
                            <select
                                class="block mt-1 w-full border gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="user_id" id="user_id" >
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        @selected(old('client_id')== $client->id)>{{ $client->company_name }} </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>
                
                        
                        <!-- Assigned Project -->
                        <div class="mt-4">
                            <x-input-label for="project_id" :value="__('Assigned Project')" />
                            <select
                                class="block mt-1 w-full border gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="project_id" id="project_id" >
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        @selected(old('project_id')== $project->id)>{{ $project->title }} </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>
                        
                        <!-- Status -->
                        <div class="mt-4">
                            <x-input-label for="status_id" :value="__('Status')" />
                            <select
                                class="block mt-1 w-full border gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="status_id" id="status" >
                                @foreach (\App\Enums\TaskStatusEnum::cases() as $status)
                                    <option value="{{ $status->value }}"
                                        @selected(old('status')== $status->value)>{{ $status->value }} </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                       
                        <div class="flex items-center  mt-4">
                                  
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </x-guest-layout>
                
            </div>  
        </div>
    </div>
</x-app-layout>
