<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Edit Todo
        </h2>
    </x-slot>

    <div class="p-4 max-w-xl mx-auto">
        <form action="{{ route('todos.update', $todo) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block font-semibold">Title</label>
                <input type="text" name="title" value="{{ $todo->title }}" class="w-full rounded border-gray-300" required>
            </div>
            <div>
                <label class="block font-semibold">Description</label>
                <textarea name="description" class="w-full rounded border-gray-300">{{ $todo->description }}</textarea>
            </div>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_completed" value="1" {{ $todo->is_completed ? 'checked' : '' }}>
                    <span class="ml-2">Mark as completed</span>
                </label>
            </div>

            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
