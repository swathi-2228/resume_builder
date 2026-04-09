<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Resumes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass dark:glass overflow-hidden sm:rounded-2xl p-6">
                @if(session('success'))
                <div class="mb-4 text-green-600 bg-green-100 p-3 rounded">{{ session('success') }}</div>
                @endif
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="p-3">Title</th>
                            <th class="p-3">Owner User</th>
                            <th class="p-3">Created</th>
                            <th class="p-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resumes as $resume)
                        <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition">
                            <td class="p-3">{{ $resume->title }}</td>
                            <td class="p-3">{{ $resume->user->name }} ({{ $resume->user->email }})</td>
                            <td class="p-3">{{ $resume->created_at->format('Y-m-d') }}</td>
                            <td class="p-3 text-right">
                                <a href="{{ route('resumes.show', $resume) }}" target="_blank" class="text-indigo-500 hover:underline text-sm mr-3">View</a>
                                <form action="{{ route('admin.resumes.destroy', $resume) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline text-sm" onclick="return confirm('Delete this resume?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $resumes->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
