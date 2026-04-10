<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight gradient-text">
                {{ __('My Resumes') }}
            </h2>
            <a href="{{ route('resumes.create') }}" class="px-4 py-2 bg-gradient-to-r from-green-500 to-teal-600 hover:from-green-600 hover:to-teal-700 text-white rounded-md transform hover:scale-105 transition-all shadow-lg">
                {{ __('+ Create New') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="glass dark:glass sm:rounded-3xl p-8 shadow-2xl">
                @if (session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                        {{ session('success') }}
                    </div>
                @endif

                @if($resumes->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400">You haven't created any resumes yet.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($resumes as $resume)
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:shadow-lg transition-shadow">
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $resume->title }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Updated: {{ $resume->updated_at->diffForHumans() }}</p>
                                
                                <div class="flex space-x-2">
                                    <a href="{{ route('resumes.show', $resume) }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">View</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('resumes.edit', $resume) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="{{ route('resumes.pdf', $resume) }}" class="text-green-600 dark:text-green-400 hover:underline">PDF</a>
                                    <span class="text-gray-300">|</span>
                                    <form action="{{ route('resumes.destroy', $resume) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
