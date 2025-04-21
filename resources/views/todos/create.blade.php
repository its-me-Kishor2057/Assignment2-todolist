<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Create Todo
        </h2>
    </x-slot>

    <div class="p-4 max-w-xl mx-auto">
        <form action="{{ route('todos.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold">Title</label>
                <input type="text" name="title" class="w-full rounded border-gray-300" required>
            </div>
            <div>
                <label class="block font-semibold">Description</label>
                <textarea name="description" class="w-full rounded border-gray-300"></textarea>
            </div>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Create</button>
        </form>
    </div>
</x-app-layout>
