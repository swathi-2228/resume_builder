<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight gradient-text">
            {{ __('Administrator Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="glass dark:glass p-10 rounded-3xl text-center transform hover:scale-105 transition-all duration-300">
                    <div class="bg-indigo-100 dark:bg-indigo-900/50 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-5xl font-black text-gray-900 dark:text-white mb-2">{{ $usersCount }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 font-bold uppercase tracking-wider">Total Users</p>
                </div>
                <div class="glass dark:glass p-10 rounded-3xl text-center transform hover:scale-105 transition-all duration-300">
                    <div class="bg-purple-100 dark:bg-purple-900/50 w-20 h-20 mx-auto rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-5xl font-black text-gray-900 dark:text-white mb-2">{{ $resumesCount }}</h3>
                    <p class="text-gray-600 dark:text-gray-400 font-bold uppercase tracking-wider">Total Resumes</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('admin.users') }}" class="glass dark:glass p-8 rounded-3xl group hover:bg-white/90 dark:hover:bg-gray-800 transition-all border-l-4 border-l-indigo-500">
                    <h4 class="text-xl font-bold flex items-center justify-between text-gray-800 dark:text-white">
                        Manage Users
                        <span class="transform group-hover:translate-x-2 transition text-indigo-500">&rarr;</span>
                    </h4>
                </a>
                <a href="{{ route('admin.resumes') }}" class="glass dark:glass p-8 rounded-3xl group hover:bg-white/90 dark:hover:bg-gray-800 transition-all border-l-4 border-l-purple-500">
                    <h4 class="text-xl font-bold flex items-center justify-between text-gray-800 dark:text-white">
                        Manage Resumes
                        <span class="transform group-hover:translate-x-2 transition text-purple-500">&rarr;</span>
                    </h4>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
