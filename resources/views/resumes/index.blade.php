<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Resumes') }}
            </h2>
            <a href="{{ route('resumes.create') }}" class="px-6 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-full font-medium hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                + Create New
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative glass" role="alert">
              <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($resumes as $resume)
                    <div class="glass dark:glass rounded-2xl p-6 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2 group">
                        <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $resume->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">Last updated: {{ $resume->updated_at->diffForHumans() }}</p>
                        
                        <div class="flex justify-between items-center mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
                            <a href="{{ route('resumes.show', $resume) }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-semibold text-sm transition-colors">Preview</a>
                            <a href="{{ route('resumes.edit', $resume) }}" class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 font-semibold text-sm transition-colors">Edit</a>
                            
                            <form action="{{ route('resumes.destroy', $resume) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-semibold text-sm transition-colors" onclick="return confirm('Delete this resume?');">Delete</button>
                            </form>
                            
                            <a href="{{ route('resumes.pdf', $resume) }}" class="ml-2 inline-flex items-center px-3 py-1 bg-gray-800 dark:bg-gray-200 rounded-lg text-xs text-white dark:text-gray-800 font-bold tracking-wider hover:bg-gray-700 transition">PDF</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20 glass rounded-3xl">
                        <p class="text-gray-500 dark:text-gray-400 text-lg">You haven't created any resumes yet.</p>
                        <a href="{{ route('resumes.create') }}" class="mt-4 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">Get started now &rarr;</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
