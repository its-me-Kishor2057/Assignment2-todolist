<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Todo List
        </h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('todos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">+ New Todo</a>

        @if (session('success'))
            <div class="mt-4 bg-green-100 text-green-800 px-4 py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mt-6 space-y-4">
            @foreach($todos as $todo)
                <div class="bg-white  p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold">{{ $todo->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $todo->description }}</p>
                        <p class="text-sm mt-1 {{ $todo->is_completed ? 'text-green-500' : 'text-red-500' }}">
                            {{ $todo->is_completed ? 'Completed' : 'Pending' }}
                        </p>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('todos.edit', $todo) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Delete this todo?')" class="text-red-500">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
